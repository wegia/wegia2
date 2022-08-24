<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ['nome' => 'required|min:5'
            , 'descricao' => 'required|max:255'
            , 'valor' => 'required|numeric'
            , 'quantidade' => 'required|numeric'
        ];
    }

    public function messages() {
        return [
            'nome.required'=> 'O campo :attribute não pode ser vazio.'
            , 'nome.min'=> 'O campo :attribute deve ter no mínimo 5 caracteres.'
            ,'descricao.required'=> 'O campo :attribute não pode ser vazio.'
            , 'descricao.min'=> 'O campo :attribute não deve ultrapassar 255 caracteres.'
            , 'valor.required'=> 'O campo :attribute não pode ser vazio.'
            , 'valor.numeric'=> 'O campo :attribute deve ser numérico.'
            , 'quantidade.required'=> 'O campo :attribute não pode ser vazio.'
            , 'quantidade.numeric'=> 'O campo :attribute deve ser numérico.'
        ]; 
    }

}
