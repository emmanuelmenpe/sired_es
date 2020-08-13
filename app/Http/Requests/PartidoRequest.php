<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartidoRequest extends FormRequest
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
            'cancha' => 'required',
            'arbitro' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'local'=> 'required|different:visitante',
            'visitante'=> 'required'
            //'fechaFinal' => 'required|after_or_equal:fechaInicial',
        ];
    }
}
