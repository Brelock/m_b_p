<?php

namespace App\Http\Controllers;

use App\Criteria\Builder\NewsCriteriaBuilder;
use App\Criteria\News\OnlyPublished;
use App\Criteria\News\WithDefaultRelationship;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\View\View;
use Illuminate\Http\Request;

class NewsController extends SeoController {
  /**
   * NewsController constructor.
   *
   * @param Request $request
   */
  public function __construct(Request $request) {
    parent::__construct($request);
  }

  /**
   * @param NewsCriteriaBuilder $criteriaBuilder
   * @return View
   */
	public function index(NewsCriteriaBuilder $criteriaBuilder): View {

    $paginator = News::filterToPaginate($criteriaBuilder, $criteriaBuilder->max(), $criteriaBuilder->page());
    return view('news.index', [
      'paginator' => $paginator->appends($criteriaBuilder->getRequest()->all()),
      'news' => NewsResource::rawPaginator($paginator, $criteriaBuilder->getRequest()),
    ]);
	}

  /**
   * @param News $news
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|View
   */
  public function show(News $news) {

    $news->load(WithDefaultRelationship::relations());
    if ($news->is_published == $news::IS_PUBLISHED){
      if(!$this->hasSeoEntity())
        $this->setByEntity($news);
      return view('news.show', [
        'news' => NewsResource::rawData($news, null, false),
      ]);
    }
    else{
      return view('errors.404');
    }
  }
}
