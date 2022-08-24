<?php

    namespace App\Http\Controllers;

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
    
    }
?>