<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;

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

Route::get('/inicio', function(){
    return view('admin.home');
});
Route::get('/agenda', function(){
    return view('admin.schedule');
});
Route::get('/clientes', function(){
    return view('admin.customer');
});
Route::get('/clientes', [CustomerController::class, 'show']);

Route::get('/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');
Route::get('/update/{id}', [CustomerController::class, 'store'])->name('customer.update');


Route::post('/cadastrar', [CustomerController::class, 'index']);





















?>