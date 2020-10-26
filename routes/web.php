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

Route::get('/', function () {
   // return view('welcome');
	return view('auth.login');

});

Auth::routes();
Route::group(['middleware'=>['auth','Admin']], function()
{   
	
   Route::get('changeStatus', 'userController@changeStatus');
 

Route::get('/welcome', function () {
  return view('slicing.index');
});


});
Route::resource('user', 'userController');


//Route::resource('user', 'userController');


//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/welcome', function () {
   //return view('slicing.index');
//});

//Route::get('/admin','FetchController@admin');
//Route::get('/software','FetchController@softwareDeveloper');
//Route::get('/support','FetchController@itSupport');