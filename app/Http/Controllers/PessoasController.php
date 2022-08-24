<?php 
namespace App\Http\Controllers;

class PeopleController extends Controller {

    public function __construct() {
        //$this->middleware('auth');
    }

    /* navigagion functions */
    public function index() {
        return view('people.main');
    }

    public function beneficiaries() {
        return view('people.beneficiaries.beneficiaries');
    }

    public function assisted() {
        return view('people.assisted.assisted');
    }
}
