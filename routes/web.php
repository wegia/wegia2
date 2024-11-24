<?php

use App\Http\Controllers\ArquivoController;
use App\Http\Controllers\AtendidoController;
use App\Http\Controllers\FamiliarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\OcorrenciaController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\VoluntariosController;
use App\Models\pessoa\Familiar;
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
    //Remove um Atendido
    Route::get('/painel/remover/{id}', [AtendidoController::class, 'remover'])->name('atendidos.remover');
    //Filtra atendidos por status
    Route::get('/painel/lista/filtrar',[AtendidoController::class, 'filtrar'])->name('atendidos.filtrar');
    //Pesquisa um antedido
    Route::get('/painel/lista/pesquisar',[AtendidoController::class, 'pesquisar'])->name('atendidos.pesquisar');
    //Edita as Informações Pessoais de um Atendido
    Route::put('/painel/editapessoa', [AtendidoController::class, 'editarPessoais'])->name('atendidos.editarPessoais');
    //Edita o Endereço de um Atendido
    Route::put('/painel/editaendereco', [AtendidoController::class, 'editarEndereco'])->name('atendidos.editarEndereco');
    //Edita a Documentação de um Atendido
    Route::put('/painel/editadocumentacao', [AtendidoController::class, 'editarDocumentacao'])->name('atendidos.editarDocumentacao');
    //Adiciona um novo arquivo
    Route::post('/painel/editaarquivo', [ArquivoController::class, 'salvar'])->name('atendidos.editarArquivo');
    //Remover Arquivo
    Route::delete('/painel/removerArquivo/{id}', [ArquivoController::class, 'remover'])->name('atendidos.removerArquivo');
    //Adicionar um familiar
    Route::post('/painel/editafamiliar', [FamiliarController::class, 'salvar'])->name('atendidos.editarFamiliar');
    //Remover Arquivo
    Route::delete('/painel/removerFamiliar/{id}', [FamiliarController::class, 'remover'])->name('atendidos.removerFamiliar');
    //Exibe o formulario para Editar Familiar
    Route::get('/painel/editarFamiliar/{id}', [FamiliarController::class, 'telaEditar'])->name('familiares.editar');
    //Edita as informações pessoais de Familiar
    Route::put('/painel/editarFamiliarPessoais', [FamiliarController::class, 'editarPessoais'])->name('familiares.editarPessoais');
    //Edita o endereço de Familiar
    Route::put('/painel/editarFamiliarEndereco', [FamiliarController::class, 'editarEndereco'])->name('familiares.editarEndereco');
    //Edita o endereço de Familiar
    Route::put('/painel/editarFamiliarDocumentacao', [FamiliarController::class, 'editarDocumentacao'])->name('familiares.editarDocumentacao');
    // //Baixa o arquivo
    // Route::get('/download-arquivo/{id}', [ArquivoController::class, 'download'])->name('arquivo.download');
});

//////////////////////////
//Modulo Ocorrencias
//////////////////////////
Route::prefix('pessoa/ocorrencias')->group(function(){
    //Redireciona para o painel 
    Route::get('/painel', [OcorrenciaController::class, 'painel'])->name("ocorrencias.painel");
    //Redireciona para a tela de cadastro
    Route::get('/painel/form', [OcorrenciaController::class, 'cadastrar'])->name('ocorrencias.cadastrar');
    //Redireciona para a lista todos os atendidos
    Route::get('/painel/lista', [OcorrenciaController::class, 'listar'])->name('ocorrencias.listar');
    //Redireciona para a tela de edição com as informações da ocorrência
    Route::get('/painel/edita/{id}', [OcorrenciaController::class, 'telaEditar'])->name('ocorrencias.telaEditar');
    //Edita as Informações das ocorrência
    Route::put('/painel/editar', [AtendidoController::class, 'editar'])->name('ocorrencias.editar');
    //Cadastrar ocorrencia
    Route::post('/', [OcorrenciaController::class, 'salvar'])->name('ocorrencias.salvar');
    //Cadastrar um arquivo pretencente a uma ocorrência
    //Remove uma ocorrencia
    Route::get('/painel/remover/{id}', [OcorrenciaController::class, 'remover'])->name('ocorrencias.remover');
    
});