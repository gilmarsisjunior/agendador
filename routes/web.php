<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Warehouse\WarehouseController;

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

Route::get('/armazenamento',[WarehouseController::class, 'index'])->name('profile');
    


Route::get('/admin', function(){
    return view('admin.home');
});
Route::get('/agenda', function(){
    return view('admin.schedule');
});



















?>