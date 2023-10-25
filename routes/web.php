<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAnggotaController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PemasukanController;
use Illuminate\Support\Facades\Route;
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
Route::get('/', function () {
    return view('welcome');
});


//Buat Route untuk  menampilkan form login dengan nama route 'login'
Route::get('/login',[UserController::class,'index'])->name('login');
//POST LOGIN untuk check password
Route::post('/login',[UserController::class,'check']);
//ROUTE LOGOUT
// Route::get('/logout',[AuthController::class,'logout']);
//=================

Route::get('/data_anggota', [DataAnggotaController::class, 'index']);
Route::get('/pemasukan', [PemasukanController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);

//Route::middleware(['role:pemilik, admin dan anggota'])->group function () {}
   
    /* Dashboard */
    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index');
        Route::post('/user/tambah', 'store');
        Route::post('/user/{id}/edit', 'update')->where('id', '[0-9+]');
        Route::delete('/user/{id}/delete', 'delete')->where('id', '[0-9]+');
    });

    /*Pemasukan*/
        Route::controller(PemasukanController::class)->group(function () {
            Route::get('/pemasukan', 'index');
            Route::post('/pemasukan/tambah', 'store');
            Route::post('/pemasukan/tambah', 'tambah');
            Route::post('/pemasukan/{id}/edit', 'store');
            Route::delete('/pemasukan/{id}/delete', 'delete');
    });

    // Data Anggota
    Route::controller(DataAnggotaController::class)->group(function () {
        Route::get('/data_anggota', 'index');
        Route::get('/data_anggota/tambah', 'create');
        Route::post('/data_anggota/tambah', 'store');
        Route::get('/data_anggota/edit', 'update');
    });

    // Pengeluaran
    Route::controller(PengeluaranController::class)->group(function () {
     Route::get('/pengeluaran', 'index');
     Route::post('/pengeluaran/tambah', 'store');
     Route::post('/pengeluaran/{id}/edit', 'update');
     Route::delete('/pengeluaran/{id}/hapus', 'delete');
 });


    

