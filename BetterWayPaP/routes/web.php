<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;

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
    return view('index');
});

Route::get('/index.html', function () {
    return view('index');
});


Route::get('/Main', function () {
    return view('Main');
});

Route::get('/mensagens.html', function () {
    return view('mensagens');
});

Route::get('/favoritos.html', function () {
    return view('favoritos');
});

Route::get('/perfil.html', function () {
    return view('perfil');
});

Route::get('/anunciar.html', function () {
    return view('anunciar');
});

Route::get('/login', function () {
    return view('login');
});



//Route::get('/login.html', [UserController::class, 'index']) -> name('home.login');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
