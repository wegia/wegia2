<?php

    namespace App\Http\Controllers;
    use Illuminate\Support\Facades\Request; 

    class VoluntaryController extends Controller{

        public function __contruct(){

        }

        public function checkCPF(){

            $cpf = Request::input('cpf');

            $voluntary = new Voluntary();
            $cpfAlreadyExists = $voluntary->hasCPFSaved($cpf);

            if(!($cpfAlreadyExists)) {
                return view('rh.voluntary.form', compact('cpf', 'cpfAlreadyExists'));
            }
        }







        public function list() {
            $result = Voluntary::all();
            //return $result;
            return view('rh.voluntary.list')->with('result', $result);
        }
    
        public function get($id) {
            $result = Voluntary::find($id);
            return $result;
        }
    
        public function add() {
            return view('rh.voluntary.form');
        }
    }

?>