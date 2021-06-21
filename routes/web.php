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
    return view('pages.home');
})->name('home');

Route::get('/costumize', function () {
    return view('pages.home');
})->name('costumize');

Route::get('/contacts', function () {
    return view('pages.home');
})->name('contacts');

Auth::routes();

Route::get('/profile', 'UserController@index')->middleware('auth')->name('user.profile');
Route::get('/staff', 'UserController@staff')->middleware('auth')->name('user.staff');


Route::get('/catalog', 'StampsController@index')->name('stamps.catalog');
Route::get('/stamp/{id}', 'StampsController@detalhes');
Route::post('/stamp/{id}', 'EncomendaController@addToCart')->name('carrinho.add');


Route::get('/staff/{id}/profile', 'UserController@staffProfile')->middleware('auth')->name('user.staff.profile');

Route::post('/profile', 'UserController@edit')->middleware('auth')->name('user.edit');
Route::post('/staff/{id}/profile', 'UserController@editStaff')->middleware('auth')->name('user.staff.edit');
