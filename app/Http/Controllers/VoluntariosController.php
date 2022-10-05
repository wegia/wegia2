<?php
    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\Request;
    use App\Models\rh\Voluntario;

    class VoluntariosController extends Controller{

        public function __contruct(){

        }

        public function checkCPF(){

            $cpf = Request::input('cpf');

            $voluntario = new Voluntario();
            $cpfJaExiste = $voluntario->hasCPFSaved($cpf);

            if(!($cpfAlreadyExists)) {
                return view('rh.voluntary.form', compact('cpf', 'cpfJaExiste'));
            }
        }

        public function list() {
            $result = Voluntario::all();
            //return $result;
            return view('rh.voluntarios.list')->with('result', $result);
        }

        public function get($id) {
            $result = Voluntario::find($id);
            return $result;
        }

        public function add() {
            return view('rh.voluntarios.form');
        }
    }

?>
