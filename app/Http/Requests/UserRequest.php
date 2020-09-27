<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
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
        $this->rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => "required|string|email|max:255|unique:users",
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'rg'=> "required|string|min:5|max:8|unique:users",
            'cpf'=> "required|cpf|unique:users",
        ];

        if ($this->method() === 'PUT'){
            $this->rules['email'] .= ",email,{$this->id},id";
            $this->rules['rg'] .= ",rg,{$this->id},id";
            $this->rules['cpf'] .= ",cpf,{$this->id},id";
            $this->rules['password'] = '';
        }
        if ($this->method() === 'DELETE'){
            $this->rules['name'] = '';
            $this->rules['email'] = '';
            $this->rules['rg'] = '';
            $this->rules['cpf'] = '';
            $this->rules['password'] = '';
        }

        return $this->rules;
    }
}
