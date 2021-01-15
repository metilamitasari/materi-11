<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ClientProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingController;


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
    return view('home');
});

Route::get('/base', function () {
    return view('template.base');
});




// Halaman Admin
Route::get('admin/dashboard', [HomeController::class, 'showBeranda']);
Route::get('registrasi', [AuthController::class, 'registrasi']);
Route::post('registrasi', [AuthController::class, 'store']);
Route::get('setting', [SettingController::class, 'index']);
Route::post('setting', [SettingController::class, 'store']);

// Halaman Admin 
Route::prefix('admin')->middleware('auth')->group(function(){
Route::post('produk/filter', [ProdukController::class, 'filter'])->middleware('auth');
Route::resource('produk', ProdukController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('user', UserController::class);

});

// Halaman Client
Route::get('/', [ClientProdukController::class, 'index']);
Route::post('/filter', [ClientProdukController::class, 'filter']);
Route::get('pesanan/{produk}', [ClientProdukController::class, 'create']);
Route::post('pesanan', [ClientProdukController::class, 'store']);
Route::get('bayar', [ClientProdukController::class, 'show']);
Route::get('bayar/{produk}/edit', [ClientProdukController::class, 'edit']);
Route::put('bayar/{produk}', [ClientProdukController::class, 'update']);
Route::delete('bayar/{produk}', [ClientProdukController::class, 'destroy']);


// Login section
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'prosesLogin']);
Route::get('logout', [AuthController::class, 'logout']);


Route::get('registrasi', [AuthController::class, 'registrasi']);
Route::post('registrasi', [AuthController::class, 'store']);

// // Halaman Kategori
// Route::get('admin/kategori', [KategoriController::class, 'index']);
// Route::get('admin/kategori/create', [KategoriController::class, 'create']);
// Route::post('admin/kategori', [KategoriController::class, 'store']);
// Route::get('admin/kategori/{kategori}', [KategoriController::class, 'show']);
// Route::get('admin/kategori/{kategori}/edit', [KategoriController::class, 'edit']);
// Route::put('admin/kategori/{kategori}', [KategoriController::class, 'update']);
// Route::delete('admin/kategori/{kategori}', [KategoriController::class, 'destroy']);

// // Halaman produk
// Route::get('admin/produk', [ProdukController::class, 'index']);
// Route::get('admin/produk/create', [ProdukController::class, 'create']);
// Route::post('admin/produk', [ProdukController::class, 'store']);
// Route::get('admin/produk/{produk}', [ProdukController::class, 'show']);
// Route::get('admin/produk/{produk}/edit', [ProdukController::class, 'edit']);
// Route::put('admin/produk/{produk}', [ProdukController::class, 'update']);
// Route::delete('admin/produk/{produk}', [ProdukController::class, 'destroy']);



// // Halaman User
// Route::get('admin/user', [UserController::class, 'index']);
// Route::get('admin/user/create', [UserController::class, 'create']);
// Route::post('admin/user', [UserController::class, 'store']);
// Route::get('admin/user/{user}', [UserController::class, 'show']);
// Route::get('admin/user/{user}/edit', [UserController::class, 'edit']);
// Route::put('admin/user/{user}', [UserController::class, 'update']);
// Route::delete('admin/user/{user}', [UserController::class, 'destroy']);


Route::get('test-ajax', [HomeController::class, 'testAjax']);
