<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');



Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	Route::get('client', ['as' => 'clients.index', 'uses' => 'App\Http\Controllers\ClientController@index']);
	Route::get('reservation', ['as' => 'Reservation.index', 'uses' => 'App\Http\Controllers\ReservationController@index']);
	Route::POST('res_edit', ['as' => 'res.edit', 'uses' => 'App\Http\Controllers\ReservationController@edit']);

	Route::get('extra', ['as' => 'Extra.index', 'uses' => 'App\Http\Controllers\ExtraController@index']);
	Route::get('extralist', ['as' => 'extra.list', 'uses' => 'App\Http\Controllers\ExtraController@list']);
	Route::get('extraadd', ['as' => 'extra.add', 'uses' => 'App\Http\Controllers\ExtraController@add']);
	
	Route::get('rooms', ['as' => 'rooms.index', 'uses' => 'App\Http\Controllers\RoomsController@index']);
	Route::get('roomadd', ['as' => 'rooms.add', 'uses' => 'App\Http\Controllers\RoomsController@add']);
	Route::post('room_insert', 'App\Http\Controllers\RoomsController@insert')->name('rooms.insert');
	Route::get('Restore/Room/{id}', ['as' => 'room.restore', 'uses' => 'App\Http\Controllers\RoomsController@restoreRoom']);
	Route::get('Delete/Room/{id}', ['as' => 'room.delete', 'uses' => 'App\Http\Controllers\RoomsController@deleteRoom']);
	Route::get('Update/room/{id}', ['as' => 'room.update', 'uses' => 'App\Http\Controllers\RoomsController@getedit']);
	Route::put('roomedit', ['as' => 'room.edit', 'uses' => 'App\Http\Controllers\ProfileController@update']);



	Route::get('hotel', ['as' => 'hotel.index', 'uses' => 'App\Http\Controllers\HotelController@index']);
	Route::get('hoteladd', ['as' => 'hotel.add', 'uses' => 'App\Http\Controllers\HotelController@add']);
	Route::post('hotel_insert', 'App\Http\Controllers\HotelController@insert')->name('hotel.insert');
	Route::get('Restore/hotel/{id}', ['as' => 'hotel.restore', 'uses' => 'App\Http\Controllers\HotelController@restoreHotel']);
	Route::get('Delete/hotel/{id}', ['as' => 'hotel.delete', 'uses' => 'App\Http\Controllers\HotelController@deleteHotel']);
	Route::put('hoteledit', ['as' => 'hotel.edit', 'uses' => 'App\Http\Controllers\ProfileController@update']);






});

