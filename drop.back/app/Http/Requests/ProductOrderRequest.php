<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Validation\Rule;

class ProductOrderRequest extends JsonFormRequest {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
      'product_id' => ['required', 'integer', Rule::exists(Product::getTableName(), 'id')]
    ];
  }

  /**
   * @return Product|null
   */
  public function getProduct() : ?Product {
    /* @var Product $product */
    $product = Product::query()->find($this->get('product_id'));
    return $product;
  }
}
