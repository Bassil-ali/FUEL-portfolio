<?php

namespace App\Http\Requests\Admin\Managements\Language;

use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return permissionAdmin('delete-admins');

    }//end of authorize

    public function rules(): array
    {
        return [
            'record_ids.*' => ['required', 'Numeric', 'exists:languages,id'],
        ];

    }//end of rules

}//end of class