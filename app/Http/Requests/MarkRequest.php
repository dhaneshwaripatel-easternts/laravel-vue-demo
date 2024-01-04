<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarkRequest extends FormRequest
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
            'student_id' => 'required|exists:students,id',
            'english' => 'required|numeric|between:0,100',
            'computer' => 'required|numeric|between:0,100',
            'physics' => 'required|numeric|between:0,100',
            'chemistry' => 'required|numeric|between:0,100',
            'maths' => 'required|numeric|between:0,100',
        ];
    }
}
