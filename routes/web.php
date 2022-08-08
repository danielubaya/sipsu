<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerumahanController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('perumahans', PerumahanController::class);

Route::get('dokumen/permohonan_baru', [App\Http\Controllers\PerumahanController::class, 'permohonan_baru']);	
Route::get('dokumen/pembahasan_narsum', [App\Http\Controllers\PerumahanController::class, 'pembahasan_narsum']);
Route::get('dokumen/bast_administrasi', [App\Http\Controllers\PerumahanController::class, 'bast_administrasi']);
Route::get('dokumen/bast_fisik', [App\Http\Controllers\PerumahanController::class, 'bast_fisik']);	
Route::get('dokumen/replanning', [App\Http\Controllers\PerumahanController::class, 'replanning']);	
Route::get('dokumen/penyerahan_warga', [App\Http\Controllers\PerumahanController::class, 'penyerahan_warga']);
Route::get('dokumen/tidak_ada_kewajiban', [App\Http\Controllers\PerumahanController::class, 'tidak_ada_kewajiban']);
Route::get('dokumen/lainlain', [App\Http\Controllers\PerumahanController::class, 'lainlain']);	

Route::get('show_detail_perumahan/{id}', [App\Http\Controllers\PerumahanController::class, 'show_detail_perumahan']);	