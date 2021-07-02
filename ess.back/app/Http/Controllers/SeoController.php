<?php

namespace App\Http\Controllers;

use App\Criteria\Builder\CriteriaCollection;
use App\Criteria\Seo\WhereRedirectUri;
use App\Models\Seo;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Cache;

/**
 * Controller for detecting and set seo meta tags for pages.
 *
 * @package App\Http\Controllers
 */
class SeoController extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests, SEOTools;

	/**
	 * SeoController constructor.
	 * Search seo item by absolute url and set meta tags.
	 *
	 * @param Request $request
	 * @return void
	 */
	public function __construct(Request $request) {
		/* @var Seo $seo */
		$fullUrl = str_replace(['/ru/','/ru'], ['/', ''], $request->fullUrl());
		$seo = Cache::remember("seoPage:{$fullUrl}", 1440, function() use($fullUrl) {
			return Seo::findOne(new CriteriaCollection([
				new WhereRedirectUri($fullUrl),
			]));
		});

		if($seo) {
			$this->seo()->setTitle(tAttr($seo, 'title_{lang}'));
			$this->seo()->setDescription(strip_tags(tAttr($seo, 'description_{lang}')));
			$this->seo()->opengraph()->setTitle(tAttr($seo, 'title_{lang}'));
			$this->seo()->opengraph()->setDescription(strip_tags(tAttr($seo, 'description_{lang}')));
		}else{
      $this->seo()->setTitle(config('app.name'));
    }

	}

  /**
   * @return bool
   */
  public function hasSeoEntity(): bool {
    return !empty($this->seoEntity);
  }

  /**
   * @param Model $entity
   */
	public function setByEntity(Model $entity) {
		$this->seo()->setTitle(tAttr($entity, 'seo_title_{lang}') ?: tAttr($entity, 'title_{lang}'));
		$this->seo()->setDescription(tAttr($entity, 'seo_description_{lang}') ?: tAttr($entity, 'description_{lang}'));
		$this->seo()->opengraph()->setTitle(tAttr($entity, 'seo_title_{lang}') ?: tAttr($entity, 'title_{lang}'));
		$this->seo()->opengraph()->setDescription(tAttr($entity, 'seo_description_{lang}') ?: tAttr($entity, 'description_{lang}'));
	}
}
