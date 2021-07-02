<?php

namespace App\Widgets;

use App\Collection\ParamCollection;
use App\Criteria\Base\Id;
use App\Criteria\ParamValue\WhereParams;
use App\Helpers\ArrayHelper;
use App\Models\Category;
use App\Models\ParamValue;
use App\Models\ProductParam;
use \Arrilot\Widgets\AbstractWidget;
use Illuminate\Database\Eloquent\Collection;

class CategoriesParamsSidebar extends AbstractWidget {
  /**
   * The configuration array.
   *
   * @var array
   */
  protected $config = [];

  /**
   * @return int|null
   */
  protected function getCategoryId() : ?int {
    return ArrayHelper::getValue($this->config, 'categoryId');
  }

  /**
   * @return bool
   */
  protected function hasCategoryId() : bool {
    return !empty($this->getCategoryId());
  }

  /**
   * @param ParamCollection $params
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  protected function render(ParamCollection $params) {
    return view('widgets.params-sidebar', [
      'params' => $params,
      'selected' => request()->get('paramsValues', []),
    ]);
  }

  /**
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function run() {
    if(!$this->hasCategoryId())
      return $this->render(new ParamCollection());

    /* @var Category $category */
    $category = Category::fromCriteria(new Id($this->getCategoryId()))->first();

    if(!$category)
      return $this->render(new ParamCollection());

	  $category->load('params.paramValues');

    return $this->render($category->params);
  }
}