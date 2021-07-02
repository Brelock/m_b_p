<?php

namespace App\Services\Actions;

use App\DTO\NewsDto;
use App\Models\News;
use App\Services\NewsService;

class NewsServiceAction {
	/**
	 * @param NewsDto $dto
	 * @return News
	 * @throws \Exception
	 */
	public function createNews(NewsDto $dto): News {
		return $this->saveNews(new News(), $dto);
	}

	/**
	 * @param News $news
	 * @param NewsDto $dto
	 * @return News
	 * @throws \Exception
	 */
	public function updateNews(News $news, NewsDto $dto): News {
		return $this->saveNews($news, $dto);
	}

	/**
	 * @param News $news
	 * @param NewsDto $newsDto
	 * @return News
	 * @throws \Exception
	 */
	protected function saveNews(News $news, NewsDto $newsDto): News {
		$serviceItemService = new NewsService($news);

		if ($newsDto->hasMainFile())
			$serviceItemService->uploadFiles([$newsDto->getMainFile()], $newsDto->hasMainFile());

		if ($newsDto->hasFiles())
			$serviceItemService->uploadFiles($newsDto->getFiles());

		if($newsDto->hasToDeleteFiles()) {
			$serviceItemService->deleteFiles($newsDto->getPicturesIdToDelete());
		}

		$serviceItemService
			->changeAttributes($newsDto)
			->commitChanges();

		return $serviceItemService->getNews();
	}

}