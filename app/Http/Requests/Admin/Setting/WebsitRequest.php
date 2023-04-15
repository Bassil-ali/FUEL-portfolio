<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class WebsitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;

    }//end of authorize

    public function rules(): array
    {
        return [
            'system_name.*' => ['required','min:2','max:30'],
            'system_name'   => ['required'],
            'image'         => ['required', 'image'],
        ];

    }//end of rules

}//end of class