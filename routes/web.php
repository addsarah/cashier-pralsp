<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\ReportUserController;

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
    #return view('welcome');
    return view('auth.login');
});

Route::get('/dashboard', function () {
    #return view('dashboard');
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';


Route::resource('user','App\Http\Controllers\UserController');
Route::resource('barang','App\Http\Controllers\BarangController');
Route::resource('pembeli','App\Http\Controllers\PembeliController');
Route::resource('pesanan','App\Http\Controllers\PesananController');
Route::resource('reportuser','App\Http\Controllers\ReportUserController');

//cetak pdf
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('cetak_user','App\Http\Controllers\ReportUserController@cetak_user')->name('cetak_user');
Route::get('cetak_pesanan','App\Http\Controllers\ReportPesananController@cetak_pesanan')->name('cetak_pesanan');
Route::get('cetak_barang','App\Http\Controllers\ReportBarangController@cetak_barang')->name('cetak_barang');
Route::get('cetak_pembeli','App\Http\Controllers\ReportPembeliController@cetak_pembeli')->name('cetak_pembeli');