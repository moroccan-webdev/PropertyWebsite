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
Route::group(['middleware' => 'web'], function (){
  Auth::routes();
  Route::get('/', function () {
      return view('welcome');
  });
  Route::get('/showAllBuilding', 'BuController@showAllEnable');
  Route::get('/forRent', 'BuController@forRent');
  Route::get('/forBuy', 'BuController@forBuy');
  Route::get('/type/{tupe}', 'BuController@showByType');
  Route::get('/home', 'HomeController@index');
  Route::get('/search', 'BuController@search');
});


/*
  admin route
*/
Route::group(['middleware' => ['web','admin']] , function(){
     Route::get('/adminpanel/user/data',['as' => 'adminpael.user.data','uses' => 'UserController@anyData']);
     Route::get('/adminpanel/bu/data',['as' => 'adminpael.bu.data','uses' => 'BuController@anyData']);

     Route::get('/adminpanel','AdminController@index');

     //users
     Route::resource('/adminpanel/user','UserController');
     Route::post('adminpanel/user/changePassword/','UserController@UpdatePassword');
     Route::get('/adminpanel/user/{id}/delete','UserController@destroy');

     //Buildings
     Route::resource('/adminpanel/bu','BuController');
     Route::get('/adminpanel/bu/{id}/delete','BuController@destroy');

     //setting site_settings
     Route::get('/adminpanel/sitesetting','SiteSettingController@index');
     Route::post('/adminpanel/sitesetting','SiteSettingController@store');
});
