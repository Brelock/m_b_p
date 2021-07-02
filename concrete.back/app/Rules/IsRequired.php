<?php


namespace App\Rules;


use App\Enums\CategoryParamTypes;
use App\Enums\CategoryTypes;
use Illuminate\Contracts\Validation\Rule;

class IsRequired implements Rule {
	/**
	 * @var integer
	 */
	protected $categoryType;

	/**
	 * IsRequired constructor.
	 *
	 * @param int $categoryType
	 */
  public function __construct(int $categoryType) {
  	$this->categoryType = $categoryType;
  }

	/**
   * @param string $attribute
   * @param mixed $value
   *
   * @return bool
   */
  public function passes($attribute, $value) {
  	$params = CategoryTypes::$PARAMS;
  	$requiredParams = $params[$this->categoryType];
  	$paramLabels = CategoryParamTypes::$LABELS;
  	$paramIndex = array_keys($paramLabels, $attribute);
  	if(in_array($paramIndex[0], $requiredParams) && !empty($value)) {
		  return true;
	  }
  	return false;
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message() {
    return "This attribute is required.";
  }
}
