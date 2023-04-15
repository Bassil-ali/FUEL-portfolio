<?php

namespace App\Http\Requests\Admin\Partner;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
{
    public function authorize(): bool
    {
        if (in_array(request()->method(), ['PUT', 'PATCH'])) {
            
            return permissionAdmin('update-partners');

        } else {

            return permissionAdmin('create-partners');

        }//end of if

    }//end of authorize


    public function rules(): array
    {
        return [
            'admin_id'      => ['nullable', 'numeric', 'exists:admins'],
            'title.*'       => ['required', 'min:2', 'max:255'],
            'title'         => ['required'],
            'description.*' => ['required', 'min:2'],
            'description'   => ['required'],
            'image'         => ['nullable', 'image'],
            'status'        => ['nullable', 'in:true,false'],
        ];

    }//en dof rules

    protected function prepareForValidation()
    {
        return request()->merge([
            'admin_id' => auth('admin')->id(),
            'status'   => request()->has('status'),
        ]);

    }//end of prepare for validation

}//end of Request