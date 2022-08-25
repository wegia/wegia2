<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request; 

use App\Models\Cargo;
use App\Models\Escala;
use App\Models\TipoEscala;

class RhController extends Controller {

    public function __construct(){

    }

    public function index(){
        return view ('rh.main');
    }

    public function funcionarios() {
        return view('rh.funcionarios.funcionario');
    }

    public function voluntarios() {
        return view('rh.voluntarios.voluntario');
    }
    
    public function addCargo(Request $request) {
        
        Cargo::create([
            'nome' => $request->json('nome')
        ]);
        
        $response = [
            "status" => 'success',
            "message" => 'novo cargo salvo'
        ];
        return response()->json($response);
        
    }

    public function listCargo() {
        return Cargo::all();
    }

    public function addEscala(Request $request) {
        Escala::create([
            'nome' => $request->json('nome'),
            'descricao' => $request->json('descricao')
        ]);
        
        $response = [
            "status" => 'success',
            "message" => 'novo cargo salvo'
        ];
        return response()->json($response);
        
    }

    public function listEscala() {
        return Escala::all();
    }

    public function addTipoEscala(Request $request) {
        TipoEscala::create([
            'nome' => $request->json('nome')
        ]);
        
        $response = [
            "status" => 'success',
            "message" => 'novo cargo salvo'
        ];
        return response()->json($response);
        
    }

    public function listTipoEscala() {
        return TipoEscala::all();
    }
}
