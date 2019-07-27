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
    return view('welcome');
});

Auth::routes([
    'register' => false,
    'verify' => true
]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/setupNewSociety', 'HomeController@setupNewSociety')->name('setupNewSociety');
    Route::get('/societyList', 'HomeController@societyList')->name('societyList');
    Route::get('/setSociety/{societyId}', 'HomeController@setSociety')->name('setSociety');

    Route::group(['middleware' => ['checkBasicConf']], function () {
        Route::get('/home', 'HomeController@index')->name('dashboard');

        //Member
        Route::resource('members', 'MemberController');
        //Wing
        Route::resource('wings', 'WingController');
    });
});
