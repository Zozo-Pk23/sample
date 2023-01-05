<?php

use App\Http\Controllers\CRUDController;
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
Route::get('/index', [CRUDController::class, 'index'])->name('index');
Route::post('create', [CRUDController::class, 'save']);
Route::delete('/delete/{id}', [CRUDController::class, 'delete']);
Route::get('/edit/{id}', [CRUDController::class, 'edit']);
Route::post('/update', [CRUDController::class, 'update'])->name('update');
