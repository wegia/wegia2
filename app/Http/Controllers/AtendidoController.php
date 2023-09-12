<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AtendidoController extends Controller
{
    /**Redireciona para o painel com as opções de cadastro e login 
    */
    public function painel(){
        return view('pessoa.atendidos.atendido');
    }

    
    public function index(){
        return view('pessoa.atendidos.lista');
    }
}
