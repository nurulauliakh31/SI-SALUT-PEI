<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\CriteriaController;
use App\Http\Controllers\Admin\CripsController;
use App\Http\Controllers\Admin\PenilaianController;
use App\Http\Controllers\Admin\SAWController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\BobotController;
use App\Http\Controllers\Admin\NilaiMahasiswaController;
use App\Http\Controllers\Admin\HasilKeputusanController;

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
// Grub middleware guest
Route::get('/', [HomeController::class, 'landing'])->name('homepage');

Auth::routes();

// Route untuk Admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/dashboard-admin', [DashboardController::class, 'index'])->name('dashboard-admin');

    //Route Kelola Akun Admin
    Route::resources([
        'akun' => AkunController::class,
    ]);

    //Route Kelola Akun Admin
    Route::resources([
        'kriteria' => CriteriaController::class,
    ]);

    //Route Kelola Akun Admin
    Route::resources([
        'crips' => CripsController::class,
    ]);

    //Route Kelola Akun Admin
    Route::resources([
        'prodi' => CripsController::class,
    ]);

    //Penilaian
    Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian');
    Route::post('/penilaian-simpan', [PenilaianController::class, 'store'])->name('penilaian-simpan');

    //Perhitungan
    Route::get('/perhitungan-admin', [SAWController::class, 'index'])->name('perhitungan-admin');

    //Laporan
    Route::get('/laporan-admin', [HasilKeputusanController::class, 'index'])->name('laporan');
    Route::post('/hasil-ranking', [HasilKeputusanController::class, 'rangking'])->name('rangking');

    // Route::get('/kelola-akun', [AkunController::class, 'index'])->name('kelola-akun-admin');
    // Route::post('/kelola-akun-simpan', [AkunController::class, 'tambahAkun'])->name('kelola-akun-tambah');
    // Route::put('/kelola-akun-edit/{id}', [AkunController::class, 'editAkun'])->name('kelola-akun-edit');
    // Route::delete('/kelola-akun-hapus/{id}', [AkunController::class, 'akunDestroy'])->name('kelola-akun-hapus');

    //Route Kelola Prodi
    Route::get('/kelola-prodi', [ProdiController::class, 'indexprodi'])->name('kelola-prodi');
    Route::post('/kelola-prodi-simpan', [ProdiController::class, 'tambahProdi'])->name('kelola-prodi-tambah');
    Route::put('/kelola-prodi-edit/{id}', [ProdiController::class, 'editProdi'])->name('kelola-prodi-edit');
    Route::delete('/kelola-prodi-hapus/{id}', [ProdiController::class, 'prodiDestroy'])->name('kelola-prodi-hapus');

    //Route Kelola Mahasiswa
    Route::get('/kelola-mahasiswa', [MahasiswaController::class, 'index'])->name('kelola-mahasiswa');
    Route::post('/kelola-mahasiswa-simpan', [MahasiswaController::class, 'tambahMahasiswa'])->name('kelola-mahasiswa-tambah');
    Route::put('/kelola-mahasiswa-edit/{id}', [MahasiswaController::class, 'editMahasiswa'])->name('kelola-mahasiswa-edit');
    Route::delete('/kelola-mahasiswa-hapus/{id}', [MahasiswaController::class, 'mahasiswaDestroy'])->name('kelola-mahasiswa-hapus');

    //Route Kelola Kriteria
    Route::get('/kelola-kriteria', [KriteriaController::class, 'index'])->name('kelola-kriteria');
    Route::post('/kelola-kriteria-simpan', [KriteriaController::class, 'tambahKriteria'])->name('kelola-kriteria-tambah');
    Route::put('/kelola-kriteria-edit/{id}', [KriteriaController::class, 'editKriteria'])->name('kelola-kriteria-edit');
    Route::delete('/kelola-kriteria-hapus/{id}', [KriteriaController::class, 'kriteriaDestroy'])->name('kelola-kriteria-hapus');

    //Route Kelola Bobot
    Route::get('/kelola-bobot', [BobotController::class, 'index'])->name('kelola-bobot');
    Route::post('/kelola-bobot-simpan', [BobotController::class, 'tambahBobot'])->name('kelola-bobot-tambah');
    Route::put('/kelola-bobot-edit/{id}', [BobotController::class, 'editBobot'])->name('kelola-bobot-edit');
    Route::delete('/kelola-bobot-hapus/{id}', [BobotController::class, 'bobotDestroy'])->name('kelola-bobot-hapus');

    //Route Kelola Nilai Mahasiswa
    Route::get('/kelola-nilai-mahasiswa', [NilaiMahasiswaController::class, 'index'])->name('kelola-nilai-mahasiswa');
    Route::post('/kelola-nilai-mahasiswa-simpan', [NilaiMahasiswaController::class, 'tambahNilaiMahasiswa'])->name('kelola-nilai-mahasiswa-tambah');
    Route::put('/kelola-nilai-mahasiswa-edit/{nim}', [NilaiMahasiswaController::class, 'editNilaiMahasiswa'])->name('kelola-nilai-mahasiswa-edit');
    Route::delete('/kelola-nilai-mahasiswa-hapus/{nim}', [NilaiMahasiswaController::class, 'nilaimahasiswaDestroy'])->name('kelola-nilai-mahasiswa-hapus');

    //Route Proses Perhitungan
    Route::get('/kelola-hasil-peringkat', [HasilPeringkatController::class, 'index'])->name('kelola-hasil-peringkat');
});

// Route untuk anggota
Route::middleware(['auth', 'user-access:pimpinan'])->group(function () {
    Route::get('/dashboard-pimpinan', [DashboardController::class, 'pimpinan'])->name('dashboard-pimpinan');

    //Perhitungan
    Route::get('/perhitungan', [SAWController::class, 'index_pimpinan'])->name('perhitungan');
});

// Route::get('/', function () {
//     return view('landingpage');
// });


