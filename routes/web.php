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

Auth::routes();

Route::group(['prefix'=>'painel'],function (){
    //PostController
    Route::get('/posts', 'Painel\PostController@index');


    //PermissionController
    Route::get('/', 'Painel\PermissionController@index');


    //RoleController
    Route::get('/', 'Painel\PermissionController@index');


    //PainelController
    Route::get('/', 'Painel\PainelController@index');



});




