<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

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

Route::get('/', [LandingController::class, 'index']);
Route::get('/index', [LandingController::class, 'index']);
Route::post('/daftar', [LandingController::class, 'daftar']);
Route::post('/', [LandingController::class, 'caritiket']);
Route::delete('/bataltiket/{id}', [LandingController::class, 'bataltiket']);
