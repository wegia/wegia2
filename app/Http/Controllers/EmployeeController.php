<?php 
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request; 

use App\Models\Person;
use App\Models\PersonDocs;
use App\Models\Employee;
use App\Models\EmployeeDocs;
use App\Models\EmployeeSituation;
use App\Models\EmployeeRole;
use App\Models\EmployeeTimesheet;
use App\Models\EmployeeShift;
use App\Models\EmployeeShiftType;



class EmployeeController extends Controller {

    public function __construct() {
        //$this->middleware('auth');
    }

    public function validarCPF($cpf){
        
        $tam = strlen($cpf);

        if($tam > 11 && $tam < 14){
            $cpfV = preg_match('/^[0-9]{3}.?[0-9]{3}.?[0-9]{3}-?[0-9]{2}$/', $cpf);

            return $cpfV;
        }
    
    }

    
    public function checkCPF() {

        $cpfI = Request::input('cpf');
        $cpf = $this->validarCPF($cpfI);

        $employee = new Employee();
        $cpfAlreadyExists = $employee->hasCPFSaved($cpf);

        if(!($cpfAlreadyExists)) {
            $employeeRoleList = EmployeeRole::all();
            $employeeTimesheetList = EmployeeTimesheet::all();
            $employeeShiftTypeList = EmployeeShiftType::all();

            return view('rh.employees.form', compact('cpf', 'cpfAlreadyExists', 'employeeRoleList', 'employeeTimesheetList', 'employeeShiftTypeList'));
        }
        return view('rh.employees.form', compact('cpf', 'cpfAlreadyExists'));
    }

    private function storePerson($name, $gender, $phone, $birthday) {
        return Person::create([
            'name' => $name,
            'gender' => $gender,
            'phone' => $phone,
            'birthday' => $birthday
        ]);
    }

    private function storePersonDocs($personId, $cpf, $rg, $rgAgency, $rgDate) {
        return PersonDocs::create([
            'person_id' => $personId,
            'cpf' => $cpf,
            'rg' => $rg,
            'rg_agency' => $rgAgency,
            'rg_date' => $rgDate
        ]);
    }

    private function storeEmployee($personId, $admissionDate, $status, $roleId) {
        return Employee::create([
            'person_id' => $personId,
            'admission_date' => $admissionDate,
            'status' => $status,
            'role_id' => $roleId
        ]);
    }

    private function storeEmployeeShift($employeeId, $shiftTypeId, $timesheetId) {
        return EmployeeShift::create([
            'employee_id' => $employeeId,
            'employee_shift_type_id' => $shiftTypeId,
            'employee_timesheet_id' => $timesheet_id
        ]);
    }

    private function storeEmployeeDocs($employeeId, $armyNumber, $armySerie) {
        return EmployeeDocs::create([
            'employee_id' => $employeeId,
            'army_doc_number' => $armyNumber,
            'army_doc_serie' => $armySerie
        ]);
    }
    public function save() {
        $inputs = Request::all();

        $person = $this->storePerson($inputs['person_name'], $inputs['person_gender'], 
                                $inputs['person_phone'], $inputs['person_birthday']);

        $employee = $this->storeEmployee($person->id, $inputs['employee_admission_date'],
                                $inputs['employee_status'], $inputs['employeeRole_id']);

        // storing auxiliar data 
        // tables one-to-many
        $this->storeEmployeeShift($employee->id, $inputs['employeeShiftType_id'], $inputs['employeeTimesheet_id']);
        $this->storeEmployeeDocs($employee->id, $inputs['employeeDoc_army_doc_number'], $inputs['employeeDoc_army_doc_serie']);
        $this->storePersonDocs($person->id, $inputs['personDoc_cpf'], $inputs['personDoc_rg'], 
                                $inputs['personDoc_rg_agency'], $inputs['personDoc_rg_date']);
        
        return $inputs;
    }

    public function list() {
        $result = Employee::all();
        //return $result;
        return view('rh.employees.employees.list')->with('result', $result);
    }

    public function get($id) {
        $result = Employee::find($id);
        return $result;
    }

    /* navigagion functions */
    public function add() {
        return view('rh.employees.form');
    }



}
