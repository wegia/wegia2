<?php

    namespace App\Http\Controllers;

    class RhController extends Controller {

        public function __construct(){

        }

        public function index(){
            return view ('rh.main');
        }

        public function employees() {
            return view('rh.employees.employees');
        }
    
        public function voluntary() {
            return view('rh.voluntary.voluntary');
        }
    
    }
?>