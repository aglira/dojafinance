<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DataAnggotaController;
use App\Http\Controllers\JenisPengeluaranController;
use App\Http\Controllers\JenisTagihanController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluarannController;
use App\Http\Controllers\TagihanControllerController;
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
Route::get('', function() {
    return redirect('/login');
});

Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::prefix('/dashboard')->middleware('auth')->group(function () {
    /* Dashboard */
    Route::get('/', [DashboardController::class, 'index']);
    Route::middleware(['role:admin'])->group(function () {
        /* User */
        Route::controller(UserController::class)->group(function () {
            Route::get('/user', 'index');
            Route::post('/user/tambah', 'store');
            Route::post('/user/{id}/edit', 'update')->where('id', '[0-9+]');
            Route::delete('/user/{id}/delete', 'delete')->where('id', '[0-9]+');
        });

        /* Jenis Surat */
        Route::controller(JenisSuratController::class)->group(function () {
            Route::get('/surat/jenis', 'index');
            Route::post('/surat/jenis/tambah', 'store');
            Route::post('/surat/jenis/{id}/edit', 'store');
            Route::delete('/surat/jenis/{id}/delete', 'delete');
        });

    });

    /* Surat */
    Route::controller(SuratController::class)->group(function () {
        Route::get('/surat', 'index');
        Route::get('/surat', 'index');
        Route::post('/surat', 'store');
        Route::get('/surat/download', 'download');
        Route::post('/surat/{id}', 'update');
        Route::delete('/surat/{id}', 'delete');
    });

    /* Log */
    Route::controller(LogController::class)->group(function () {
        Route::get('/log', 'index');
    });

});
