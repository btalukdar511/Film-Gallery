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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function (){
   return view('admin.dashboard');
})->name('dashboard');

Route::resource('admin/category', 'adminCategoryController');

Route::get('admin/film/add', 'adminFilmController@add')->name('film.add');

Route::post('admin/film/multiadd', 'adminFilmController@multiadd')->name('film.multiadd');

Route::resource('admin/film', 'adminFilmController');

