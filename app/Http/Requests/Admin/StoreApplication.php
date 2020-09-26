<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreApplication extends FormRequest
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

    protected function prepareForValidation()
    {
        if ($this->hasFile('upload1')){

            $this->merge(['doc1', '/imagem/nome.pdf']);
        }

        if ($this->hasFile('upload2')){

            $this->merge(['doc2', '/imagem/nome.pdf']);
        }

        if ($this->hasFile('upload3')){

            $this->merge(['doc3', '/imagem/nome.pdf']);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $this->rules = [
            //'sei' => ['required', 'min:16', 'max:16' ,"unique:applications,NULL,$this->id,id"],
            'sei' => "required|min:16|max:16|unique:applications,NULL,$this->id,id",
            'craf'=> ['nullable', 'digits:11', 'unique:applications'],
            'doc1' => 'nullable',
            'doc2' => 'nullable',
            'doc3' => 'nullable',
    ];
        if ($this->method() === 'PUT'){
            $this->rules['nota_def_cbmerj'] = 'required|string|max:20|min:5';
            $this->rules['report'] = 'required';
        }


        return $this->rules;
    }
    public function attributes()
    {
        return[
            'nota_def_cbmerj'=>'Nota do Deferido / Indeferido'

        ];


    }
}
