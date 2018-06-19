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

//Route::get('/', function () {
   // return view('frontpage');
//});
//Route::get('/','SliderController@index');

Auth::routes();

Route::get('/', 'HomeController@index');
Route::post('/reservation','ReservationController@reserve')->name('reservation.reserve');
Route::post('/contact','ContactController@sendMessage')->name('contact.send');


Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'],function(){
	Route::get('dashboard','DashboardController@index')->name('admin.dashboard');
	//controller for slider
	Route::resource('table','TableContentController');
	//controller for slider end
	Route::resource('category','CategoryController');
	Route::resource('item','ItemController');
	Route::resource('order','OrderController');
	Route::resource('tinfo','TableController');
	Route::resource('employee','EmployeeController');
	Route::resource('purchase','PurchaseController');
	Route::resource('supplier','SupplierController');
	Route::resource('sale','SaleController');
	Route::get('orders','OrderController@itemOrder')->name('orders.itemOrder');
	Route::get('puchases','PurchaseController@itemPurchase')->name('purchases.itemPurchase');
	Route::get('reservation','ReservationAdminController@index')->name('reservation.index');
	Route::get('reservecreate','ReservationAdminController@create')->name('reserve.create');
	Route::post('reservestore','ReservationAdminController@store')->name('reserve.store');
	Route::get('edit/{id}','ReservationAdminController@edit')->name('reservation.edit');
	Route::put('update/{id}','ReservationAdminController@update')->name('reservation.update');

	Route::post('reservation/{id}','ReservationAdminController@status')->name('reservation.status');

	Route::delete('reservation/{id}','ReservationAdminController@destroy')->name('reservation.destroy');
	Route::get('contacts','ContactAdminController@index')->name('contacts.index');
	Route::get('contacts/{id}','ContactAdminController@show')->name('contacts.show');
	Route::delete('contacts/{id}','ContactAdminController@destroy')->name('contacts.destroy');
	Route::get('summery','SummeryController@index')->name('summery.index');
	Route::get('daywise','SummeryController@daywise')->name('daywise');
	Route::get('daybase/{id}','SummeryController@daybaseshow')->name('daybase.show');
	
	Route::post('daywise',[
    'as' => 'summery.daywisesale',
    'uses' => 'SummeryController@daywisereport'
]);
	Route::get('monthwise','SummeryController@monthwise')->name('monthwise');
	Route::get('monthbase/{id}','SummeryController@monthbaseshow')->name('monthbase.show');
	Route::post('monthwise',[
    'as' => 'summery.monthwisesale',
    'uses' => 'SummeryController@monthwisereport'
]);
	Route::get('mostsold','SummeryController@mostsold')->name('mostsold');

});