<?php

namespace App\Http\Requests\Admin\SuccessPartner;

use Illuminate\Foundation\Http\FormRequest;

class StatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return permissionAdmin('status-partners');

    }//end of authorize

    public function rules(): array
    {
        return [
            'id' => ['required', 'numeric', 'exists:success_partners,id'],
        ];

    }//end of rules

}//end of class