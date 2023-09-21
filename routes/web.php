<?php

use App\Http\Controllers\AtendidoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\VoluntariosController;
use Database\Factories\PessoaFactory;
use Illuminate\Support\Facades\Route;

//Route::get('/',  'App\Http\Controllers\HomeController@index');


// Route::get('/', function() {return "teste";});
////////////////////////

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


/**
 * Rotas para FuncionariosController
 */
Route::prefix('pessoa/funcionarios')->group(function () {

    // Rota para listar os funcionários
    Route::get('/', [FuncionariosController::class, 'list'])->name('listaFuncionarios');

    // Rota para exibir o formulário de adição de funcionário
    Route::get('add', [FuncionariosController::class, 'add'])->name('addFuncionarios');

    // Rota para exibir o formulário de edição de funcionário (com um parâmetro func_id)
    Route::get('edit/{func_id}', [FuncionariosController::class, 'edit'])->name('editFuncionarios');

    // Rota para salvar um novo funcionário (via método POST)
    Route::post('/', [FuncionariosController::class, 'save'])->name('saveFuncionarios');

    // Rota para atualizar um funcionário existente (via método PUT)
    Route::put('/', [FuncionariosController::class, 'update']);

    // Rota para verificar se um CPF já está cadastrado
    Route::get('checkCPF', [FuncionariosController::class, 'checkCPF'])->name('cpfJaCadastrado');
});

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
Route::get('/pessoa/atendidos/painel/checkCPF', [AtendidoController::class, 'validarCpf'])->name('atendidos.validarCpf');
Route::post('/pessoa/atendidos', [AtendidoController::class, 'salvar'])->name('atendido.salvar');
Route::post('/pessoa/atendidos/status', [AtendidoController::class, 'addStatus'])->name("atendido.status");
Route::post('/pessoa/atendidos/tipo', [AtendidoController::class, 'addTipo'])->name("atendido.tipo");
Route::get('/pessoa/atendidos/status', [AtendidoController::class, 'listarStatus'])->name("atendido.status.listar");
Route::get('/pessoa/atendidos/tipo', [AtendidoController::class, 'listarTipo'])->name("atendido.tipo.listar");



