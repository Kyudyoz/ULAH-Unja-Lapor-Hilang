<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\KlaimController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminKlaimController;


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
Route::get('/', [PostController::class, 'index']);

Route::get('/posts', [PostController::class, 'index']);

//halaman single post
Route::get('/posts/{post:slug}', [PostController::class,'show'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/create', [DashboardController::class, 'create'])->middleware('auth');
Route::get('/dashboard/{post:slug}', [DashboardController::class, 'show'])->middleware('auth');
Route::get('/dashboard/create/checkSlug', [DashboardController::class, 'checkSlug'])->middleware('auth');
Route::post('/dashboard/store', [DashboardController::class, 'store'])->middleware('auth');
Route::get('/dashboard/{post:slug}/edit', [DashboardController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/{post:slug}/update', [DashboardController::class, 'update'])->middleware('auth');
Route::delete('/dashboard/delete/{post:slug}', [DashboardController::class, 'destroy'])->middleware('auth');

//admin
Route::get('/klaims', [AdminKlaimController::class, 'index'])->middleware('admin');
Route::put('/klaims/selesai/{id}', [AdminKlaimController::class, 'selesai'])->middleware('admin');
Route::put('/klaims/proses/{id}', [AdminKlaimController::class, 'proses'])->middleware('admin');
Route::put('/klaims/gagal/{id}', [AdminKlaimController::class, 'gagal'])->middleware('admin');

//
Route::get('/klaim', [KlaimController::class, 'index'])->middleware('auth');
Route::post('/klaim/{post:slug}', [KlaimController::class, 'addToKlaim'])->middleware('auth');
