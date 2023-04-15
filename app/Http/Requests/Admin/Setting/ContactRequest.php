<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;

    }//end of authorize

    public function rules(): array
    {
        return [
            'email'   => ['nullable', 'email', 'min:2','max:30'],
            'phone'   => ['nullable', 'string', 'min:2','max:30'],
            'fax'     => ['nullable', 'string', 'min:2','max:30'],
            'address' => ['nullable', 'string', 'min:2','max:255'],
        ];

    }//end of rules

}//end of class