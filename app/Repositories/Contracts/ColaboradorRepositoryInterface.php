<?php
namespace App\Repositories\Contracts;

interface ColaboradorRepositoryInterface {

    public function all();
    public function find($id);
}