<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModelRequest extends FormRequest
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
            'name' => 'required|min:4|max:10',
            'frame_id' => 'required',
            'glass_id' => 'required',
            'color_id' => 'required',
            'status' => 'required'
            
        ];

    }

    public function messages(){
        return [
                
                'name.required'=>"Il nome è obbligatorio",
                'frame_id.required'=>"campo obbligatorio",
                'glass_id.required'=>"campo obbligatorio",
                'color_id.required'=>"campo obbligatorio",
                'status.required'=>"Lo status è obbligatorio",
                'name.min'=>"Il nome deve essere lungo almeno 4 caratteri",
                'name.max'=>"Il nome non deve essere lungo più di 10 caratteri",
                
            ];
    }
}
