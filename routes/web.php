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

Route::get( '/', 'HomeController@home' )->name( 'home' );

Auth::routes( [ 'register' => false ] );

Route::get( '/dashboard', 'HomeController@index' )->name( 'dashboard' );
Route::get( '/api-access', 'ApiAccessController@index' )->name( 'access.api' );
Route::get( '/{code}/{token?}', 'CodeLinkController@index' )->name( 'code.link' );
