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

Route::get('customer/{id}', 'CustomerController@customer');


Route::get('customer_name', function() {
    $customer = App\Customer::where('name', '=', 'Tony')->first();
    echo $customer->ID;
});

Route::get('orders', function() {
    $orders = App\Order::all();
    foreach($orders as $order){
        echo $order->name . ' belongs to ' . $order->customer->name . '<br>';
    }
});

Route::get('mypage', function () {
    $data = array(
        'var1' => 'Hamburger',
        'var2' => 'Hot Dog',
        'var3' => 'French Fries',
        'orders' => App\Order::all()
    );
    return view('mypage', $data);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['admin']], function() {
  Route::get('admin', function() {
    echo 'You have access!';
  });
});
