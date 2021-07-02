<?php

namespace App\Query\Helpers;

use Illuminate\Pagination\Paginator;

trait PaginatorHelper {
	/**
	 * Paginate the given query.
	 *
	 * @param int $perPage
	 * @param array $columns
	 * @param string $pageName
	 * @param int|null $page
	 * @param int|false $total
	 * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
	 *
	 * @throws \InvalidArgumentException
	 */
	public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null, $total = false) {
		$page = $page ?: Paginator::resolveCurrentPage($pageName);

		$perPage = $perPage ?: $this->model->getPerPage();

		$results = ($total = $total !== false && is_numeric($total) ? $total : $this->toBase()->getCountForPagination())
			? $this->forPage($page, $perPage)->get($columns)
			: $this->model->newCollection();

		return $this->paginator($results, $total, $perPage, $page, [
			'path' => Paginator::resolveCurrentPath(),
			'pageName' => $pageName,
		]);
	}
}