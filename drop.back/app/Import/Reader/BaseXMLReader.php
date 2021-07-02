<?php

namespace App\Import\Reader;

use App\Helpers\StrHelper;
use App\Import\Enums\XMLReaderStates;
use App\Import\Helpers\HasEvents;

abstract class BaseXMLReader {
  use HasEvents;

  /**
   * Object with XML reader.
   *
   * @var \XMLReader
   */
  private $reader;

  /**
   * Cached of reference tag.
   *
   * @var string
   */
  private $_foundReferenceTagName;

  /**
   * Reference tag name by start point of parsing XML document.
   *
   * @var string
   */
  protected $referenceTagName;

  /**
   * Close stream of reading document by \XMLReader.
   *
   * @var bool
   */
  protected $isCloseReadingAfterParsingStops = true;

  /**
   * Current state of reading.
   *
   * @var int
   */
  protected $state;

  /**
   * Creates an XMLReader entity and loads xml, or throws an exception.
   *
   * @param  string|null $xmlFilePath
   * @param  \XMLReader $reader
   *
   * @throws \Exception
   */
  public function __construct(?string $xmlFilePath, \XMLReader $reader = null) {
    if(!$xmlFilePath && !$reader)
      throw new \Exception("You must specify either the path to the file or a link to the reader of the XML file!");

    if (!$reader && !is_file($xmlFilePath))
      throw new \Exception("XML file {{$xmlFilePath}} not exists!");

    $this->reader = $reader ?: new \XMLReader();
    if(!$reader)
      $this->reader->open($xmlFilePath, null, LIBXML_COMPACT | LIBXML_PARSEHUGE);

    $this->init();
  }

  /**
   * @param  string $tagName
   * @return string
   */
  private function formNameParsingMethod(string $tagName) : string {
    $tagName = ucfirst(StrHelper::toCamelCase($tagName));
    return "parse{$tagName}";
  }

  /**
   * @param  string $methodName
   * @return BaseXMLReader
   */
  private function handleParseXmlElement(string $methodName) : self {
    if (method_exists($this, $methodName)) {
      // call method of parsing
      $this->{$methodName}();
    }

    // call event by name of parsing method
    $this->triggerEvent($methodName);

    return $this;
  }

  /**
   * @return bool
   */
  private function isCheckReferenceTagName() : bool {
    return !empty($this->referenceTagName);
  }

  /**
   * @param string $tagName
   * @return BaseXMLReader
   */
  private function cacheReferenceTag(string $tagName) : self {
    $this->_foundReferenceTagName = $this->isCheckReferenceTagName()
      ? ($this->_foundReferenceTagName ?: $tagName)
      : $this->_foundReferenceTagName;

    return $this;
  }

  /**
   * @param string $tagName
   * @return bool
   */
  private function isThisReferenceTag(string $tagName) : bool {
    return $this->isCheckReferenceTagName() ? $tagName === $this->referenceTagName : true;
  }

  /**
   * @param string $tagName
   * @param array $eventParams
   *
   * @return BaseXMLReader
   */
  private function triggerEventsBeforeParseContainer(string $tagName, array $eventParams) : self {
    if($this->isThisReferenceTag($tagName))
      // call event by starting parse reference container
      $this->triggerEvent('beforeParseReferenceContainer', $eventParams);

    // call event by starting parse container
    $this->triggerEvent('beforeParseContainer', $eventParams);

    return $this;
  }

  /**
   * @param string $tagName
   * @param array $eventParams
   *
   * @return BaseXMLReader
   */
  private function triggerEventsParsingContainer(string $tagName, array $eventParams) : self {
    // call event before parsing element
    $this->triggerEvent('beforeParseElement', $eventParams);

    $this->handleParseXmlElement($this->formNameParsingMethod($tagName));

    // call event by ending parsing element
    $this->triggerEvent('afterParseElement', $eventParams);

    return $this;
  }

