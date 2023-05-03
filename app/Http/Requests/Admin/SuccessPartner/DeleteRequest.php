<?php

namespace App\Http\Requests\Admin\SuccessPartner;

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
            'ids.*' => ['required', 'numeric', 'exists:success_partners,id'],
        ];

    }//end of rules

    public function attributes(): array
    {
        return [
            'ids.*' => trans('site.items'),
        ];

    }//end of attributes

    protected function prepareForValidation(): void
    {
        request()->merge([
            'ids' => json_decode(request()->record_ids),
        ]);

    }//end of prepareForValidation

}//end of class