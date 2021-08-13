<?php

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Route;


// Login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

//Dashboard
//Route::group(['prefix' => '{language}','middleware'=>['Language','locale']], function (){
//    Route::get('/', 'HomeController@index')->name('home');
//    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//    Route::resource('admins','AdminController');
//    Route::resource('roles','RoleController');
//});

//Route::get('/', 'HomeController@index')->name('home');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//Route::resource('admins','AdminController');
//Route::resource('roles','RoleController');
//Route::post('change-password','AdminController@password')->name('change-password');

Route::get('/', 'HomeController@index')->name('home');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::resource('admins', 'AdminController');
Route::resource('roles', 'RoleController');
Route::post('change-password', 'AdminController@password')->name('change-password');
Route::resource('profile-setting', 'ProfileController');
Route::post('profile-setting/change-password', 'ProfileController@accountSettings')->name('profile-password');
Route::resource('nationality', 'NationalityController');
Route::resource('users', 'UserController');
Route::resource('families', 'FamilyController');
Route::get('families/create/{id}','FamilyController@create_family')->name('family-create');
Route::resource('date-setup','DateSetupController');
Route::resource('page','PageController');
Route::resource('event','EventController');
Route::get('event/create/{id}','EventController@create_event')->name('event-create');

Route::get('lang/{locale}', 'LocalizationController@index')->name('lang');
