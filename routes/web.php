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

Route::group(['middleware' => ['auth', 'checkRole']], function() {
    Route::match(['get', 'head'], '/backoffice/users/changePassword/{id}', 'admin\UserController@editPassword')->name('users.editPassword');
    Route::match(['put', 'patch'], '/backoffice/users/updatePassword/{id}', 'admin\UserController@updatePassword')->name('users.updatetPassword');
    Route::resource('/backoffice/articles', 'admin\ArticleController');
    Route::resource('/backoffice/users', 'admin\UserController');
    Route::get('/backoffice', 'admin\DashboardController@index')->name('backoffice');
});

Route::get('/validation', 'validator\DashboardController@index')->name('validation');
Route::get('/validation/toValidate', 'validator\ArticleController@toValidate')->name('toValidate');
Route::get('/validation/validated', 'validator\ArticleController@validated')->name('validated');
Route::get('/validation/create/{id}', 'validator\ArticleController@create')->name('validation.create');
Route::post('/validation/store/{article}', 'validator\ArticleController@store')->name('validation.store');
Route::get('/validation/edit/{validation}', 'validator\ArticleController@edit')->name('validation.edit');
Route::patch('/validation/update/{validation}', 'validator\ArticleController@update')->name('validation.update');

Auth::routes();
Route::get('/articles/search', 'ArticleController@search');
Route::get('/articles', 'ArticleController@all');
Route::get('/home', 'ArticleController@index')->name('home');
Route::get('/', 'ArticleController@index');
