<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\halamanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('home','dashboard');

Route::prefix('dashboard')->group(
    function(){
        Route::get('/',function(){
            return view ('dashboard.layout');
        });
        Route::resource('halaman', 'App\Http\Controllers\halamanController');

    }
);


