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

Route::get('/',"HomeController@index");
Route::get('/admin',"AdminController@index");
Route::get('/admin/{page}',"AdminController@page");
Route::post('/admin/add', "AdminController@insert");

