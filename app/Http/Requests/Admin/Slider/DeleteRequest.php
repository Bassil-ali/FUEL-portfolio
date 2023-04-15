<?php

namespace App\Http\Requests\Admin\Slider;

use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return permissionAdmin('delete-sliders');

    }//end of authorize

    public function rules(): array
    {
        return [
            'record_ids.*' => ['required', 'Numeric', 'exists:sliders,id'],
        ];

    }//end of rules

}//end of class