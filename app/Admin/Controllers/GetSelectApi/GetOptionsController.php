<?php

namespace App\Admin\Controllers\GetSelectApi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetOptionsController
{
    /**
     *  获取项目名称
     *  @return mixed
     **/
    public function getPreject()
    {
        return Project::get(['id',DB::raw('name as text')]);
    }
}