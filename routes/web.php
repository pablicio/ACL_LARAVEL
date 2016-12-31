<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'Portal\SiteController@index');

Route::group(['middleware' => ['web']], function () {
    //

Route::auth();



Route::group(['prefix'=>'painel'],function (){
    //PostController
    Route::get('/posts', 'Painel\PostController@index');


    //PermissionController
    Route::get('/permissions', 'Painel\PermissionController@index');
    Route::get('/permissions/{id}/roles', 'Painel\PermissionController@roles');



    //RoleController
    Route::get('/roles', 'Painel\RoleController@index');
    Route::get('/roles/{id}/permissions', 'Painel\RoleController@permissions');
    Route::get('/roles/{id}/edit', 'Painel\RoleController@edit');



    //UserController
    Route::get('/users', 'Painel\UserController@index');
    Route::get('/users/{id}/roles', 'Painel\UserController@roles');


    //PainelController
    Route::get('/', 'Painel\PainelController@index');



});




Route::get('/home', 'HomeController@index');
});