<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
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

Route::get('/pemasukan', [PemasukanController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);
// Route::middleware(['role:pemilik, admin dan anggota'])->group(function () {
    /* Dashboard */
    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index');
        Route::post('/user/tambah', 'store');
        Route::post('/user/{id}/edit', 'update')->where('id', '[0-9+]');
        Route::delete('/user/{id}/delete', 'delete')->where('id', '[0-9]+');
    });

// });
            
//     //Cabang
//     Route::get('/cabang',[CabangController::class,'index']);
//     Route::get('/cabang/tambah',[CabangController::class,'tambah']);
//     Route::post('/cabang/simpan',[CabangController::class,'simpan']);
//     Route::get('/cabang/edit/{id}',[CabangController::class,'edit']);
//     Route::delete('/cabang/hapus/{id}',[CabangController::class,'hapus']);
//     //Barang
//     Route::get('/barang',[BarangController::class,'index']);
//     Route::get('/barang/tambah',[BarangController::class,'tambah']);
//     Route::post('/barang/simpan',[BarangController::class,'simpan']);
//     Route::get('/barang/edit/{id}',[BarangController::class,'edit']);
//     Route::delete('/barang/hapus/{id}',[BarangController::class,'hapus']);
//     }

//);