  /**
   * @param string $tagName
   * @param array $eventParams
   *
   * @return BaseXMLReader
   *
   * @throws \LogicException
   */
  private function triggerEventsAfterParseContainer(string $tagName, array $eventParams) : self {
    // call event by ending parse container
    $this->triggerEvent('afterParseContainer', $eventParams);

    if($this->isThisReferenceTag($tagName)) {
      // call event by ending parse container
      $this->triggerEvent('afterParseReferenceContainer', $eventParams);

      if(!$this->isCloseReadingAfterParsingStops) {
        $this->markStateToPauseParse();
        throw new \LogicException('Stop parsing!');
      }

      $this->markStateToStoppingParse();
    }

    return $this;
  }

  /**
   * @param int $state
   * @return BaseXMLReader
   */
  protected function newState(int $state) : self {
    $this->state = $state;
    return $this;
  }

  /**
   * @return BaseXMLReader
   */
  protected function markStateToPauseParse() : self {
    $this->newState(XMLReaderStates::STATE_PARSE_PAUSE);
    return $this;
  }

  /**
   * @return BaseXMLReader
   */
  protected function markStateToStoppingParse() : self {
    $this->newState(XMLReaderStates::STATE_BREAK_READ);
    return $this;
  }

  /**
   * @return bool
   */
  protected function isStoppingParse() : bool {
    return in_array($this->state, [XMLReaderStates::STATE_BREAK_READ, XMLReaderStates::STATE_PARSE_PAUSE]);
  }

  /**
   * @return bool
   */
  protected function isPauseParse() : bool {
    return in_array($this->state, [XMLReaderStates::STATE_PARSE_PAUSE]);
  }

  /**
   * @return bool
   */
  protected function isParsingElement() : bool {
    return $this->reader->nodeType == \XMLReader::ELEMENT;
  }

  /**
   * @return bool
   */
  protected function isParsingToEndElement() : bool {
    return $this->reader->nodeType == \XMLReader::END_ELEMENT;
  }

  /**
   * Checks state and run action by concrete state.
   */
  protected function checkState() {
    if ($this->isStoppingParse()) {
      throw new \LogicException('Stop parsing!');
    }
  }

  /**
   * Initialization of some things.
   */
  protected function init() {
    //
  }

  /**
   * @return \XMLReader
   */
  public function getReader(): \XMLReader {
    return $this->reader;
  }

  /**
   * @param bool $enable
   * @return self
   */
  public function enableOrDisableReadCloseAfterParsingStops(bool $enable = true): self {
    $this->isCloseReadingAfterParsingStops = $enable;
    return $this;
  }

  /**
   * Close the XMLReader input.
   *
   * @param bool $forceClose
   */
  public function closeReading(bool $forceClose = false) {
    if(($this->isCloseReadingAfterParsingStops && !$this->isPauseParse()) || $forceClose)
      $this->reader->close();
  }

  /**
   * It parses xml stream and calls methods for certain elements.
   * For example, when a <city> element is detected,
   * it will try to call the parseCity method,
   * all parsing methods must be public or protected.
   *
   * @return void
   */
  public function parse(): void {
    $this->newState(XMLReaderStates::STATE_BEGIN_READ);

    while ($this->reader->read()) {
      try {
        $this->checkState();
      } catch (\LogicException $exception) {
        break;
      }

      if (!$this->isThisReferenceTag(($this->_foundReferenceTagName ?: $this->reader->name)))
        continue;

      $this->cacheReferenceTag($this->reader->name);

      $this->newState(XMLReaderStates::STATE_PARSE_ELEMENT);

      $eventParams = [
        'name' => $this->reader->name,
      ];

      $this->triggerEventsBeforeParseContainer($this->reader->name, $eventParams);

      // read of children
      if ($this->isParsingElement()) {
        $this->triggerEventsParsingContainer($this->reader->localName, $eventParams);
      } else if($this->isParsingToEndElement()) {
        try {
          $this->triggerEventsAfterParseContainer($this->reader->name, $eventParams);
        } catch (\LogicException $exception) {
          break;
        }
      }
    }

    $this->clearEvents();

    $this->closeReading();

    $this->newState(XMLReaderStates::STATE_END_READ);
  }
}