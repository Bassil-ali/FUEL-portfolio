<?php

namespace App\Http\Requests\Admin\Slider;

use Illuminate\Foundation\Http\FormRequest;

class StatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return permissionAdmin('status-sliders');

    }//end of authorize

    public function rules(): array
    {
        return [
            'id' => ['required', 'Numeric', 'exists:sliders,id'],
        ];

    }//end of rules

}//end of class