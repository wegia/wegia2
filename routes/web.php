<?php

use App\Http\Controllers\AtendidoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\VoluntariosController;
use Database\Factories\PessoaFactory;
use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
=======
//Route::get('/',  'App\Http\Controllers\HomeController@index');


// Route::get('/', function() {return "teste";});
////////////////////////

>>>>>>> c78dc3b (refactor: web.php)
Route::get('/', [HomeController::class, 'index']);


Route::get('/teste', function(){
    return view('testes.testa_imagem');
});

Route::resource('pessoas', pessoaController::class);
Route::resource('atendidos', AtendidoController::class);

////////////////////////
// Rotas para pessoaController
////////////////////////
// Navegação
Route::get('/pessoa', [pessoaController::class, 'index'])->name("pessoaMain");
Route::get('/pessoa/funcionarios/painel', [pessoaController::class, 'funcionarios'])->name("pessoaFuncionariosPainel");
Route::get('/pessoa/voluntarios/painel', [pessoaController::class, 'voluntarios'])->name("pessoaVoluntariosPainel");

Route::get('/pessoa/cargos', [pessoaController::class, 'listCargo'])->name("pessoaListaCargo");
Route::post('/pessoa/cargos', [pessoaController::class, 'addCargo'])->name("pessoaNovoCargo");

Route::get('/pessoa/escalas', [pessoaController::class, 'listEscala'])->name("pessoaListaEscala");
Route::post('/pessoa/escalas', [pessoaController::class, 'addEscala'])->name("pessoaNovoEscala");

Route::get('/pessoa/tipoEscalas', [pessoaController::class, 'listTipoEscala'])->name("pessoaListaTipoEscala");
Route::post('/pessoa/tipoEscalas', [pessoaController::class, 'addTipoEscala'])->name("pessoaNovoTipoEscala");


////////////////////////
//Rotas para FuncionariosController
////////////////////////
// Navegação
Route::get('/pessoa/funcionarios', [FuncionariosController::class, 'list'])->name('listaFuncionarios');

Route::get('/pessoa/funcionarios/add', [FuncionariosController::class, 'add'])->name('addFuncionarios');
Route::get('/pessoa/funcionarios/edit/{func_id}', [FuncionariosController::class, 'edit'])->name('editFuncionarios');

// Operação
Route::post('/pessoa/funcionarios', [FuncionariosController::class, 'save'])->name('saveFuncionarios');
Route::put('/pessoa/funcionarios', [FuncionariosController::class, 'update']);

Route::get('/pessoa/funcionarios/checkCPF', [FuncionariosController::class, 'checkCPF'])->name('cpfJaCadastrado');


////////////////////////
//Rotas para VoluntariosController
////////////////////////
// Navegação
Route::get('/pessoa/voluntarios', [VoluntariosController::class, 'listar'])->name('listaVoluntarios');
Route::get('/pessoa/voluntarios/add', [VoluntariosController::class, 'adicionar'])->name('addVoluntarios');


//modulo de atendidos
//Routes for People
////////////////////////

Route::get('/pessoa/atendidos/painel', [AtendidoController::class, 'painel'])->name("atendidos.painel");
Route::get('/pessoa/atendidos/painel/lista', [AtendidoController::class, 'listar'])->name('atendidos.listar');
Route::get('/pessoa/atendidos/painel/edita', [AtendidoController::class, 'editar'])->name('atendidos.editar');
Route::get('/pessoa/atendidos/painel/form', [AtendidoController::class, 'cadastrar'])->name('atendidos.cadastrar');


