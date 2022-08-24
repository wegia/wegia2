<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request; 

use App\Models\Cargo;

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
}
