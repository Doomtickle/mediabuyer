<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RFPRequest extends FormRequest
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
            'clientName'      =>'required',
            'clientIndustry'  =>'required',
            'campaignName'    =>'required',
            'basicDescription'=>'required',
            'flightDateStart' =>'required',
            'flightDateEnd'   =>'required',
            'staggered'       =>'required',
            'budget'          =>'required'

        ];
    }
}
