<?php

namespace Modules\Crops\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateCropRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'name' => ['bail','required','string','max:255'],
            'variety' => ['bail','sometimes','string','max:255','nullable'],
            'scientific_name' => ['bail','sometimes','string','max:255','nullable'],
            'sowing_date' => ['bail','required','date'],
            'estimated_harvest_date' => ['bail','sometimes','date','nullable'],
            'status' => ['bail','required','integer'],
            'notes' => ['bail','sometimes','string','nullable'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo :attribute es obligatorio.',
            'name.string' => 'El campo :attribute debe ser texto.',
            'name.max' => 'El campo :attribute no debe superar :max caracteres.',
            'variety.string' => 'El campo :attribute debe ser texto.',
            'variety.max' => 'El campo :attribute no debe superar :max caracteres.',
            'scientific_name.string' => 'El campo :attribute debe ser texto.',
            'scientific_name.max' => 'El campo :attribute no debe superar :max caracteres.',
            'sowing_date.required' => 'El campo :attribute es obligatorio.',
            'sowing_date.date' => 'El campo :attribute no es una fecha válida.',
            'estimated_harvest_date.date' => 'El campo :attribute no es una fecha válida.',
            'status.required' => 'El campo :attribute es obligatorio.',
            'status.integer' => 'El campo :attribute debe ser un número entero.',
            'notes.string' => 'El campo :attribute debe ser texto.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'name',
            'variety' => 'variety',
            'scientific_name' => 'scientific name',
            'sowing_date' => 'sowing date',
            'estimated_harvest_date' => 'estimated harvest date',
            'status' => 'status',
            'notes' => 'notes',
        ];
    }

    protected function failedValidation(Validator $v)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Datos inválidos.',
            'errors'  => $v->errors(),
        ], 422));
    }
}