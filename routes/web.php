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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index');

Route::get('users/payment_panel', [
	'as' => 'users.paymentPanel',
	'uses' => 'UserController@paymentPanel'
]);

Route::get('users/payment_panel/confirm/{id}', [
	'as' => 'users.confirmPayment',
	'uses' => 'UserController@confirmPayment'
]);

Route::get('users/payment_panel/promise/{id}', [
	'as' => 'users.promisePayment',
	'uses' => 'UserController@promisePayment'
]);

//Verifica os pacotes vencidos e desativa as contas. Deve ficar em Scheduller/Cron diário
Route::get('users/payments/update_situations', [
	'as' => 'users.updatePaymentSituations',
	'uses' => 'UserController@updatePaymentSituations'
]);

Route::resource('users', 'UserController');


Route::resource('plans', 'PlanController');

Route::resource('plans', 'PlanController');