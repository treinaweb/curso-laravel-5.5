<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        return [
            'name'  => ['required', 'max:100', 'min:3'],
            'email' => ['required', 'email', 'unique:clients'],
            'age'   => ['required', 'integer'],
            'photo' => ['required', 'mimes:jpeg,bmp,png']
        ];
    }

    /**
     * define descrições manuais das regras de validação
     *
     * @return void
     */
    public function messages() 
    {
        return [
            'name.required' => "O campo nome do cliente deve ser preenchido"
        ];
    }
}
