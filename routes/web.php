<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpController;

// Default Route
Route::get('/', function () {
    return redirect('/login');
});

// Register
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'saveRegister']);

// Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginCheck']);

// Logout
Route::get('/logout', [AuthController::class, 'logout']);

// Employee CRUD
Route::middleware('auth')->group(function () {

    Route::get('/', [EmpController::class, 'index']);

    Route::post('/store', [EmpController::class, 'store']);

    Route::get('/edit/{id}', [EmpController::class, 'edit']);

    Route::post('/update/{id}', [EmpController::class, 'update']);

    Route::get('/delete/{id}', [EmpController::class, 'delete']);
});