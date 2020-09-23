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
            'sei' => ['required', 'min:16', 'max:16' ,'unique:applications'],
            'craf'=> ['nullable', 'digits:11', 'unique:applications'],

        ];
        return $this->rules;
    }
}
