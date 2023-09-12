<?php
    namespace App\Http\Controllers;

use App\Models\rh\Colaborador;
use Illuminate\Support\Facades\Request;
    use App\Models\rh\Voluntario;

    class VoluntariosController extends Controller{

        public function __contruct(){

        }

        public function checkCPF(){

            $cpf = Request::input('cpf');

            $voluntario = new Voluntario();
            $cpfJaExiste = $voluntario->hasCPFSaved($cpf);

            if(!($cpfJaExiste)) {
                return view('rh.voluntary.form', compact('cpf', 'cpfJaExiste'));
            }
        }

        public function listar() {
            
            $voluntarios = Voluntario::with('colaborador.pessoa')->get(); 
    
            return view('rh.voluntarios.listar')->with('voluntarios', $voluntarios);
        }

        public function get($id) {
            $result = Voluntario::find($id);
            return $result;
        }

        public function adicionar() {
            $colaboradores = Colaborador::with('pessoa')->get();

            return view('rh.voluntarios.form')->with('colaboradores', $colaboradores);
        }
    }

?>
