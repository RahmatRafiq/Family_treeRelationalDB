<?php

use App\Http\Controllers\API\ApiKeluargaController;
use App\Http\Controllers\KeluargaController;
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

Route::get('/keluarga', [KeluargaController::class, 'index'])->name('keluarga.index');
Route::get('/keluarga/anakBudi', [KeluargaController::class, 'anakBudi'])->name('keluarga.anakBudi');
Route::get('/keluarga/cucuBudi', [KeluargaController::class, 'cucuBudi'])->name('keluarga.cucuBudi');
Route::get('/keluarga/cucuPerempuanBudi', [KeluargaController::class, 'cucuPerempuanBudi'])->name('keluarga.cucuPerempuanBudi');
Route::get('/keluarga/bibiFarah', [KeluargaController::class, 'bibiFarah'])->name('keluarga.bibiFarah');
Route::get('/keluarga/sepupuLakiLakiHani', [KeluargaController::class, 'sepupuLakiLakiHani'])->name('keluarga.sepupuLakiLakiHani');

//CRUD
Route::resource('keluarga', KeluargaController::class);

//API Get Data Family Information
Route::get('/family-data', [ApiKeluargaController::class, 'getFamilyData']);
