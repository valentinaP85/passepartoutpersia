<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RentalRequest extends FormRequest
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
            'rentalModel_id' => 'required',
            'size_id' => 'required',
            'valueFrame' => 'required',
            'rentalPrice' => 'required',
            'qta' => 'required',
            'status' => 'required'
            
        ];

    }

    public function messages(){
        return [
                
                'rentalModel_id.required'=>"campo obbligatorio",
                'size_id.required'=>"campo obbligatorio",
                'valueFrame.required'=>"campo obbligatorio",
                'rentalPrice.required'=>"campo obbligatorio",
                'qta.required'=>"campo obbligatorio",
                'status.required'=>"Lo status è obbligatorio"
                
            ];
    }
}
