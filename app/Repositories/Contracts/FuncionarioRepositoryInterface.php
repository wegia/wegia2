<?php
namespace App\Repositories\Contracts;

interface FuncionarioRepositoryInterface {

    public function all();
    public function find($id);
}