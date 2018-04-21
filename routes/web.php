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

Route::get('/', 'CustomerController@viewIndex');
Route::group(array('prefix' => 'admin', 'middleware'=>'manager'), function () {
	
	//Route::get('product', 'ProductController@view');
	Route::get('products', 'ProductController@viewAll');
	Route::post('products', 'ProductController@viewAll');
	//Route::get('product/show', 'ProductController@show');
	Route::get('product/delete', 'ProductController@delete');
	Route::get('product/add', 'ProductController@addView');
	Route::post('product/add', 'ProductController@addProduct');
	Route::post('product/quickadd', 'ProductController@quickAddProduct');
	Route::get('autocomplete/category', 'ProductController@autocomplete');
	Route::get('category/add', 'CategoryController@addView');
	Route::post('category/add', 'CategoryController@addCategory');
	Route::get('quotation/add', 'QuotationController@addView');
	Route::post('quotation/add', 'QuotationController@addQuote');
	Route::get('quotation/all', 'QuotationController@viewAll');
	Route::get('quotation/report', 'QuotationController@report');
	Route::get('quotation/', 'QuotationController@all');
	Route::post('quotation/', 'QuotationController@all');
	Route::get('quotation/deleteAll', 'QuotationController@deleteAll');
	Route::get('quotation/{id?}/show', 'QuotationController@show');
	Route::post('quotation/{id?}/show', 'QuotationController@update');
	Route::get('quotation/{id?}/delete', 'QuotationController@delete');
	Route::get('autocomplete/quotation', 'QuotationController@autocomplete');
	Route::get('autocomplete/customer', 'QuotationController@autoCustomer');
	Route::get('autocomplete/supplier', 'SupplierController@autocomplete');
	Route::post('blur/quotation', 'QuotationController@blur');
	Route::post('blur/customer', 'QuotationController@blurCustomer');
	Route::post('blur/supplier', 'SupplierController@blur');
	Route::get('customer/add', 'CustomerController@addView');
	Route::post('customer/add', 'CustomerController@add');
	Route::post('customer/quickadd', 'CustomerController@quickadd');
	Route::get('stock/all', 'StockController@viewAll');
	Route::get('customer', 'CustomerController@all');
	Route::post('ajax/deleteQuote', 'QuotationController@deleteQuote');
	Route::post('ajax/cusquickadd', 'CustomerController@cusQuickAdd');
	Route::post('ajax/supquickadd', 'SupplierController@supQuickAdd');
	Route::get('supplier/test', 'SupplierController@test');
	Route::post('supplier/quickadd', 'SupplierController@quickAdd');
	Route::get('supplier', 'SupplierController@all' );
	Route::get('supplier/{id?}/delete', 'SupplierController@delete' );
	Route::get('/', 'CustomerController@viewIndex');	
	//Test View Index
	
	//Route::get('customer/', 'CustomerController@all');
	Route::get('customer/addcustomer', 'CustomerController@addnew');
	Route::post('customer/', 'CustomerController@all');
	Route::post('customer/all/', 'CustomerController@viewAll');
	Route::get('customer/{id?}/show', 'CustomerController@show');
	Route::post('customer/{id?}/show', 'CustomerController@update');
	Route::get('customer/{id?}/delete', 'CustomerController@delete');
	Route::get('supplier/add', 'SupplierController@addView');
	Route::post('supplier/add', 'SupplierController@add');
	Route::post('supplier/all', 'SupplierController@all');
	Route::get('quotation/report', 'QuotationController@report');
	Route::post('quotation/report', 'QuotationController@reportedSelect');
	Route::post('customer/upload', 'UploadController@uploadCustomer');
	Route::post('customer/download', 'UploadController@downloadExcel');
	//Route::get('users/register', 'Auth\RegisterController@getRegister');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('users/logout', 'Auth\LoginController@logout');
Route::get('users/register', 'Auth\RegisterController@showRegistrationForm');
//Route::get('users/register', 'Auth\AuthController@getRegister');
//Route::post('users/register', 'Auth\AuthController@postRegister');

Route::group(array('prefix' => 'manager', 'middleware'=>'supermanager'), function () {

	Route::get('/users','ManagerController@viewUsers');
	Route::get('/home','ManagerController@viewHome');
	//Route::get('/newuser','Auth\RegisterController@showRegistrationForm');
	Route::post('/newuser','ManagerController@newUser');
	Route::get('/newuser','ManagerController@newUserView');
	Route::get('/user/{id?}/show', 'UserController@show');
	Route::post('/ajax/deleteuser', 'UserController@delete');


});
