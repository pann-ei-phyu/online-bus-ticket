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
Route::middleware('auth')->group(
function()
{
	Route::resource('car_routes','car_routeController');
	Route::resource('cities','CityController');
	Route::resource('bustypes','BusTypeController');
	Route::resource('companies','CompanyController');
	Route::resource('nations','NationController');
	Route::resource('customers','CustomerController');
	Route::get('dashboard','PageController@dashboard')->name('dashboard');
	Route::get('mail','MailController@mail');
	Route::post('sendmail','MailController@sendmail')->name("sendmail");
});


// front end
Route::get('/', 'PageController@home')->name('main');

Route::resource('contacts','ContactController');

Route::post('search','PageController@search')->name('search');

Route::get('routedetail/{id}/{total}/{date}/{noseats}','PageController@routedetail')->name('routedetail');
Route::get('customerinfo','PageController@customerinfo')->name('customerinfo');

Route::get('maildetail','PageController@maildetail')->name('maildetail');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('bookings','BookingController');







// Route::get('/', function () {
//     return view('index');
// });

// Route::get('about', function () {
//     return view('about');
// });

// Route::get('contact', function () {
//     return view('contact');
// });

// Route::get('activities',function(){
// 	return view('activities');
// });

// Route::get('schedule',function(){
// 	return view('schedule');
// });