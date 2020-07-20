<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

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

Route::get('users', 'UserController@index');
Route::post('users/new', 'UserController@store');
Route::post('users/update/{id}', 'UserController@update');


Route::post('/email_verification', 'UserController@email_verification');
Route::post('/save_ticket_position/{id}', 'UserController@save_ticket_position');
