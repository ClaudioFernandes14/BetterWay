<?php

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

Route::get('/login.html', function () {
    return view('login');
});