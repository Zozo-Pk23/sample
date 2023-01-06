<?php

use App\Http\Controllers\UserController;
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
Route::get('/createuser', function () {
    return view('/createuser');
});
Route::get('/index', [UserController::class, 'index'])->name('index');
Route::post('create', [UserController::class, 'save']);
Route::delete('/delete/{id}', [UserController::class, 'delete']);
Route::get('/edit/{id}', [UserController::class, 'edit']);
Route::post('/update/{id}/{request}', [UserController::class, 'update'])->name('update');
