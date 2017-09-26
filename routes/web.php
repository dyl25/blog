<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::group(['middleware' => ['auth', 'checkRoleAdmin']], function() {
    Route::match(['get', 'head'], '/backoffice/users/changePassword/{id}', 'admin\UserController@editPassword')->name('users.editPassword');
    Route::match(['put', 'patch'], '/backoffice/users/updatePassword/{id}', 'admin\UserController@updatePassword')->name('users.updatetPassword');
    Route::resource('/backoffice/articles', 'admin\ArticleController');
    Route::resource('/backoffice/users', 'admin\UserController');
    Route::get('/backoffice', 'admin\DashboardController@index')->name('backoffice');
});

Auth::routes();
Route::get('/articles/search', 'ArticleController@search');
Route::get('/articles', 'ArticleController@all');
Route::get('/home', 'ArticleController@index')->name('home');
Route::get('/', 'ArticleController@index');
