<?php 
namespace App\Http\Controllers;
// use app\Http\Controllers\Controller;
class HomeController extends Controller {

    public function __construct() {
        //$this->middleware('auth');
    }

    public function index() {
        return view('home');
        // return "teste";
    }
}
