<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Dash;

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
        $this->sanitize();

        return [
            'name'  => ['required', 'max:100', 'min:3', 'dash2:par1,par2,par3'],
            'email' => ['required', 'email', 'unique:clients'],
            'age'   => ['required', 'integer'],
            'photo' => ['required', 'mimes:jpeg,bmp,png']
        ];
    }

    /**
     * Limpa os dados da request
     *
     * @return void
     */
    public function sanitize() 
    {
        $data = $this->all();

        $data['name'] = str_replace('-', ' ', $data['name']);

        $this->replace($data);
    }

    /**
     * Pega a instancia do validator
     *
     * @param [type] $validator
     * @return void
     */
    // public function withValidator($validator) 
    // {
    //     $validator->after(function($validator) {
    //         if ($this->hasDash()) {
    //             $validator->errors()->add('name', 'O campo nome não pode ter -');
    //         }
    //     });
    // }

    /**
     * Verifica se tem -
     *
     * @return boolean
     */
    public function hasDash() 
    {
        return strpos($this->name, '-');
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
