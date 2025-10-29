<?php

// use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizPlayController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\QuizController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;


//admin routes

// Route::group(['prefix' => 'admin', 'middleware' => 'redirectAdmin'], function () {
//     Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
//     Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.post');
//     Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
// });

// Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// });

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'updateInfo'])->name('profile.info');
    Route::put('/profile', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [ListingController::class, 'index'])->name('home');
Route::resource('listing', ListingController::class)->except('index');

Route::get('/quizzes', [QuizController::class,'index'])->name('quizzes');
Route::resource('quizzes', QuizController::class)->except('index');

Route::prefix('quiz')->name('quiz.')->group(function () {
    Route::get('{quiz}/start', [QuizPlayController::class, 'start'])->name('start');
    Route::post('save-answer', [QuizPlayController::class, 'saveAnswer'])->name('saveAnswer');
    Route::post('submit', [QuizPlayController::class, 'submit'])->name('submit');
    Route::get('results/{attempt}', [QuizPlayController::class, 'results'])->name('results');
});

// Admin Routes
Route::middleware(['auth', 'verified', Admin::class])
    ->controller(AdminController::class)
    ->group(function () {
        Route::get('/admin', 'index')->name('admin.index');
        Route::get('/users/{user}', 'show')->name('user.show');
        Route::put('/admin/{user}/role', 'role')->name('admin.role');
        Route::put('/listing/{listing}/approve', 'approve')->name('admin.approve');
    });

// Route::inertia('/', 'Home')->name('home');
require __DIR__ . '/auth.php';
