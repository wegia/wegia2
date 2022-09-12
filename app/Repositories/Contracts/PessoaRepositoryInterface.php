<?php
namespace App\Repositories\Contracts;

interface PessoaRepositoryInterface {

    public function all();
    public function find($id);
}