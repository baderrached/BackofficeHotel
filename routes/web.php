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
	Route::get('Intervention', ['as' => 'Intervention.index', 'uses' => 'App\Http\Controllers\InterventionController@index']);
	
	Route::POST('res_edit', ['as' => 'res.edit', 'uses' => 'App\Http\Controllers\ReservationController@edit']);

	Route::get('extra', ['as' => 'Extra.index', 'uses' => 'App\Http\Controllers\ExtraController@index']);
	Route::get('extralist', ['as' => 'extra.list', 'uses' => 'App\Http\Controllers\ExtraController@list']);
	Route::get('extraadd', ['as' => 'extra.add', 'uses' => 'App\Http\Controllers\ExtraController@add']);
	Route::post('extrainsert', 'App\Http\Controllers\ExtraController@insert');
	Route::get('/Delete/extra/{id}', ['as' => 'extra.done', 'uses' => 'App\Http\Controllers\ExtraController@done']);
	Route::get('/Done/InterventionController/{id}', ['as' => 'interv.done', 'uses' => 'App\Http\Controllers\InterventionController@done']);

	
	Route::get('/rooms', ['as' => 'rooms.index', 'uses' => 'App\Http\Controllers\RoomsController@index']);
	Route::get('/roomadd', ['as' => 'rooms.add', 'uses' => 'App\Http\Controllers\RoomsController@add']);
	Route::post('/room_insert', 'App\Http\Controllers\RoomsController@insert')->name('rooms.insert');
	Route::get('/Restore/Room/{id}', ['as' => 'room.restore', 'uses' => 'App\Http\Controllers\RoomsController@restoreRoom']);
	Route::get('/Delete/Room/{id}', ['as' => 'room.delete', 'uses' => 'App\Http\Controllers\RoomsController@deleteRoom']);
	Route::get('/Update/room/{id}', ['as' => 'room.update', 'uses' => 'App\Http\Controllers\RoomsController@getedit']);
	Route::put('/roomedit', ['as' => 'room.edit', 'uses' => 'App\Http\Controllers\RoomsController@update']);



	Route::get('/hotel', ['as' => 'hotel.index', 'uses' => 'App\Http\Controllers\HotelController@index']);
	Route::get('/hoteladd', ['as' => 'hotel.add', 'uses' => 'App\Http\Controllers\HotelController@add']);
	Route::post('/hotel_insert', 'App\Http\Controllers\HotelController@insert')->name('hotel.insert');
	Route::get('/Restore/hotel/{id}', ['as' => 'hotel.restore', 'uses' => 'App\Http\Controllers\HotelController@restoreHotel']);
	Route::get('/Delete/hotel/{id}', ['as' => 'hotel.delete', 'uses' => 'App\Http\Controllers\HotelController@deleteHotel']);
	Route::post('/hoteledit/{id}', ['as' => 'hotel.edit', 'uses' => 'App\Http\Controllers\HotelController@edit']);
	Route::get('/Update/Hotel/{id}', ['as' => 'Hotel.update', 'uses' => 'App\Http\Controllers\HotelController@getedit']);

	Route::get('/admin', ['as' => 'admin.index', 'uses' => 'App\Http\Controllers\AdminController@index']);
	Route::get('/admin/add', ['as' => 'admin.add', 'uses' => 'App\Http\Controllers\AdminController@add']);
	Route::get('/Update/admin/{id}', ['as' => 'admin.edit', 'uses' => 'App\Http\Controllers\AdminController@update']);
	Route::post('/edit/admin/{id}', ['as' => 'admin.update', 'uses' => 'App\Http\Controllers\AdminController@edit']);
	

	Route::post('/admin/insert', 'App\Http\Controllers\AdminController@insert')->name('admin.insert');
	Route::get('/Restore/admin/{id}', ['as' => 'admin.restore', 'uses' => 'App\Http\Controllers\AdminController@restoreAdmin']);
	Route::get('/Delete/admin/{id}', ['as' => 'admin.delete', 'uses' => 'App\Http\Controllers\AdminController@deleteAdmin']);



	Route::get('/sparesto', ['as' => 'SpaResto.index', 'uses' => 'App\Http\Controllers\SparestoController@index']);
	Route::get('/sparesto/add', ['as' => 'SpaResto.add', 'uses' => 'App\Http\Controllers\SparestoController@add']);
	Route::get('/Update/sparesto/{id}', ['as' => 'SpaResto.edit', 'uses' => 'App\Http\Controllers\SparestoController@update']);
	Route::post('/sparesto/add', ['as' => 'SpaResto.insert', 'uses' => 'App\Http\Controllers\SparestoController@insert']);
	Route::get('/Restore/Spa/{id}', ['as' => 'spa.restore', 'uses' => 'App\Http\Controllers\SparestoController@restoreSpa']);
	Route::get('/Delete/Spa/{id}', ['as' => 'spa.delete', 'uses' => 'App\Http\Controllers\SparestoController@deleteSpa']);









});

