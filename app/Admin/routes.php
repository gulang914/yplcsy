<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('admin/fundamental','FundamentalController');

    $router->resource('admin/professional','ProfessionalController');

    $router->resource('admin/notice','NoticeController');

});
