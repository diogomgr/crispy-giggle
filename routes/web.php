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
})->middleware(['auth', 'verified'])->name('costumize');

Route::get('/contacts', function () {
    return view('pages.home');
})->name('contacts');

Auth::routes(['verify' => true]);

Route::get('/profile', 'UserController@index')->middleware(['auth', 'verified'])->name('user.profile');
Route::get('/staff', 'UserController@staff')->middleware(['auth', 'verified'])->name('user.staff');

Route::get('/encomendas', 'EncomendaController@estadoEncomendas')->middleware(['auth', 'verified'])->name('encomendas.index');
Route::get('/historico', 'HistoricoController@historicoEncomendas')->middleware(['auth', 'verified'])->name('historico.index');

Route::get('/catalog', 'StampsController@index')->name('stamps.catalog');
Route::get('/stamp/{id}', 'StampsController@detalhes')->middleware(['auth', 'verified']);
Route::post('/stamp/{id}', 'EncomendaController@addToCart')->middleware(['auth', 'verified'])->name('carrinho.add');


Route::get('/staff/{id}/profile', 'UserController@staffProfile')->middleware(['auth', 'verified'])->name('user.staff.profile');

Route::post('/profile', 'UserController@edit')->middleware(['auth', 'verified'])->name('user.edit');
Route::post('/staff/{id}/profile', 'UserController@editStaff')->middleware(['auth', 'verified'])->name('user.staff.edit');

Route::get('/cart', 'EncomendaController@viewCart')->middleware(['auth', 'verified'])->name('carrinho.index');
Route::post('/cart/{id}', 'EncomendaController@removeItem')->middleware(['auth', 'verified'])->name('carrinho.remove');
