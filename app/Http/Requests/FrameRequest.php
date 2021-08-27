<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FrameRequest extends FormRequest
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
                'profilo' => 'required|min:2|max:10',
                'misuraFronte' => 'required',
                'profondita' => 'required',
                'essenze' => 'required',
                'descrizione' => 'required',
                'status' => 'required'
                
            ];
    
        }
    
        public function messages(){
            return [
                    
                    'profilo.required'=>"Il nome è obbligatorio",
                    'misuraFronte.required'=>"La misura è obbligatoria",
                    'profondita.required'=>"La profondità è obbligatoria",
                    'essenze.required'=>"campo obbligatorio",
                    'descrizione.required'=>"La descrizione è obbligatoria",
                    'status.required'=>"Lo status è obbligatorio",
                    'profilo.min'=>"Il nome deve essere lungo almeno 2 caratteri",
                    'profilo.max'=>"Il nome non deve essere lungo più di 10 caratteri",
                    
                ];
        }
    
}
