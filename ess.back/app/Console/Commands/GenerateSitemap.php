<?php

namespace App\Console\Commands;

use App\Models\News;
use App\Models\Project;
use App\Models\Seo;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\Sitemap;

class GenerateSitemap extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'sitemap:generate';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate the sitemap.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {
		$this->info('start generate sitemap');
		$priority = 0.7;
		$frequency = Url::CHANGE_FREQUENCY_WEEKLY;

		$indexPages = $this->getIndexPages();
		$sitemap_uk = Sitemap::create()->add(Url::create('/')->setPriority($priority)->setChangeFrequency($frequency));
		$sitemap_ru = Sitemap::create()->add(Url::create('/ru/')->setPriority($priority)->setChangeFrequency($frequency));

		foreach ($indexPages as $page){
			$sitemap_uk->add(Url::create("/{$page['url']}")->setPriority($page['priority'])->setChangeFrequency($page['frequency']));
			$sitemap_ru->add(Url::create("/ru/{$page['url']}")->setPriority($page['priority'])->setChangeFrequency($page['frequency']));
		}

		Project::all()->each(function (Project $page) use ($sitemap_uk, $sitemap_ru, $priority, $frequency) {
			$sitemap_uk->add(Url::create("/projects/{$page->alias}")->setPriority($priority)->setChangeFrequency($frequency));
			$sitemap_ru->add(Url::create("/ru/projects/{$page->alias}")->setPriority($priority)->setChangeFrequency($frequency));
		});

		News::query()
			->where('is_published', '=', News::IS_PUBLISHED)
			->get()
			->each(function (News $page) use ($sitemap_uk, $sitemap_ru, $priority, $frequency) {
			$sitemap_uk->add(Url::create("/news/{$page->alias}")->setPriority($priority)->setChangeFrequency($frequency));;
			$sitemap_ru->add(Url::create("/ru/news/{$page->alias}")->setPriority($priority)->setChangeFrequency($frequency));
		});

		SitemapIndex::create()
			->add( 'sitemap_uk.xml')
			->add( 'sitemap_ru.xml')
			->writeToFile(public_path('sitemap.xml'));

		$sitemap_uk->writeToFile(public_path('sitemap_uk.xml'));
		$sitemap_ru->writeToFile(public_path('sitemap_ru.xml'));

		$this->info('finish generate sitemap');
	}

	private function checkMetaTags($model) {
		if ($model->seo_title_ru && $model->seo_title_uk && $model->seo_description_uk && $model->seo_description_ru) {
			return true;
		}
		return false;
	}

	private function getIndexPages() {
		return [
			[
				'url' => 'news',
				'priority' => 0.7,
				'frequency' => Url::CHANGE_FREQUENCY_WEEKLY
			],
			[
				'url' => 'projects',
				'priority' => 0.7,
				'frequency' => Url::CHANGE_FREQUENCY_WEEKLY
			],
		];
	}

	private function checkMetaTagsInMetaData($path)
	{
		$url = url($path);
		$seo = Seo::query()
			->where('redirect_uri', $url)->first();
		return $seo != null ? ($seo->title_uk) : false;
	}
}
