<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\halamanController;
use App\Http\Controllers\DepanController;


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
// routes/web.php

Route::get('/about', [DepanController::class, 'about'])->name('about');

Route::redirect('home','dashboard');


Route::prefix('dashboard')->group(
    function(){
        Route::get('/',[halamanController::class,'index']);
        Route::resource('halaman',halamanController::class);
        Route::resource('depan',DepanController::class);

    }
);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halaman/{id}/edit', [HalamanController::class, 'edit'])->name('halaman.edit');
Route::put('/halaman/{id}', [HalamanController::class, 'update'])->name('halaman.update');
Route::get('/depan/about', [DepanController::class, 'about'])->name('depan.about');
Route::get('/depan/about/{id}', [DepanController::class, 'show'])->name('depan.about.show');
