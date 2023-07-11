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
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutosController;
use Laravel\Fortify\Http\Providers\FortifyServiceProvider;
use Laravel\Fortify\Http\Controllers\LoginController;
use Laravel\Fortify\Http\Controllers\RegisterController;
use Laravel\Fortify\Http\Controllers\ResetPasswordController;


// <Forma as rotas>
 

    // Route::get('/', function () {
    //     return view('index');
    // });
    
    Route::get('/favoritos', function () {
        return view('favoritos');
    })->middleware('verified');
    
    
    Route::get('/2FA', function () {
        return view('Autenticacao2Fatores');
    })->middleware('verified');
    
    Auth::routes();
    Route::get('/verificar/conta', [App\Http\Controllers\EmailVerificationController::class, '__invoke'])->name('verification.notice');
    Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'admin_dashboard'])->name('admin_dashboard');
    Route::match(['get', 'put' ,'delete'], '/perfil', [App\Http\Controllers\HomeController::class, 'perfil'])->name('perfil')->middleware('verified');
    Route::get('/produtos/criar', [App\Http\Controllers\CriarProdutosController::class, 'mostraCriarProdutos'])->middleware('verified');
    Route::get('/produtos/ver/{id}', [App\Http\Controllers\ProdutosController::class, 'mostraProdutos'])->middleware('auth')->middleware('verified');
    Route::get('/produtos/editar/{id}', [App\Http\Controllers\ProdutosController::class, 'editarProdutos'])->middleware('auth')->middleware('verified');
    Route::get('get-cookie', [App\Http\Controllers\HomeController::class, 'getCookie']);
    Route::get('delete-cookie', [App\Http\Controllers\HomeController::class, 'deleteCookie']);
    Route::get('/perfil-user/{id}', [App\Http\Controllers\HomeController::class, 'verPerfil'])->middleware('auth')->middleware('verified')->name('perfil-user');
    Route::get('/favoritos', [App\Http\Controllers\FavoritosController::class, 'mostraFavoritos'])->name('cliente.favoritos')->middleware('auth')->middleware('verified');
    Route::get('/admin/users/lista', [App\Http\Controllers\AdminController::class, 'listaUsers'])->name('users_lista');
    Route::get('/admin/user/{id}', [App\Http\Controllers\AdminController::class, 'paginaEditar']);
    Route::get('/admin/categorias/lista', [App\Http\Controllers\AdminController::class, 'listaCategorias'])->name('categorias_lista');
    Route::get('/admin/categorias/adicionar', [App\Http\Controllers\AdminController::class, 'adicionarCategorias'])->name('categorias_adicionar');
    Route::get('/admin/categorias/{id}', [App\Http\Controllers\AdminController::class, 'paginaEditarCategoria']);
    Route::get('/admin/produtos/lista', [App\Http\Controllers\AdminController::class, 'listaProdutos'])->name('produtos_lista');
    Route::get('/admin/produtos/{id}', [App\Http\Controllers\AdminController::class, 'paginaEditarProduto']);
    Route::get('/search', [App\Http\Controllers\ProdutosController::class, 'search'])->name('search');
// </Forma as rotas>


// <Publica as rotas>
    Route::post('/verificar/conta', [EmailVerificationController::class, '__invoke'])->name('verification.notice');
    Route::post('/index', [App\Http\Controllers\HomeController::class, 'index']);
    Route::post('/perfil/avatar', [App\Http\Controllers\HomeController::class, 'updateAvatar']) ->name('perfil');
    Route::put('/perfil/update', [App\Http\Controllers\HomeController::class, 'updateProfile'])->middleware('auth')->name('perfil.update');
    Route::post('/produtos', [App\Http\Controllers\CriarProdutosController::class, 'criarProduto'])->name('produtos.mostrar');
    Route::put('/produtos/editar/{id}', [App\Http\Controllers\ProdutosController::class, 'editarProdutos'])->middleware('auth')->name('produtos.update');
    Route::post('/favoritos/add/{id}', [App\Http\Controllers\ProdutosController::class, 'adicionarAosFavoritos'])->middleware('auth')->name('favoritos.adicionar');
    Route::post('/favoritos/remover/{produto}', [App\Http\Controllers\FavoritosController::class, 'removerFavorito'])->middleware('auth');
    Route::put('/admin/user/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('users.update');
    Route::put('/admin/categorias/{id}', [App\Http\Controllers\AdminController::class, 'updateCategoria'])->name('categorias.update');
    Route::put('/admin/produtos/{id}', [App\Http\Controllers\AdminController::class, 'updateProduto'])->name('produtosAdmin.update');
// </Publica as rotas>


// <Elimina dados>
    Route::delete('/user/{id}', [App\Http\Controllers\HomeController::class, 'deleteProfile'])->middleware('auth')->name('users.delete');
    Route::delete('/produtos/{id}', [App\Http\Controllers\ProdutosController::class, 'destroy'])->middleware('auth')->name('produtos.destroy');
    Route::delete('/admin/users/{id}', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('users.destroy');
    Route::delete('/admin/categorias/{id}', [App\Http\Controllers\AdminController::class, 'deleteCategoria'])->name('categorias.destroy');
    Route::delete('/admin/produtos/{id}', [App\Http\Controllers\AdminController::class, 'deleteProduto'])->name('produtosAdmin.destroy');
    // Route::delete('/perfil/{user}/delete-account', [App\Http\Controllers\HomeController::class, 'deleteProfile'])->name('delete-account');
// </Elimina dados>


