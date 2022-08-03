<?php 
namespace wegia2\Http\Controllers;

class PeopleController extends Controller {

    public function __construct() {
        //$this->middleware('auth');
    }

    /* navigagion functions */
    public function index() {
        return view('people.main');
    }

    public function employees() {
        return view('people.employees');
    }

    public function beneficiaries() {
        return view('people.beneficiaries');
    }

    public function events() {
        return view('people.events');
    }
}
