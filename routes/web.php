<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeCotroller;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ResetController;
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
Route::middleware('guest')->group(function () {
	Route::get('/', [LoginController::class, 'login']);
	Route::post('masuk', [LoginController::class, 'masuk']);
	Route::get('register', [RegisterController::class, 'register']);
	Route::post('/daftar/akun', [RegisterController::class, 'daftar_akun']);

	Route::get('/lupa/password', [ResetController::class, 'lupa_password']);
	Route::post('/post/reset/password', [ResetController::class, 'post_reset_password']);
	Route::get('/reset/password/get/{token}', [ResetController::class, 'reset_password_get']);
	Route::post('/change/password/post', [ResetController::class, 'change_password_post']);

	
});


Route::middleware('auth')->group(function () {
	Route::get('keluar', [LoginController::class, 'keluar']);
	Route::get('home', [HomeCotroller::class, 'home']);
	Route::get('index', [HomeCotroller::class, 'index']);

//Route Kandidat
	Route::get('kandidat',[KandidatController::class, 'kandidat']);
	Route::post('/tambah/kandidat',[KandidatController::class, 'tambah_kandidat']);
	Route::get('/hapus/kandidat/{id}',[KandidatController::class, 'hapus_kandidat']);
	Route::get('/edit/kandidat/{id}',[KandidatController::class, 'edit_kandidat']);
	Route::post('/update/kandidat/{id}',[KandidatController::class, 'ubah_kandidat']);


//Route votting
	Route::get('e-voting', [VotingController::class, 'voting']);
	Route::post('/coblos/calon/{id}', [VotingController::class, 'post_voting']);


//Route prodi
	Route::get('/master/prodi',[ProdiController::class, 'prodi']);
	Route::post('/tambah/prodi',[ProdiController::class, 'tambah_prodi']);
	Route::post('/update/prodi/{id}',[ProdiController::class, 'update_prodi']);
	Route::get('/hapus/prodi/{id}',[ProdiController::class, 'hapus_prodi']);

//Route Profil mahasiswa
	Route::get('profil',[ProfilController::class, 'profil']);
	Route::post('/ubah/foto',[ProfilController::class, 'ubah_foto']);
	Route::post('/ubah/profil',[ProfilController::class, 'ubah_profil']);

//Route profil admin
	Route::get('/admin/profil',[ProfilController::class, 'admin_profil']);

//Route ubah password
	Route::put('/ubah/password',[ProfilController::class, 'ubah_password']);

//Route like
	Route::post('/like',[LikeController::class, 'like']);

});
