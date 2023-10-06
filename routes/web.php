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

Route::prefix('pessoa/atendidos')->group(function () { 
    //Redireciona para o painel com as opções de cadastro e login
    Route::get('/painel', [AtendidoController::class, 'painel'])->name("atendidos.painel");
    //Lista todos os Atendidos
    Route::get('/painel/lista', [AtendidoController::class, 'listar'])->name('atendidos.listar');
    //Redireciona para a tela de cadastro
    Route::get('/painel/form', [AtendidoController::class, 'cadastrar'])->name('atendidos.cadastrar');
    //Redireciona para a tela de edição com as informações do Atendido
    Route::get('/painel/edita/{id}', [AtendidoController::class, 'telaEditar'])->name('atendidos.telaEditar');
    //Valida o cpf e Redireciona para o formulario de cadastro 
    Route::get('/painel/checkCPF', [AtendidoController::class, 'validarCpf'])->name('atendidos.validarCpf');
    //Salva um Atendido no banco de dados
    Route::post('/', [AtendidoController::class, 'salvar'])->name('atendido.salvar');
    //Salva um status no banco de dados
    Route::post('/status', [AtendidoController::class, 'addStatus'])->name("atendido.status");
    //Salva um tipo no banco de dados
    Route::post('/tipo', [AtendidoController::class, 'addTipo'])->name("atendido.tipo");
    //Retorna todos os status
    Route::get('/status', [AtendidoController::class, 'listarStatus'])->name("atendido.status.listar");
    //Retorna todos os tipos
    Route::get('/tipo', [AtendidoController::class, 'listarTipos'])->name("atendido.tipo.listar");
    //
    Route::put('/painel/editap', [AtendidoController::class, 'editarPessoais'])->name('atendidos.editarPessoais');

});

