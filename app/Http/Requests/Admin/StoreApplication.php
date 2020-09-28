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
            'nf' => 'nullable|mimes:jpeg,pdf,png,jpg|max:2048',
            'gru' => 'nullable|mimes:jpeg,pdf,png,jpg|max:2048',
            'anexo_c' => 'nullable|mines:jpeg,pdf,png,jpg|max:2048'
    ];
        if ($this->method() === 'PUT'){
            $this->rules['nota_def_cbmerj'] = 'required|string|max:20|min:5';
            $this->rules['nota_sigma_cbmerj'] = 'nullable|string|max:20|min:5';
            $this->rules['nota_craf_cbmerj'] = 'nullable|string|max:20|min:5';
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
