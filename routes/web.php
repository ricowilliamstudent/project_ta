<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

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

// login
Route::get('/', function () {
     return view('auth.login');

});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
// end login

Route::post('/postlogin', [App\Http\Controllers\LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

// Pembungkus middlware agar perlu login dulu baru masuk beranda
Route::middleware(['auth'])->group(function () {
Route::get('/beranda', [App\Http\Controllers\HomeController::class, 'beranda'])->name('beranda');
Route::get('/log_serangan', [App\Http\Controllers\HomeController::class, 'log_serangan'])->name('log_serangan');
Route::get('/iptables', [App\Http\Controllers\HomeController::class, 'iptables'])->name('iptables');
Route::get('/sensor', [App\Http\Controllers\HomeController::class, 'sensor'])->name('sensor');
Route::get('/ranges', [App\Http\Controllers\HomeController::class, 'ranges'])->name('ranges');

Route::get('/api/status', [App\Http\Controllers\ApiController::class, 'getConServer'])->name('getconserver');

Route::get('/iptables/accept/{ip}/{time}/{tipe}', [App\Http\Controllers\HomeController::class, 'accept'])->name('accept');
Route::get('/iptables/reject/{ip}/{time}/{tipe}', [App\Http\Controllers\HomeController::class, 'reject'])->name('reject');
Route::get('/iptables/drop/{ip}/{time}/{tipe}', [App\Http\Controllers\HomeController::class, 'drop'])->name('drop');

});
// End Middleware

// flutter
Route::get('/api/getlog', [App\Http\Controllers\ApiController::class, 'getlog'])->name('getlog');
Route::get('/api/accept/{ip}/{time}/{tipe}', [App\Http\Controllers\ApiController::class, 'accept'])->name('accept');
Route::get('/api/reject/{ip}/{time}/{tipe}', [App\Http\Controllers\ApiController::class, 'reject'])->name('reject');
Route::get('/api/drop/{ip}/{time}/{tipe}', [App\Http\Controllers\ApiController::class, 'drop'])->name('drop');

Route::get('/api/getiptables', [App\Http\Controllers\ApiController::class, 'getiptables'])->name('getiptables');

