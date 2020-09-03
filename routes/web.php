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
    Route::get('/setSociety', 'HomeController@setSociety')->name('setSociety');

    Route::group(['middleware' => ['checkBasicConf']], function () {
        Route::group(['middleware' => ['checkPermission:0']], function () {
            Route::get('/home', 'HomeController@index')->name('dashboard');
        });

        Route::group(['middleware' => ['checkPermission:1']], function () {
            //Member
            Route::resource('members', 'MemberController');
            //Wing
            Route::resource('wings', 'WingController');
            //Flat
            Route::resource('flats', 'FlatController');

            Route::namespace('Incomes')->group(function () {
                Route::resource('incomes/category', 'IncomeCategoryController', [
                    'as' => 'incomes'
                ]);

                Route::resource('incomes', 'IncomeController');
            });

            Route::namespace('Expense')->group(function () {
                //Expense
                Route::resource('expenses', 'ExpenseController');
                Route::get('expenses/viewInvoice/{expenseId}', 'ExpenseController@viewInvoice')->name('expenses.viewInvoice');
            });


            //Notice
            Route::resource('notices', 'NoticeController');

            //Service
            Route::resource('services', 'ServiceController');

            //Charge
            Route::resource('charges', 'ChargeController');
        });
    });
});
