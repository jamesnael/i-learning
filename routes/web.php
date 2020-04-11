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

// Auth::routes();
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login')->name('sign-in');
Route::post('register', 'Auth\RegisterController@register')->name('register');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::group(['middleware'=>'auth'],function(){
	//Logout
	Route::get('logout', 'Auth\LoginController@logout')->name('logout');

	//Dashboard
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	
	//Teacher
	Route::group(['prefix' => 'teacher', 'namespace' => 'teacher'],function(){
		//Materi
		Route::group(['prefix' => 'materi', 'as' => 'materi'],function(){
			Route::get('/', 'MateriController@index')->name('');
			Route::get('/create', 'MateriController@create')->name('-add');
			Route::post('/save', 'MateriController@store')->name('-store');
			Route::get('/loadTable', 'MateriController@loadTable')->name('-data');
			Route::delete('/delete/', 'MateriController@destroy')->name('-delete');
			Route::get('/edit/{id}', 'MateriController@edit')->name('-edit');
			Route::put('/update/{id}', 'MateriController@update')->name('-update');
		});

		//Tugas
		Route::group(['prefix' => 'tugas', 'as' => 'tugas'],function(){
			Route::get('/', 'TugasController@index')->name('');
			Route::get('/create', 'TugasController@create')->name('-add');
			Route::post('/save', 'TugasController@store')->name('-store');
			Route::get('/loadTable', 'TugasController@loadTable')->name('-data');
			Route::delete('/delete/', 'TugasController@destroy')->name('-delete');
			Route::get('/edit/{id}', 'TugasController@edit')->name('-edit');
			Route::put('/update/{id}', 'TugasController@update')->name('-update');
			Route::get('/jsonTugasFinish', 'TugasController@jsonTugasFinish')->name('-json-finish');
			Route::get('/jsonTugasUnfinish', 'TugasController@jsonTugasUnfinish')->name('-json-unfinish');
		});

		//Teacher Profile
		Route::group(['prefix'=>'user-profile'],function(){
			Route::get('/', 'ProfileController@index')->name('teacher-profile');
			Route::post('/changePicture', 'ProfileController@change_profile_picture')->name('teacher-change-picture');
			Route::post('/changeInformation', 'ProfileController@change_profile_information')->name('teacher-change-information');
			Route::post('/changePassword', 'ProfileController@update_password')->name('teacher-change-password');
		});
	});
	Route::group(['prefix' => 'admin', 'namespace' => 'admin'],function(){
		//Activity log
		Route::group(['prefix'=>'activity-log'],function(){
			Route::get('/', 'ActivityLogController@index')->name('activity-log');
			Route::get('/view/{id}', 'ActivityLogController@view')->name('view_activity-log');
			Route::get('/view/{menu_name}/detail/{id}', 'ActivityLogController@detail')->name('detail_activity-log');
		});
		
		//Admin Profile
		Route::group(['prefix'=>'user-profile'],function(){
			Route::get('/', 'ProfileController@index')->name('admin-profile');
			Route::post('/changePicture', 'ProfileController@change_profile_picture')->name('admin-change-picture');
			Route::post('/changeInformation', 'ProfileController@change_profile_information')->name('admin-change-information');
			Route::post('/changePassword', 'ProfileController@update_password')->name('admin-change-password');
		});

		//Users
		Route::group(['prefix' => 'user', 'as' => 'user'],function(){
			Route::get('/', 'UserController@index')->name('');
			Route::get('/create', 'UserController@create')->name('-add');
			Route::post('/save', 'UserController@store')->name('-store');
			Route::get('/loadTable', 'UserController@loadTable')->name('-data');
			Route::delete('/delete/', 'UserController@destroy')->name('-delete');
			Route::get('/edit/{id}', 'UserController@edit')->name('-edit');
			Route::put('/update/{id}', 'UserController@update')->name('-update');
			Route::get('/detail/{id}', 'UserController@detail')->name('-detail');
			Route::get('/check_email', 'UserController@check')->name('-check');
		});

		//Contact
		Route::group(['prefix' => 'contact', 'as' => 'contact'],function(){
			Route::get('/', 'ContactController@index')->name('');
			Route::get('/loadTable', 'ContactController@loadTable')->name('-data');
			Route::get('/detail/{id}', 'ContactController@detail')->name('-detail');
			Route::get('/jsonContact', 'ContactController@jsonContact')->name('-json'); 
		});
	});
	Route::group(['prefix' => 'student', 'namespace' => 'student'], function(){
		//Tugas
		Route::group(['prefix' => 'tugas', 'as' => 'tugas'],function(){
			Route::get('/','TugasController@index')->name('-student');
			Route::get('/detail/{url}','TugasController@detail')->name('-detail');
			Route::post('/kirimTugas', 'TugasController@kirim_tugas')->name('-kirim');
		});
		// Materi
		Route::group(['prefix' => 'materi', 'as' => 'materi'],function(){
			Route::get('/','MateriController@index')->name('-student');
			Route::get('/kelas_x','MateriController@index')->name('-kelasx');
			Route::get('/kelas_xi','MateriController@index')->name('-kelasxi');
			Route::get('/kelas_xii','MateriController@index')->name('-kelasxii');
			Route::get('/detail/{url}','MateriController@detail')->name('-detail');
		});
		// Contact Us
		Route::group(['prefix' => 'contact_us', 'as' => 'contactus'], function(){
			Route::get('/','ContactusController@index')->name('-student');
			Route::post('/storeMessage','ContactusController@store')->name('-add');
		});
		//Student Profile
		Route::group(['prefix'=>'user-profile'],function(){
			Route::get('/', 'ProfileController@index')->name('student-profile');
			Route::post('/changePicture', 'ProfileController@change_profile_picture')->name('student-change-picture');
			Route::post('/changeInformation', 'ProfileController@change_profile_information')->name('student-change-information');
			Route::post('/changePassword', 'ProfileController@update_password')->name('student-change-password');
		});
	});
});

