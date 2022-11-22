<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});
// auth

Route::post('test-login', [AuthController::class, 'testLogin']);

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authentication'])->name('postLogin');
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, '_register'])->name('postRegister');
// pages Umum (segala yang bisa di akses tanpa login)

Route::middleware(['auth'])->group(function(){
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/home', [PagesController::class, 'home']);

    Route::get('/about', [PagesController::class, 'about']);


    Route::group(['prefix' => '/detail-jurusan'], function(){
        Route::get('/', [PagesController::class, 'detailDataJurusan']);
        Route::get('/prodi', [ProdiController::class, 'detailProdi'])->name('detailJurusan.detailProdi');

        Route::group(['prefix' => 'detail-data'], function(){
            Route::get('/mahasiswa', [ProdiController::class, 'detailDataMahasiswa'])->name('detailJurusan.detailData.mahasiswa');
            Route::get('/dosen', [ProdiController::class, 'detailDataDosen'])->name('detailJurusan.detailData.dosen');
            Route::get('/alumni', [ProdiController::class, 'detailDataAlumni'])->name('detailJurusan.detailData.alumni');
            Route::get('/ipk', [ProdiController::class, 'detailDataIpk'])->name('detailJurusan.detailData.ipk');
            Route::get('/ams', [ProdiController::class, 'detailDataAms'])->name('detailJurusan.detailData.ams');
            Route::get('/dpp', [ProdiController::class, 'detailDataDpp'])->name('detailJurusan.detailData.dpp');
        });
    });
    Route::group(['prefix' => '/detail-fakultas'], function(){
        Route::get('/mahasiswa', [FakultasController::class, 'detailMahasiswa'])->name('detailFakultas.detailMahasiswa');
        Route::get('/dosen', [FakultasController::class, 'detailDosen'])->name('detailFakultas.detailDosen');
        Route::get('/alumni', [FakultasController::class, 'detailAlumni'])->name('detailFakultas.detailAlumni');
    });

    Route::get('/dashboard-jurusan', [PagesController::class, 'dashboardJurusan']);

    Route::group(['prefix' => 'profile'], function(){
        Route::get('/', [UserController::class, 'profile'])->name('profile');
        Route::patch('/change-password', [UserController::class, 'changePassword'])->name('profile.changePassword');
    });

    Route::group(['prefix' => 'users'], function(){
        Route::get('/', [UserController::class, 'getAllUser'])->name('users');
    });



});


// pages

// Route::get('/report', [PagesController::class,'report']);



Route::get('/tambah-konten', [PagesController::class, 'tambahKonten']);
Route::get('/ubah-konten', [PagesController::class, 'ubahKonten']);
// Route::get('/users', [PagesController::class, 'users']);

Route::get('/list-konten', [PagesController::class, 'listKonten']);
