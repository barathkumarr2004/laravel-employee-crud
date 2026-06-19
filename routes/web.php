<?php

//use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
  //  return view('welcome');
//});


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpController;

Route::get('/', [EmpController::class, 'index']);

Route::post('/store', [EmpController::class, 'store']);
Route::get('/edit/{id}', [EmpController::class, 'edit']);
Route::post('/update/{id}', [EmpController::class, 'update']);
Route::get('/delete/{id}', [EmpController::class, 'delete']);