<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RichiestaNoleggioRequest extends FormRequest
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
            'name' => 'required|min:3|max:20',
            'surname' => 'required|min:3|max:20',
            'email' => 'required|email:rfc,dns',
            'al' => 'required',
            'dal' => 'required',
            'trasporto' => 'required',
            'cap' => 'required',
            'provincia' => 'required'
            
        ];
        
    }
    
    public function messages(){
        return [
            
            'name.required'=>"Il nome è obbligatorio",
            'surname.required'=>"Il cognome è obbligatorio",
            'email.required'=>"La mail è obbligatoria",
            'name.min'=>"Il nome deve essere lungo almeno tre caratteri",
            'name.max'=>"Il nome non deve essere lungo più di venti caratteri",
            'email' => "la mail non è valida",
            'dal.required'=>"campo obbligatorio",
            'al.required'=>"campo obbligatorio",
            'cap.required'=>"campo obbligatorio",
            'provincia.required'=>"campo obbligatorio",
            'trasporto.required'=>"campo obbligatorio"
            
        ];
    }
}
