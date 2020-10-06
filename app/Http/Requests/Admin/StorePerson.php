<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePerson extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->rules = [
            'first_name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'email' => "required|string|email|max:191|unique:people,NULL,$this->id,id",
            'rg'=> "required|digits_between:6,9|unique:people,NULL,$this->id,id",
            'cpf'=> "required|cpf|unique:people,NULL,$this->id,id",
            'phone'=> "required|unique:people,NULL,$this->id,id|min:15"
        ];
        return $this->rules;
    }

    public function attributes()
    {
        return[
            'first_name'=> 'Primeiro Nome',
            'last_name'=> 'Último Nome',
            'cpf'=> 'CPF',
            'rg'=> 'RG',
            'phone'=> 'Telefone para Contato',

        ];


    }
}
