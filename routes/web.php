<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AuthController;

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
Route::post('/', [LandingController::class, 'caritiket'])->middleware('Modify');
Route::delete('/bataltiket/{id}', [LandingController::class, 'bataltiket']);
Route::post('/update-profil/{id}', [AuthController::class, 'updateprofil'])->middleware('IsLogin');

route::get('/login', [AuthController::class, 'index'])->middleware('IsStay');
route::post('/login', [AuthController::class, 'authenticate'])->middleware('IsStay');
route::get('/logout', [AuthController::class, 'logout'])->middleware('IsLogin');

Route::get('/checkin', [CheckinController::class, 'index'])->middleware('IsLogin');
Route::post('/checkin', [CheckinController::class, 'checkin'])->middleware('IsLogin');

Route::get('/paket', [PaketController::class, 'index'])->middleware('IsLogin');
Route::get('/paket/{id}', [PaketController::class, 'detailpaket'])->middleware('IsLogin');
Route::post('/paket', [PaketController::class, 'store'])->middleware('IsLogin');
Route::put('/paket/{id}', [PaketController::class, 'update'])->middleware('IsLogin');
Route::delete('/paket/{id}', [PaketController::class, 'destroy'])->middleware('IsLogin');

Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->middleware('IsLogin');
Route::delete('/pendaftaran/{id}', [PendaftaranController::class, 'destroy'])->middleware('IsLogin');
