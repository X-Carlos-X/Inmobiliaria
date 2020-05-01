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

Route::get('/', 'HomeController@index')
    ->name('home');

Route::get('/dashboard', 'DashboardController@dashboard')
    ->name('dashboard');

Route::get('/dashboard/viviendas', 'DashboardController@viviendas')
    ->name('dashboard.viviendas');

Route::get('/dashboard/users', 'DashboardController@users')
    ->name('dashboard.users');

Route::get('/vivienda/ver/{id}', 'ViviendaController@vivienda')
    ->name('vivienda.ver');

Route::get('/vivienda/create', 'ViviendaController@create')
    ->name('vivienda.create');

Route::post('/vivienda/create', 'ViviendaController@create')
    ->name('vivienda.create');

Route::get('/vivienda/update/{id}', 'ViviendaController@update')
    ->name('vivienda.update');

Route::post('/vivienda/update/{id}', 'ViviendaController@update')
    ->name('vivienda.update');

Route::get('/vivienda/delete/{id}', 'ViviendaController@delete')
    ->name('vivienda.delete');

Route::get('/user/profile/{id}', 'UserController@user')
    ->name('user');

Route::get('/user/create', 'UserController@create')
    ->name('user.create');

Route::post('/user/create', 'UserController@create')
    ->name('user.create');

Route::get('/user/update/{id}', 'UserController@update')
    ->name('user.update');

Route::post('/user/update/{id}', 'UserController@update')
    ->name('user.update');

Route::get('/user/delete/{id}', 'UserController@delete')
    ->name('user.delete');


/* Ejemplos */
Route::get('ñuñu', function(){
    return "<h1>Quiele bolsa?</h1>";
});

Route::get('ñuñu2', function(){
    return response ("<h1>Quiele bolsa? 2</h1>", 200, ["Content-Type" => "text/html"]);
});

Route::get('ñuñu3', function(){
    return response ("<h1>Quiele bolsa? 3</h1>", 200)
    ->header("Content-Type", "text/html")
        ->cookie("projecte", "galleta", 30);
});

Route::get('salir', function(){
    return redirect()-> route ('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
