<?php

use App\Http\Controllers\MemberController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('user/profile' , 'UserController@profile')->name('user.show.profile');
    Route::resource('user', 'UserController');
    Route::resource('permission', 'PermissionController');
    Route::get('member/add_member','MemberController@add_member')->name('member.add_member');

});

Route::get('product/add_product','HomeController@add_product')->name('member.add_product');


Route::get('/chart','HomeController@chart')->name('member.chart');

Route::get('/test','HomeController@test')->name('member.test');

Route::get('/addnew','HomeController@addnew')->name('member.addnew');

Route::get('/liveupdate','HomeController@liveupdate')->name('member.liveupdate');


