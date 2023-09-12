<?php
//namespace App\Http\Controllers;
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

/**
 * Regra para formação de rota:
 * referencia: https://www.brunobrito.net.br/api-restful-boas-praticas/
 *
 *  /[[modulo]]/[[recurso]]/[[operacao]]/[[params]]
 *  - módulo: o sistema é construído por módulos: pessoa, Atendidos, Patrimônio, Estoque, Sócios, etc
 *  - recurso: qualquer entidade manipulada no módulo referido. Por exemplo: pessoa/funcionario ou pessoa/voluntario
 *  - operação: apenas para navegação. Para realizar a operação, sinalize com o método HTTP referente:
 *      >> get: consulta e listagem.
 *          >>> Exemplo: pesquisar o funcionario id=1:
 *          No web.php
 *              Route::get('/pessoa/funcionarios/{id}', 'App\Http\Controllers\FuncionariosController@get');
 *          No FuncionariosController:
 *              public function get(id){ ... }
 *          Chamando no navegador: wegia.org/pessoa/funcionarios/1
 *
 *          >>> Exemplo: listar todos funcionarios:
 *          No web.php
 *              Route::get('/pessoa/funcionarios', 'App\Http\Controllers\FuncionariosController@list');
 *          No FuncionariosController:
 *              public function list(){ ... }
 *          Chamando no navegador: wegia.org/pessoa/funcionarios
 *
 *      >> post: cadastro
 *          >>> Exemplo: cadastrar funcionario:
 *          No web.php
 *              Route::post('/pessoa/funcionarios', 'App\Http\Controllers\FuncionariosController@save');
 *          No FuncionariosController:
 *              public function save(){ ... }
 *
 *      >> put: edição
 *          >>> Exemplo: alterar o funcionario id=1:
 *          No web.php
 *              Route::put('/pessoa/funcionarios/{id}', 'App\Http\Controllers\FuncionariosController@update');
 *          No FuncionariosController:
 *              public function update(id){ ... }
 *
 *      >> delete: exclusão
 *          >>> Exemplo: remover o funcionario id=1:
 *          No web.php
 *              Route::delete('/pessoa/funcionarios/{id}', 'App\Http\Controllers\FuncionariosController@delete');
 *          No FuncionariosController:
 *              public function delete(id){ ... }
 *
 */

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
Route::get('/atendidos/beneficiados/adm', [PessoasController::class, 'beneficiados'])->name("beneficiadosMain");
Route::get('/atendidos/assistidos/adm', [PessoasController::class, 'assistidos'])->name("assistidosMain");
//Route::get('/atendidos/beneficiaries/beneficiaries/adm', 'App\Http\Controllers\PeopleController@beneficiaries')->name("peopleBeneficiariesMain");
//Route::get('/atendidos/assisted/assisted/adm', 'App\Http\Controllers\PeopleController@assisted')->name("peopleAssistedMain");


