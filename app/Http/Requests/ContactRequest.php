<?php

namespace App\Http\Requests;

use App\Http\Requests\ContactRequest;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns',
            'message' => 'required'
            
        ];

    }

    public function messages(){
        return [
                
                'name.required'=>"Il nome è obbligatorio",
                'email.required'=>"La mail è obbligatoria",
                'message.required'=>"Il messaggio è obbligatorio",
                'name.min'=>"Il nome deve essere lungo almeno tre caratteri",
                'name.max'=>"Il nome non deve essere lungo più di venti caratteri",
                'email' => "la mail non è valida"
            ];
    }
}
