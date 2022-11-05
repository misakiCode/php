<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function(){return redirect('/myusers');});
Route::get('/myusers', 'App\Http\Controllers\MyUserController@index');
Route::post('/myusers', 'App\Http\Controllers\MyUserController@store');
Route::delete('/myusers/{id}', 'App\Http\Controllers\MyUserController@destroy');

//https://www.hypertextcandy.com/laravel-tutorial-todo-app-list-folders/
Route::get('folders/{id}/tasks','App\Http\Controllers\TaskController@index')->name('task.index');