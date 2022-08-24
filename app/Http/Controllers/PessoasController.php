<?php 
namespace App\Http\Controllers;

class PessoasController extends Controller {

    public function __construct() {
        //$this->middleware('auth');
    }

    /* navigagion functions */
    public function index() {
        return view('/rh');
    }
/*
    public function beneficiaries() {
        return view('rh.atendidos.beneficiaries');
    }

    public function assisted() {
        return view('people.assisted.assisted');
    }
    */
}
