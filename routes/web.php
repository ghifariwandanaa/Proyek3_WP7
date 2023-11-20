<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profileController;
use App\Http\Controllers\DepanController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\LoginWithGoogleController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/login', [loginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [loginController::class, 'store']);
Route::post('/logout', [loginController::class, 'logout']);
    
Route::get('/register', [registerController::class, 'index']);
Route::post('/register', [registerController::class, 'store']);

Route::post('/email/resend', [registerController::class, 'resend'])->name('verification.resend');



Route::get('auth/google', [LoginWithGoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginWithGoogleController::class, 'handleGoogleCallback']);


Route::get('/email/verify', function () {
    return view('akun.verify');
})->name('verification.notice')->middleware(['auth', 'verified']); // Tambahkan middleware 'verified'

// Auth::routes(['verify' => true]);

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/login')->with('verified', true);
})->middleware('auth','signed')->name('verification.verify');


Route::get('/dataprofile', [DepanController::class, 'index'])->middleware(['auth', 'verified']);

Route::post('/email/verification-notification', function () {
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');




