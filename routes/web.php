<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\GajiPegawaiController;
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
    return view('welcome');
});

Route::get('pegawai-test', function() {
    echo "Pegawai Unit Test";
});

Route::get('pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
Route::post('pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');


Route::get('gaji-pegawai', [GajiPegawaiController::class, 'index'])->name('gaji_pegawai.index');
Route::get('gaji-pegawai/create', [GajiPegawaiController::class, 'create'])->name('gaji_pegawai.create');
Route::post('gaji-pegawai', [GajiPegawaiController::class, 'store'])->name('gaji_pegawai.store');
Route::get('gaji-pegawai/batch', [GajiPegawaiController::class, 'create_batch'])->name('gaji_pegawai.create_batch');
Route::post('gaji-pegawai/batch', [GajiPegawaiController::class, 'store_batch'])->name('gaji_pegawai.store_batch');