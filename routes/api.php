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

Route::group(['middleware'=>['api','changeLang','auth:sanctum']],function (){

    Route::post('nationalities','NationalityApiController@index');
    Route::post('dates-type','DateTypeApiController@index');
    Route::post('gender','MainApiController@gender');
    Route::post('change-password','UserProfileApiController@changePassword');
    Route::apiResource('user','UserAPIController');
    Route::apiResource('family','FamilyApiController');
    Route::get('event','EventApiController@getAll');
    Route::post('event/store','EventApiController@store');
    Route::post("logout",'AuthApiController@logout');

    Route::post('/store-token', 'NotificationApiController@storeToken');
    Route::post('/send-api-notification', 'NotificationApiController@sendApiNotification');
    Route::get('test','NotificationApiController@sendWifeNotification');

});


Route::post("register",'AuthApiController@register');
Route::post("login",'AuthApiController@login');
Route::post("password/email",'ForgotPasswordApiController@sendResetCode');
Route::post("password/code",'ForgotPasswordApiController@loginResetCode');


