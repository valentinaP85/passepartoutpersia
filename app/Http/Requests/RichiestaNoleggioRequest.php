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
            'nameSurname' => 'required|min:3|max:20',
            'email' => 'required|email:rfc,dns',
            'qta' => 'required',
            'al' => 'required',
            'dal' => 'required',
            'orizz' => 'required',
            'vert' => 'required',
            'rental_id' => 'required',
            'trasporto' => 'required',
            'cap' => 'required',
            
        ];

    }

    public function messages(){
        return [
                
                'nameSurname.required'=>"Il nome è obbligatorio",
                'email.required'=>"La mail è obbligatoria",
                'vert.required'=>"campo obbligatorio",
                'nameSurname.min'=>"Il nome deve essere lungo almeno tre caratteri",
                'nameSurname.max'=>"Il nome non deve essere lungo più di venti caratteri",
                'email' => "la mail non è valida",
                'orizz.required'=>"campo obbligatorio",
                'qta.required'=>"campo obbligatorio",
                'dal.required'=>"campo obbligatorio",
                'al.required'=>"campo obbligatorio",
                'cap.required'=>"campo obbligatorio",
                'trasporto.required'=>"campo obbligatorio",
                'rental_id.required'=>"campo obbligatorio",
                
               
            ];
    }
}
