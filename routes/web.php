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

Route::get('/home', 'HomeController@index');


Route::group(['prefix'=>'painel'],function (){
    //PermissionController
    Route::resource('/permissions', 'Painel\PermissionController');
    Route::get('/permissions/{id}/roles', 'Painel\PermissionController@roles');

    //RoleController
    Route::resource('/roles', 'Painel\RoleController');
    Route::get('/roles/{id}/permissions', 'Painel\RoleController@permissions');

    //UserController
    Route::resource('/users', 'Painel\UserController');
    Route::get('/users/{id}/roles', 'Painel\UserController@roles');

    //PainelController
    Route::get('/', 'Painel\PainelController@index');

    //PermissionRoleController
    Route::get('/permission_roles/create', 'Painel\PermissionRoleController@create');
    Route::post('{permission_role_id}', 'Painel\PermissionRoleController@store');

    //PermissionUserController
    Route::get('/permission_users/edit/{id}', 'Painel\PermissionUserController@edit');
    Route::put('/permission_users/edit/{id}', 'Painel\PermissionUserController@update');

});



Route::auth();



