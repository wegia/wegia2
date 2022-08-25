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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RhController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\PessoasController;

//Route::get('/',  'App\Http\Controllers\HomeController@index');


// Route::get('/', function() {return "teste";});
////////////////////////

/**
 * Regra para formação de rota:
 * referencia: https://www.brunobrito.net.br/api-restful-boas-praticas/
 * 
 *  /[[modulo]]/[[recurso]]/[[operacao]]/[[params]]
 *  - módulo: o sistema é construído por módulos: RH, Atendidos, Patrimônio, Estoque, Sócios, etc
 *  - recurso: qualquer entidade manipulada no módulo referido. Por exemplo: rh/funcionario ou rh/voluntario
 *  - operação: apenas para navegação. Para realizar a operação, sinalize com o método HTTP referente:
 *      >> get: consulta e listagem. 
 *          >>> Exemplo: pesquisar o funcionario id=1:
 *          No web.php
 *              Route::get('/rh/funcionarios/{id}', 'App\Http\Controllers\FuncionariosController@get');
 *          No FuncionariosController:
 *              public function get(id){ ... }
 *          Chamando no navegador: wegia.org/rh/funcionarios/1
 * 
 *          >>> Exemplo: listar todos funcionarios:
 *          No web.php
 *              Route::get('/rh/funcionarios', 'App\Http\Controllers\FuncionariosController@list');
 *          No FuncionariosController:
 *              public function list(){ ... }
 *          Chamando no navegador: wegia.org/rh/funcionarios
 * 
 *      >> post: cadastro
 *          >>> Exemplo: cadastrar funcionario:
 *          No web.php
 *              Route::post('/rh/funcionarios', 'App\Http\Controllers\FuncionariosController@save');
 *          No FuncionariosController:
 *              public function save(){ ... }
 * 
 *      >> put: edição
 *          >>> Exemplo: alterar o funcionario id=1:
 *          No web.php 
 *              Route::put('/rh/funcionarios/{id}', 'App\Http\Controllers\FuncionariosController@update');
 *          No FuncionariosController:
 *              public function update(id){ ... }
 * 
 *      >> delete: exclusão
 *          >>> Exemplo: remover o funcionario id=1:
 *          No web.php 
 *              Route::delete('/rh/funcionarios/{id}', 'App\Http\Controllers\FuncionariosController@delete');
 *          No FuncionariosController:
 *              public function delete(id){ ... }
 * 
 */

Route::get('/', [HomeController::class, 'index']);


Route::get('/teste', function(){
    return view('testes.testa_imagem');
});


////////////////////////
// Rotas para RhController
////////////////////////
// Navegação
Route::get('/rh', [RhController::class, 'index'])->name("rhMain");
Route::get('/rh/funcionarios/painel', [RhController::class, 'funcionarios'])->name("rhFuncionariosPainel");
Route::get('/rh/voluntarios/painel', [RhController::class, 'voluntarios'])->name("rhVoluntariosPainel");


Route::get('/rh/cargos', [RhController::class, 'listCargo'])->name("rhListaCargo");
Route::post('/rh/cargos', [RhController::class, 'addCargo'])->name("rhNovoCargo");
Route::get('/rh/escalas', [RhController::class, 'listEscala'])->name("rhListaEscala");
Route::post('/rh/escalas', [RhController::class, 'addEscala'])->name("rhNovoEscala");
Route::get('/rh/tipoEscalas', [RhController::class, 'listTipoEscala'])->name("rhListaTipoEscala");
Route::post('/rh/tipoEscalas', [RhController::class, 'addTipoEscala'])->name("rhNovoTipoEscala");


////////////////////////
//Rotas para FuncionariosController
////////////////////////
// Navegação
Route::get('/rh/funcionarios', [FuncionariosController::class, 'list'])->name('listaFuncionarios');

Route::get('/rh/funcionarios/add', [FuncionariosController::class, 'add'])->name('addFuncionarios');
Route::get('/rh/funcionarios/edit/{func_id}', [FuncionariosController::class, 'edit'])->name('editFuncionarios');

// Operação
Route::post('/rh/funcionarios', [FuncionariosController::class, 'save'])->name('saveFuncionarios');
Route::put('/rh/funcionarios', [FuncionariosController::class, 'update']);

Route::get('/rh/funcionarios/checkCPF', [FuncionariosController::class, 'checkCPF'])->name('cpfJaCadastrado');


////////////////////////
//Rotas para VoluntariosController
////////////////////////
// Navegação
Route::get('/rh/voluntarios', [VoluntariosController::class, 'list'])->name('listaVoluntarios');


//modulo de atendidos
//Routes for People 
////////////////////////
Route::get('/atendidos', [PessoasController::class, 'index'])->name("pessoasMain");
Route::get('/atendidos/beneficiados/adm', [PessoasController::class, 'beneficiados'])->name("beneficiadosMain");
Route::get('/atendidos/assistidos/adm', [PessoasController::class, 'assistidos'])->name("assistidosMain");
//Route::get('/atendidos/beneficiaries/beneficiaries/adm', 'App\Http\Controllers\PeopleController@beneficiaries')->name("peopleBeneficiariesMain");
//Route::get('/atendidos/assisted/assisted/adm', 'App\Http\Controllers\PeopleController@assisted')->name("peopleAssistedMain");


