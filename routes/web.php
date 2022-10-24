<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\JeniscontactController;

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
Route::middleware('guest')->group(function (){

Route::get('/login',[LoginController::class,'index'])->middleware('guest')->name('login');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/', [LandingController::class,'landing']);
Route::get('/about', [LandingController::class,'about']);
Route::get('/projects', [LandingController::class,'project']);
Route::get('/contact', [LandingController::class,'contact']);

});

// Route::get('/register', [RegisterController::class,'index']);
// Route::post('/register', [RegisterController::class,'tambah'])->name('register.tambah');




Route::middleware(['auth'])->group(function () {

//admin
Route::get('/admin', [DashboardController::class,'tampil']);
Route::get('/admin/mastersiswa/{id_siswa}/hapus', [SiswaController::class, 'hapus'])->name('mastersiswa.hapus');
Route::resource('/admin/mastersiswa', SiswaController::class);
Route::resource('/admin/mastercontact', ContactController::class);
Route::resource('/admin/masterproject', ProjectController::class);
Route::get('/admin/masterproject/create/{id_siswa}', [ProjectController::class, 'tambah'])->name('masterproject.tambah');
Route::get('/admin/masterproject/{id_siswa}/hapus', [ProjectController::class, 'hapus'])->name('masterproject.hapus');
Route::resource('/admin/jeniscontact', JeniscontactController::class);




});
