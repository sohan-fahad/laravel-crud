<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MailController;




// Route::get('/', [StudentController::class, 'index'])->middleware('authChecker');
// Route::get('auth/login', [AuthController::class, 'login'])->name('auth.login');
// Route::get('auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('auth/save', [AuthController::class, 'save'])->name('auth.save');
Route::post('auth/check', [AuthController::class, 'check'])->name('auth.check');
Route::post('courses/save/{id}', [StudentController::class, 'saveCourse']);
Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('mail', [MailController::class, 'mail']);
Route::post('mail/send', [MailController::class, 'send']);

Route::group(['middleware' => ['authChecker']], function() {
    Route::get('/', [StudentController::class, 'index']);
    Route::get('/courses/{id}', [StudentController::class, 'courses']);
    Route::get('auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('auth/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('auth/edit/{id}', [AuthController::class, 'edit'])->name('auth.edit');
    Route::put('auth/update/{id}', [AuthController::class, 'update'])->name('auth.update');
});