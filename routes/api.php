<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace' => 'Api\Auth',
    'middleware' => 'api',
    'prefix' => 'password'
], function () {
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});

Route::group(['namespace' => 'Api\v1', 'prefix' => 'v1'], function(){
    Route::resource('register', 'RegisterController');
    Route::resource('login','LoginController');
});

Route::group(['namespace' => 'Api\v1', 'prefix' => 'v1','middleware' => 'auth:api'], function(){
    Route::resource('users', 'UserController');
    Route::resource('legal-cases', 'LegalCaseController');
    Route::get('legal-case/status/{status_id}', 'LegalCaseController@byStatus');
    Route::get('legal-case/user', 'LegalCaseController@allByUser');
    
    Route::resource('cities', 'CityController');
    Route::resource('segments-companies', 'SegmentCompanyController');


    Route::post('case/{id}/initial-petition', 'FileCaseController@storeInitialPetition');
    Route::get('case/{id}/initial-petition', 'FileCaseController@getInitialPetition');
    Route::post('case/{id}/attachment', 'FileCaseController@storeAttachment');
    Route::get('case/{id}/attachments', 'FileCaseController@getAttachments');
    Route::delete('attachment/{id}/delete', 'FileCaseController@deleteAttachment');
});
