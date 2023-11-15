<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profileController;
use App\Http\Controllers\DepanController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\LoginWithGoogleController;

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

Route::redirect('home','aboutweb');

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
Route::get('/depan/about', [DepanController::class, 'about'])->name('depan.about')->middleware('auth');
Route::get('/depan/about/{id}', [DepanController::class, 'show'])->name('depan.about.show');

Route::get('/login', [loginController::class, 'index'])->middleware('guest');
Route::post('/login', [loginController::class, 'store']);
Route::post('/logout', [loginController::class, 'logout']);
    
Route::get('/register', [registerController::class, 'index']);
Route::post('/register', [registerController::class, 'store']);


Route::get('auth/google', [LoginWithGoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginWithGoogleController::class, 'handleGoogleCallback']);

