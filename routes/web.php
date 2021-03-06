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



Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

/*
 * Google Login Callback Routes
 */
Route::get('/login/google','Auth\LoginController@redirectToGoogle');
Route::get('/callback/google','Auth\LoginController@handleGoogleCallback');

/*
 * Administrator Routes
 */

Route::get('/admin/admin','AdminController@show');

/*
 * Card Routes
 */
Route::resource('admin/manageCards','Admin\ManageCardController');