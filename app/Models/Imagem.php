<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model  {
    protected $table = 'imagem';
    public $timestamps = false;

    protected $fillable = array('nome', 'descricao', 'arquivo', 'url', 'tipo', 'categoria');

    //impede alteracao de atributos de Produto, id por exemplo
    protected $guarded = ['id'];
}
