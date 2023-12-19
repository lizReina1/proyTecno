<?php

namespace App\Http\Requests\Personal;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ci'=>'required|string|unique:users,ci,'.$this->user,
            'name'=>'required',
            'lastname'=>'required',
            'birth_date'=>'required|date',
            'celular'=>'required',
            'email'=>'required|email|unique:users,email,'.$this->user,
            'tipo'=>'required',
            'genero'=>'required',
            'residencia'=>'required',
            'sueldo'=>'required',
            'formacion'=>'required',
            'imagen'=>'sometimes|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }
}
