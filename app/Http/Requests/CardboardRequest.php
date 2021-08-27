<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardboardRequest extends FormRequest
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
            'nome' => 'required|min:2|max:10',
            'misuraFoglio' => 'required',
            'spessore' => 'required',
            'superficie' => 'required',
            'colori' => 'required',
            'caratteristiche' => 'required',
            'status' => 'required'
            
        ];

    }

    public function messages(){
        return [
                
                'nome.required'=>"Il nome è obbligatorio",
                'misuraFoglio.required'=>"La misura è obbligatoria",
                'spessore.required'=>"Lo spessore è obbligatorio",
                'superficie.required'=>"campo obbligatorio",
                'colori.required'=>"I colori sono obbligatori",
                'caratteristiche.required'=>"Le caratteristiche sono obbligatorie",
                'status.required'=>"Lo status è obbligatorio",
                'nome.min'=>"Il nome deve essere lungo almeno 2 caratteri",
                'nome.max'=>"Il nome non deve essere lungo più di 10 caratteri",
                
            ];
    }
}
