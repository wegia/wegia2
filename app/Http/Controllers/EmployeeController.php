<?php 
namespace wegia2\Http\Controllers;

use Illuminate\Support\Facades\Request; 

use wegia2\Person;
use wegia2\PersonDocs;
use wegia2\Employee;
use wegia2\EmployeeDocs;
//use wegia2\EmployeeSituation;
use wegia2\EmployeeRole;
use wegia2\EmployeeTimesheet;
use wegia2\EmployeeShift;
use wegia2\EmployeeShiftType;



class EmployeeController extends Controller {

    public function __construct() {
        //$this->middleware('auth');
    }

    public function checkCPF() {
        $cpf = Request::input('cpf');

        $employee = new Employee();
        $cpfAlreadyExists = $employee->hasCPFSaved($cpf);

        //if cpf is available, load form
        if(!($cpfAlreadyExists)) {
            $employeeRoleList = EmployeeRole::all();
            $employeeTimesheetList = EmployeeTimesheet::all();
            $employeeShiftTypeList = EmployeeShiftType::all();

            //return redirect()->action('EmployeeController@add')->with($data);
            return view('people.employees.form', compact('cpf', 'cpfAlreadyExists', 'employeeRoleList', 'employeeTimesheetList', 'employeeShiftTypeList'));
        }
        //cpf is used
        return view('people.employees.form', compact('cpf', 'cpfAlreadyExists'));
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
        return $result;
        //return view('people.employees.list', compact('result'));
    }

    public function get($id) {
        $result = Employee::find($id);
        return $result;
        //return view('people.employees.detail', compact('result'));
    }

    /* navigagion functions */
    public function add() {
        return view('people.employees.form');
    }



}
