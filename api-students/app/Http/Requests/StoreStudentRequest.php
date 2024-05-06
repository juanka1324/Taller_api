<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name' => 'required|string',
            'lastname' => 'required|string',
            'age' => 'required|integer',
            'email' => 'required|email',
            'city' => 'required|string',
            'address' => 'required|string',
            'birthdate' => 'required|date',
            'status' => 'required|boolean',
            
        ];
    }
    function messages()
    {
        return [
            'name.required' => 'El campo nombre es requerido',
            'lastname.required' => 'El campo apellido es requerido',
            'age.required' => 'El campo edad es requerido',
            'email.required' => 'El campo email es requerido',
            'city.required' => 'El campo ciudad es requerido',
            'address.required' => 'El campo dirección es requerido',
            'birthdate.required' => 'El campo fecha de nacimiento es requerido',
            'status.required' => 'El campo estado es requerido',
        ];
    }
}
