<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('beranda', function () {
    return view('beranda',[
        'title'=>'beranda'
    ]);
});

Route::get('home', function () {
    return view('home',[
        'title'=>'beranda'
    ]);
});

Route::get('user', function () {
    return view('tampilanuser.index',[
        'title'=>'Toko TKj'
    ]);
});


Route::resource('barang', BarangController::class);

Route::resource('jasa', JasaController::class);

Route::resource('transaksi', TransaksiController::class);

 Route::get('login', [AuthController::class, 'login'])->name('login');
 Route::post('login', [AuthController::class, 'login_action'])->name('login.action');

 Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

 Route::get('/registrasi', [AuthController::class, 'indexRegistrasi']);
 Route::post('/registrasi', [AuthController::class, 'postRegistrasi']);
