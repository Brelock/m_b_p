<?php

namespace App\Import\Reader\Rozetka;

use App\Import\Collection\OfferCollection;
use App\Import\Collection\OfferParamCollection;
use App\Import\Collection\OfferPictureCollection;
use App\Import\Entity\Offer;
use App\Import\Reader\BaseXMLReader;

class OfferXMLReader extends BaseXMLReader {
  /**
   * @var string
   */
  protected $referenceTagName = 'offers';

  /**
   * @var OfferCollection
   */
  protected $offers;

  /**
   * @var OfferParamCollection
   */
  protected $params;

  /**
   * @var OfferPictureCollection
   */
  protected $pictures;

  /**
   * @var Offer|null
   */
  private $_offer;

  /**
   * @return OfferCollection
   */
  public function getOffers(): OfferCollection {
    return $this->offers;
  }

  /**
   * Initialize collection with offers.
   */
  protected function init() {
    parent::init();

    $this->initNewOffer();
    $this->offers = new OfferCollection();

    $this->onEvent('afterParseContainer', function($name) {
      if($name === 'offer') {
        $this->offers->push(clone $this->_offer);

        $this->initNewOffer();
      }
    });
  }

  protected function initNewOffer() {
    $this->params = new OfferParamCollection();
    $this->pictures = new OfferPictureCollection();
    $this->_offer = Offer::createNullObject();
  }

  /**
   * Parse tag <offer>.
   */
  protected function parseOffer() {
    $this->_offer
      ->setId($this->getReader()->getAttribute('id'))
      ->setAvailable($this->getReader()->getAttribute('available') === 'true');
  }

  /**
   * Parse tag <art> in tag <offer>.
   */
  protected function parseArt() {
    $this->_offer->setArt($this->getReader()->readString());
  }

  /**
   * Parse tag <name> in tag <offer>.
   */
  protected function parseName() {
    $this->_offer->setName($this->getReader()->readString());
  }

  /**
   * Parse tag <price_opt> in tag <offer>.
   */
  protected function parsePriceOpt() {
    $this->_offer->setPrice((float)$this->getReader()->readString());
  }

  /**
   * Parse tag <price_drop> in tag <offer>.
   */
  protected function parsePriceDrop() {
    $this->_offer->setPriceOld((float)$this->getReader()->readString());
  }

  /**
   * Parse tag <old_price_drop> in tag <offer>.
   */
  protected function parseOldPriceDrop() {
    $this->_offer->setOldPriceDrop((float)$this->getReader()->readString());
  }

  /**
   * Parse tag <old_price_opt> in tag <offer>.
   */
  protected function parseOldPriceOpt() {
    $this->_offer->setOldPriceOpt((float)$this->getReader()->readString());
  }

  /**
   * Parse tag <stock_quantity> in tag <offer>.
   */
  protected function parseStockQuantity() {
    $this->_offer->setStockQuantity((int)$this->getReader()->readString());
  }

  /**
   * Parse tag <currencyId> in tag <offer>.
   */
  protected function parseCurrencyId() {
    $this->_offer->setCurrencyId($this->getReader()->readString());
  }

  /**
   * Parse tag <categoryId> in tag <offer>.
   */
  protected function parseCategoryId() {
    $this->_offer->setCategoryId($this->getReader()->readString());
  }

  /**
   * Parse tag <description> in tag <offer>.
   */
  protected function parseDescription() {
    $this->_offer->setDescription(trim(preg_replace('/\s+/S', " ", stripslashes($this->getReader()->readString()))));
  }

  /**
   * Parse list tags of <param> in tag <offer>.
   */
  protected function parseParam() {
    $this->params->offsetSet($this->getReader()->getAttribute('name'), $this->getReader()->readString());
    $this->_offer->setParams($this->params);
  }

  /**
   * Parse tag <vendor> in tag <offer>.
   */
  protected function parseVendor() {
    $this->_offer->setVendor($this->getReader()->readString());
  }

  /**
   * Parse list tag of <picture> in tag <offer>.
   */
  protected function parsePicture() {
    $this->pictures->push(
    	new Offer\Picture(
    		stripslashes(html_entity_decode($this->getReader()->readString())),
		    $this->pictures->count()+1
	    )
    );

    $this->_offer->setPictures($this->pictures);
  }
}