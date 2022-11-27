<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/index', function () {
    return view('index');
});


Route::get('/Main', function () {
    return view('Main');
});

Route::get('/mensagens', function () {
    return view('mensagens');
});

Route::get('/favoritos', function () {
    return view('favoritos');
});

Route::get('/perfil', function () {
    return view('perfil');
});

Route::get('/anunciar', function () {
    return view('anunciar');
});

Route::get('/login', [UserController::class, 'index']) -> name('login');

