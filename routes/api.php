<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('role', 'API\ApiRoleController');
Route::get('role/get/user/{user}', 'API\ApiRoleController@getRolesBasedOnPermission')->name('role.userbased.list');

Route::apiResource('permissions', 'API\ApiPermissionController');
Route::get('permissions/role/{id}', 'API\ApiPermissionController@permission_per_role');


Route::prefix('user')->group(function () {
    Route::get('profile', 'API\ApiUserController@profile')->name('user.profile');
    Route::patch('update/profile/picture/{id}', 'API\ApiUserController@update_profile_pic')->name('user.profile.pic.update');
});
Route::apiResource('user', 'API\ApiUserController');

Route::post('add_user_data', 'API\ApiChartController@add_user_chart');

Route::post('get_chart_data', 'API\ApiChartController@get_chart_data');


Route::post('add_details', 'API\ApiCovidDetailsController@add_details');

Route::get('get_covid_data', 'API\ApiCovidDetailsController@get_details');

Route::get('search_covid_data/{serach_data}','API\ApiCovidDetailsController@search_covid_data');

Route::patch('update_details/{update_id}','API\\ApiCovidDetailsController@details_update');

Route::delete('delete_details/{update_id}','API\\ApiCovidDetailsController@details_delete');
