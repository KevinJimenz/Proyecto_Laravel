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
            'prisionero_id' => 'required|integer|exists:prisioneros,id',
            'visitante_id' => 'required|integer|exists:visitantes,id',
            'fecha_hora_inicio' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    $fechaInicio = new \DateTime($value);
                    $fechaActual = new \DateTime();
                    // Verificar que la fecha de inicio no esté en el pasado
                    if ($fechaInicio < $fechaActual) {
                        $fail('No se pueden programar visitas en fechas pasadas.');
                    }
                    // Verificar que la fecha sea un domingo
                    if ($fechaInicio->format('N') != 7) {
                        $fail('Las visitas solo están permitidas los domingos.');
                    }
                    // Verificar que la hora de inicio esté dentro del horario permitido
                    $horaInicio = $fechaInicio->format('H:i');
                    if ($horaInicio < '14:00' || $horaInicio >= '17:00') {
                        $fail('El horario de visitas es de 14:00 a 17:00.');
                    }
                }
            ],
            'fecha_hora_fin' => [
                'required',
                'date',
                'after:fecha_hora_inicio',
                function ($attribute, $value, $fail) {
                    $fechaFin = new \DateTime($value);
                    // Verificar que la hora de fin esté dentro del horario permitido
                    $horaFin = $fechaFin->format('H:i');
                    if ($horaFin > '17:00' || $horaFin <= '14:00') {
                        $fail('El horario de visitas debe estar dentro de 14:00 a 17:00.');
                    }
                }
            ],
            'guardia_id' => 'required|integer|exists:users,id',
        ];
    }
}
