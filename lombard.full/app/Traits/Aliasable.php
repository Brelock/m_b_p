<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait Aliasable
{
    public function makeAlias(Request $request)
    {
        if ((filled($this->title_ru) && $request->alias && $this->alias !== $request->alias) || (blank($this->title_ru) && $request->alias)){
            $alias = $this::where('alias', $request->alias)->doesntExist() ? $request->alias : $request->alias.rand(1000, 9999);
        } elseif (blank($this->title_ru) && !$request->alias){
            $alias = $this::where('alias', str_slug($request->title_ru))->doesntExist()
                ? str_slug($request->title_ru)
                : str_slug($request->title_ru).rand(1000, 9999);
        } else{
            $alias = $this->alias;
        }

        return $alias;
    }
}