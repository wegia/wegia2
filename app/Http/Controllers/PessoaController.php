<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\pessoa\Cargo;
use App\Models\pessoa\Escala;
use App\Models\pessoa\TipoEscala;

class pessoaController extends Controller
{

    public function __construct()
    {

    }


    public function index()
    {
        return view('pessoa.main');
    }

    public function funcionarios()
    {
        return view('pessoa.funcionarios.funcionario');
    }

    public function voluntarios()
    {
        return view('pessoa.voluntarios.voluntario');
    }

    public function addCargo(Request $request)
    {

        Cargo::create([
            'nome' => $request->json('nome')
        ]);

        $response = [
            "status" => 'success',
            "message" => 'novo cargo salvo'
        ];
        return response()->json($response);

    }

    public function listCargo()
    {
        return Cargo::all();
    }

    public function addEscala(Request $request)
    {
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

    public function listEscala()
    {
        return Escala::all();
    }

    public function addTipoEscala(Request $request)
    {
        TipoEscala::create([
            'nome' => $request->json('nome')
        ]);

        $response = [
            "status" => 'success',
            "message" => 'novo cargo salvo'
        ];
        return response()->json($response);

    }

    public function listTipoEscala()
    {
        return TipoEscala::all();
    }
}
