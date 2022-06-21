<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('/categories', 'CategoryController');
    $router->resource('/navigation', 'NavigationController');
    $router->resource('/articles', 'ArticleController');
    $router->post('/upload/images', 'UploadForEditorController@image')->name('upload.images');

});