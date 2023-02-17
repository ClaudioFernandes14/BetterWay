<?php
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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Fortify\Http\Providers\FortifyServiceProvider;
use Laravel\Fortify\Http\Controllers\LoginController;
use Laravel\Fortify\Http\Controllers\RegisterController;
use Laravel\Fortify\Http\Controllers\ResetPasswordController;

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});


Route::get('/welcome', function () {
    return view('welcome');
});

Route::post('/welcome', function () {
    return view('welcome');
});

Route::get('/mensagens', function () {
    return view('mensagens')->middleware('verified');
});

Route::get('/favoritos', function () {
    return view('favoritos');
});


Route::get('/anunciar', function () {
    return view('anunciar');
});

Route::get('/2FA', function () {
    return view('Autenticacao2Fatores');
});



Route::get('/verificar/conta', function () {
    return view('verificaConta');
});


Auth::routes();

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/perfil', [App\Http\Controllers\HomeController::class, 'perfil'])->name('perfil')->middleware('verified');

// Route::middleware(['web'])
//     ->prefix('login')
//     ->group(function () {
//         Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
//         Route::post('/login', [LoginController::class, 'login']);
//     });

// Route::middleware(['web'])
//     ->prefix('register')
//     ->group(function () {
//         Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
//         Route::post('/register', [RegisterController::class, 'register']);
//     });


// Route::middleware(['web'])
//     ->prefix('password/reset')
//     ->group(function () {
//         Route::get('/', [ResetPasswordController::class, 'showResetForm'])->name('password.request');
//         Route::post('/', [ResetPasswordController::class, 'reset']);
//     });




