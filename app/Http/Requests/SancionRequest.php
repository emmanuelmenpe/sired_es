<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SancionRequest extends FormRequest
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
            'motivo' => 'required',
            'fecha_sancion' => 'required',
            'fin_sancion' => 'required|after_or_equal:fecha_sancion'
            //'fechaFinal' => 'required|after_or_equal:fechaInicial',
        ];
    }
}
