<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoRequest extends FormRequest
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
            'frame_id' => 'required',
            'color_id' => 'required',
            
            
        ];

    }

    public function messages(){
        return [
                
                'frame_id.required'=>"Campo obbligatorio",
                'color_id.required'=>"Campo obbligatorio",
                
                
            ];
    }
}
