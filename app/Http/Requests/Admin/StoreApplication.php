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
            'nota_def_cbmerj'=> ['required', 'string', 'max:20','min:5'],

        ];
        return $this->rules;
    }
    public function attributes()
    {
        return[
            'nota_def_cbmerj'=>'Nota do Deferido / Indeferido'

        ];


    }
}
