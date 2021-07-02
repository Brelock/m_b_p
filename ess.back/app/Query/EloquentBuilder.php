<?php

namespace App\Query;

use App\Query\Helpers\PaginatorHelper;
use Illuminate\Database\Eloquent\Builder;

class EloquentBuilder extends Builder {
	use PaginatorHelper;
}