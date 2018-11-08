<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('fundamental','FundamentalController');

    $router->resource('professional','ProfessionalController');

    $router->resource('notice','NoticeController');

    $router->resource('employee','EmployeeController');

    $router->resource('database','DatabaseController');

    $router->resource('test/experimentalDrug','Test\ExperimentalDrugController');

    //自动创建路由
    $res = \App\Model\Database::select('table_controller','table_route')->get();
    if (!$res->isEmpty()){
        foreach ($res as $k=>$v){
            $router->resource("{$v->table_route}", "{$v->table_controller}");
        }
    }
});
