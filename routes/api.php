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

/* Customer routes */
Route::get('customer/{id}', 'CustomerController@getCustomerById')->where('id', '[0-9]+');
Route::post('customer', 'CustomerController@addNewCustomer');
Route::get('customer/good/', 'CustomerController@getGoodCustomers');
Route::get('customer/better', 'CustomerController@getBetterCustomers');

/* Order routes */
Route::post('order', 'OrderController@addNewOrder');
Route::get('order/latest', 'OrderController@getLastOrderForAllCustomers');
Route::post('order/paid', 'OrderController@setOrderToPaid');


/* Subscription routes */
Route::get('subscription/{id}', 'SubscriptionController@getSubscriptionById');
Route::post('subscription', 'SubscriptionController@addNewSubscription');
Route::post('subscription/frequency', 'SubscriptionController@setFrequencyByCustomerId');


/* Delivery routes */
Route::get('delivery/csv', 'DeliveryController@getCSV');
