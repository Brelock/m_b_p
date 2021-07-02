<?php

namespace App\Query;

use App\Query\Helpers\PaginatorHelper;
use Kalnoy\Nestedset\QueryBuilder;

class NodeEloquentBuilder extends QueryBuilder {
	use PaginatorHelper;
}