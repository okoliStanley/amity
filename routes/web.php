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
   

 /* Route::get('/', function() {
    return view('welcome');
});*/


Auth::routes();

Route::get('password/email', ['as' => 'password.request', // password.request
 	'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']); 

Route::post('password/reset/{token}','Auth\ResetPasswordController@reset'); 

Route::get('backend/dashboard', ['as' => 'backend.dashboard', 'uses' => 'Backend\DashboardController@index']); 

 Route::get('/auth/logout',['as' => 'auth.logout','uses' => 'Auth\LoginController@logout']); 

 Route::resource('backend/users', 'Backend\UsersController', ['except' => ['show']]);

 Route::resource('backend/pages', 'Backend\PagesController', ['except'=>['show']]);

 Route::resource('backend/blog', 'Backend\BlogController');

 Route::get('backend/blog/{blog}/confirm', ['as' => 'blog.confirm', 'uses' => 'Backend\BlogController@confirm']);

 Route::get('backend/pages/{pages}/confirm', ['as' => 'backend.pages.confirm', 'uses' => 'Backend\PagesController@confirm']);

 Route::get('backend/users/{users}/confirm', ['as' => 'backend.users.confirm', 'uses' => 'Backend\UsersController@confirm']);

 



