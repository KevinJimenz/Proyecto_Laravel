<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'prisionero_id' => 'required',
			'visitante_id' => 'required',
			'fecha_hora_inicio' => 'required',
			'fecha_hora_fin' => 'required',
			'guardia_id' => 'required',
        ];
    }
}