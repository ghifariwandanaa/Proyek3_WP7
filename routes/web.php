<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profileController;
use App\Http\Controllers\DepanController;
use App\Http\Controllers\ListController;


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

Route::view('aboutweb', 'welcome');

Route::resource('cv', ListController::class);

Route::get('/cv', [ListController::class, 'index'])->name('cv.index');


Route::prefix('dashboard')->group(
    function(){
        Route::get('/',[profileController::class,'index']);
        Route::resource('profile',profileController::class);
        Route::resource('depan',DepanController::class);

    }
);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile/{id}/edit', [profileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{id}', [profileController::class, 'update'])->name('profile.update');
Route::get('/profile/cv/{id}', [ProfileController::class, 'cv'])->name('profile.cv');
Route::get('/depan/about', [DepanController::class, 'about'])->name('depan.about');
Route::get('/depan/about/{id}', [DepanController::class, 'show'])->name('depan.about.show');
