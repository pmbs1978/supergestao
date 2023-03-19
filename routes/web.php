<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\LogAcessoMiddleware;
use \App\Http\Controllers\ProdutoController;

// 1º metodo
// use App\Http\Controllers\PrincipalController;
//

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
| verbos http
|
| get - post - put - patch - delete - options
|
*/

// Route::get('/', function () {
//     return 'Olá seja bem vindo ao curso';
// });

// 1º metodo
// Route::get('/', [PrincipalController::class, 'principal']);
//

// 2º metodo
// nomeando rotas
// Route::middleware(LogAcessoMiddleware::class)->get('/', [App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/', [App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
//

// Route::get('/sobre-nos', function () {
//     return 'Sobre nós!';
// });
Route::get('/sobre-nos', [App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

// Route::get('/contacto', function () {
//     return 'Contacto!';
// });
// Route::middleware(LogAcessoMiddleware::class)->get('/contacto', [App\Http\Controllers\ContactoController::class, 'contacto'])->name('site.contacto');
Route::get('/contacto', [App\Http\Controllers\ContactoController::class, 'contacto'])->name('site.contacto');
Route::post('/contacto', [App\Http\Controllers\ContactoController::class, 'gravar'])->name('site.contacto');

Route::get('/help/help', [App\Http\Controllers\HelpController::class, 'help'])->name('help');

Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('autenticacao')->get('/logout', function(){})->name('logout');


// agrupar rotas
Route::middleware('autenticacao')->prefix('/app')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('app.logout');
    Route::get('/cliente', [App\Http\Controllers\ClienteController::class, 'index'])->name('app.cliente');
    Route::get('/fornecedor', [App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/fornecedor/listar', [App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar', [App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', [App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', [App\Http\Controllers\FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/apagar/{id}', [App\Http\Controllers\FornecedorController::class, 'apagar'])->name('app.fornecedor.apagar');
    Route::resource('produto', ProdutoController::class);
    // Route::get('/produto', [App\Http\Controllers\ProdutoController::class, 'index'])->name('app.produto');
});

// rota de fallback

// Route::fallback(function(){
//     return "A página solicitada não se encontra disponivel. <a href='" . route('site.index') . "'>Clique aqui</a> para ir para a página inicial!";
// });

Route::fallback([\App\Http\Controllers\NotFoundController::class, 'notFound']);

// Route::get('/contacto/{nome}/{assunto}/{mensagem?}', function($nome, $assunto, $mensagem = null){
//     echo "O seu nome é: $nome<br>";
//     echo "e o seu assunto é: $assunto<br>";
//     echo "mensagem: $mensagem<br>";
// });

// Route::get('/contacto/{nome}/{categoria_id}', function(string $nome, int $categoria_id){
//     echo "O seu nome é: $nome<br>";
//     echo "e o seu categoria é: $categoria_id<br>";
// })->where('nome', '^(?=.*?[A-Za-z])[A-Za-z+]+$')->where('categoria_id', '^[0-9]+$');


// redirecionar rotas
Route::get('/rota1', function () {
    return 'rota1';
})->name('site.rota1');

// Route::redirect('/rota2', '/rota1', 301);

Route::get('/rota2', function () {
    return redirect()->route('site.rota1');
})->name('site.rota2');

// passando parametros para um controlador
Route::get('teste-controller/{nome}/{apelido}', [App\Http\Controllers\TesteController::class, 'teste'])->name('teste');
