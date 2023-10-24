<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
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

Route::get('/dashboard', [
    BarangController::class, 'index'
])->middleware(['auth', 'verified'])->name('barang.dashboard');


Route::get('/barang/add', [
    BarangController::class, 'add'
])->middleware(['auth', 'verified'])->name('barang.add');
Route::post('/barang/add', [BarangController::class, 'store'])->name('barang.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->middleware(['auth', 'verified'])->name('barang.destroy');

Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->middleware(['auth', 'verified'])->name('barang.edit');



require __DIR__ . '/auth.php';
