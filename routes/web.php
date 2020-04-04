<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('auth', 'Auth\LoginController@login')->name('sign-in');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');



Route::group(['middleware'=>'auth'],function(){
	//Logout
	Route::get('logout', 'Auth\LoginController@logout')->name('logout');

	//Teacher
	Route::group(['prefix' => 'teacher', 'namespace' => 'teacher'],function(){
		//Dashboard
		Route::get('/dashboard', 'DashboardController@index')->name('teacher');
	});
	
});

