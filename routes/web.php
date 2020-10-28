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

Route::group(['middleware' => 'web'], function (){

	Route::get('/', 'controller@index');

	Route::get('/roles', 'controller@roles');
	Route::post('/updaterolesprocess/{id}', 'controller@updaterolesprocess');
	Route::post('/addrolesprocess', 'controller@addrolesprocess');
	Route::get('/deleterolesprocess/{id}', 'controller@deleterolesprocess');

	Route::get('/users', 'controller@users');
	Route::post('/updateusersprocess/{id}', 'controller@updateusersprocess');
	Route::post('/addusersprocess', 'controller@addusersprocess');
	Route::get('/deleteusersprocess/{id}', 'controller@deleteusersprocess');

	Route::get('/expense_categories', 'controller@expense_cat');
	Route::post('/updateexpense_catprocess/{id}', 'controller@updateexpense_catprocess');
	Route::post('/addexpense_catprocess', 'controller@addexpense_catprocess');
	Route::get('/deleteexpense_catprocess/{id}', 'controller@deleteexpense_catprocess');

	Route::get('/expenses', 'controller@expenses');
	Route::post('/updateexpensesprocess/{id}', 'controller@updateexpensesprocess');
	Route::post('/addexpensesprocess', 'controller@addexpensesprocess');
	Route::get('/deleteexpensesprocess/{id}', 'controller@deleteexpensesprocess');

});