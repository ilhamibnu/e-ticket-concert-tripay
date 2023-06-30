<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PendaftaranController;

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

Route::get('/checkin', [CheckinController::class, 'index']);
Route::post('/checkin', [CheckinController::class, 'checkin']);

Route::get('/checkin2', [CheckinController::class, 'index2']);
Route::post('/checkin2', [CheckinController::class, 'checkin2']);

Route::get('/paket', [PaketController::class, 'index']);
Route::get('/paket/{id}', [PaketController::class, 'detailpaket']);
Route::post('/paket', [PaketController::class, 'store']);
Route::put('/paket/{id}', [PaketController::class, 'update']);
Route::delete('/paket/{id}', [PaketController::class, 'destroy']);

Route::get('/pendaftaran', [PendaftaranController::class, 'index']);
