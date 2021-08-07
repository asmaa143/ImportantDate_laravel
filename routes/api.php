<?php

use App\Http\Controllers\Api\UserAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware'=>['api','checkPassword','changeLang','auth:sanctum']],function (){

    //Route::post('/get-users','UserAPIController@index');
    Route::post('nationalities','NationalityApiController@index');
    Route::post('dates-type','DateTypeApiController@index');
    Route::post('gender','MainApiController@gender');
    Route::post('change-password','UserProfileApiController@changePassword');
    //Route::post('delete-account','SettingApiController@delete_account');
    //Route::post('get-nationality-byId', 'UserAPIController@getNationalityById');
    Route::post("logout",'AuthApiController@logout');

});


Route::post("register",'AuthApiController@register');
Route::post("login",'AuthApiController@login');
Route::post("password/email",'ForgotPasswordApiController@sendResetCode');
Route::post("password/code",'ForgotPasswordApiController@loginResetCode');


