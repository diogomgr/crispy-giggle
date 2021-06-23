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
    abort(404);
})->middleware(['auth', 'verified'])->name('costumize');

Route::get('/contacts', function () {
    return view('pages.home');
})->name('contacts');

Auth::routes(['verify' => true]);

Route::get('/catalog', 'StampsController@index')->name('stamps.index');
Route::post('/catalog', 'StampsController@index')->name('stamps.index');

Route::get('/stamp/{id}', 'StampsController@detalhes')->middleware(['auth', 'verified']);
Route::post('/stamp/{id}', 'EncomendaController@addToCart')->middleware(['auth', 'verified'])->name('carrinho.add');

Route::post('/profile', 'UserController@editProfile')->middleware(['auth', 'verified'])->name('user.edit');
Route::get('/profile', 'UserController@showProfile')->middleware(['auth', 'verified'])->name('user.profile');
Route::post('/profile/{id?}', 'UserController@blockProfile')->middleware(['auth', 'verified'])->name('user.block');

Route::get('/staff', 'UserController@listStaff')->middleware(['auth', 'verified'])->name('user.staff');
Route::get('/staff/{id}', 'UserController@showStaffProfile')->middleware(['auth', 'verified'])->name('user.staff.profile');
Route::post('/staff/{id}/profile', 'UserController@editStaff')->middleware(['auth', 'verified'])->name('user.staff.edit');

Route::get('/cart', 'EncomendaController@viewCart')->middleware(['auth', 'verified'])->name('carrinho.index');
Route::post('/cart/{id}', 'EncomendaController@removeItem')->middleware(['auth', 'verified'])->name('carrinho.remove');
