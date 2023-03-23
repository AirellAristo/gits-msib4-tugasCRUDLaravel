<?php

use App\Http\Controllers\categoriesControllerAdmin;
use App\Http\Controllers\productController;
use App\Http\Controllers\keranjangController;
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

Route::get('/test', function () {
    return view('tester/testview');
});

Route::get('/', function () {
    return view('login');
});

//Digunakan Untuk Menunjukkan Data dari database
Route::get('/admin',[productController::class, 'indexAdmin']);
Route::get('/admin/editHapus',[productController::class, 'data']);
Route::get('/admin/tambah',[productController::class, 'create']);
Route::get('/admin/editHapus/edit/{id}',[productController::class, 'edit']);
Route::get('/admin/tambahKategori',[categoriesControllerAdmin::class, 'create']);
Route::get('/admin/editHapusKategori',[categoriesControllerAdmin::class, 'data']);
Route::get('/admin/editHapusKategori/editKategori/{id}',[categoriesControllerAdmin::class, 'edit']);
Route::get('/admin/beli/{id}',[keranjangController::class,'transaksi']);
Route::get('/admin/keranjang',[keranjangController::class,'keranjang']);
Route::get('/admin/keranjang/editKeranjang/{id}',[keranjangController::class, 'edit']);
//END digunakan Untuk Menunjukkan Data dari database

// digunakan untuk memasukkan data ke dalam database
Route::post('/admin/tambah',[productController::class, 'store']);
Route::post('/admin/tambahKategori',[categoriesControllerAdmin::class, 'store']);
Route::post('/admin/beli/{id}',[keranjangController::class,'store']);
// END digunakan untuk memasukkan data ke dalam database

// digunakan untuk mengupdate data di database
Route::put('/admin/editHapus/edit/{id}',[productController::class, 'update']);
Route::put('/admin/editHapusKategori/editKategori/{id}',[categoriesControllerAdmin::class, 'update']);
Route::put('/admin/keranjang/editKeranjang/{id}',[keranjangController::class, 'update']);
// END digunakan untuk mengupdate data di database

// digunakan untuk menghapus data di database
Route::delete('/admin/editHapus/{id}',[productController::class, 'destroy']);
Route::delete('admin/editHapusKategori/{id}',[categoriesControllerAdmin::class, 'destroy']);
Route::delete('/admin/keranjang/hapusKeranjang/{id}',[keranjangController::class, 'destroy']);
// END digunakan untuk menghapus data di database
