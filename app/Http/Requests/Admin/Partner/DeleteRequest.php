<?php

namespace App\Http\Requests\Admin\Partner;

use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return permissionAdmin('delete-partners');

    }//end of authorize

    public function rules(): array
    {
        return [
            'record_ids.*' => ['required', 'numeric', 'exists:partners,id'],
        ];

    }//end of rules

}//end of class