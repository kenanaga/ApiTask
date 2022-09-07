<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcceptPackagesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'items' => 'required',
            'items.*.tracking_code'=> 'required|unique:packages,tracking_code',
            'items.*.shipping_price'=> 'required|numeric',
            'items.*.price'=> 'required|numeric',
            'items.*.category'=> 'required',
            'items.*.first_name'=> 'required',
            'items.*.last_name'=> 'required',
            'items.*.phone_number'=> 'required',
            'items.*.email'=> 'required', 
        ];
    }
}
