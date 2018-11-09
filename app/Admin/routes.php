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

    $router->resource('projectm/sponsor','Projectm\SponsorController');

    $router->resource('projectm/croinfo','Projectm\CroinfoController');

    //自动创建路由
    $res = \App\Model\Database::select('table_controller','table_route')->get();
    if (!$res->isEmpty()){
        foreach ($res as $k=>$v){
            $router->resource("{$v->table_route}", "{$v->table_controller}");
        }
    }
});

//获取项目名称
Route::get('/admin/api/projectName','App\Admin\Controllers\GetSelectApi\GetOptionsController@getPreject');

Route::get('/admin/outGroup/{id}','App\Admin\Controllers\Test\InquiryPhysiqueController@outGroup');
//获取研究者接口
Route::get('/admin/api/personnel','App\Admin\Controllers\GetSelectApi\GetOptionsController@getPersonnel');
//获取申办方接口
Route::get('/admin/api/getSponsor','App\Admin\Controllers\GetSelectApi\GetOptionsController@getSponsor');
//获取CRO接口
Route::get('/admin/api/getCro','App\Admin\Controllers\GetSelectApi\GetOptionsController@getCro');