<?php

namespace App\Http\Controllers\Site;

use App\Filters\ActionsFilters;
use App\Models\Admin\Action;
use App\Models\Admin\City;
use App\Models\Common\Seo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ActionController extends Controller
{
    public function index(ActionsFilters $filters, Request $request)
    {
        $meta_tags = Seo::whereAlias('action')->first();
        $cities  = City::published()->get();
        $request = $request->all();
        $actions = $this->getActions($filters);

        $archive = Action::published()->groupBy(DB::raw('DATE(created_at)'))->get(['created_at']);
        return view('site.action.action-front', ['actions' => $actions, 'cities' => $cities, 'request' => $request, 'archive' => $archive, 'meta_tags' => $meta_tags]);
    }

    public function show($alias)
    {
        $action = Action::whereAlias($alias)->firstOrFail();
        $moreAction = Action::orderBy(DB::raw('RAND()'))->take(3)->whereNotIn('id', [$action->id])->get();
        return view('site.action.show-item-action-front', ['action' => $action, 'moreAction'=>$moreAction]);
    }


    public function getActions(ActionsFilters $filters)
    {
        if ($filters->getFilters()) {
            $actions = Action::filter($filters)->orderBy('created_at', 'DESC');
        } else {
            $actions = Action::published()->orderBy('created_at', 'DESC');
        }

        return $actions->paginate(10);
    }
}
