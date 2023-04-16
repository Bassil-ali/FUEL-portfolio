<?php

namespace App\Http\Requests\Admin\Managements\Language;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        if (in_array(request()->method(), ['PUT', 'PATCH'])) {
            
            return permissionAdmin('update-languages');

        } else {

            return permissionAdmin('create-languages');

        }//end of if

    }//end of authorize

    public function rules(): array
    {

        $rules = [
            'name'       => ['required','min:2','max:30'],
            'status'     => ['in:1,0'],
        ];

        if (in_array(request()->method(), ['PUT', 'PATCH'])) {
            
            $admin = request()->route()->parameter('admin');

            $rules['email']                  = ['required','email','min:2','max:30', Rule::unique('languages')->ignore($admin->id)];
            $rules['image']                  = ['nullable','image'];
            $rules['password']               = ['nullable','min:6','max:30'];
            $rules['password_confirmation']  = ['nullable', 'same:password','min:6','max:30'];

        } else {

            $rules['email']                  = ['required','string','unique:admins','min:2','max:30'];
            $rules['image']                  = ['required','image'];
            $rules['password']               = ['required','min:6','max:30'];
            $rules['password_confirmation']  = ['required', 'same:password','min:6','max:30'];

        } //end of if

        return $rules;

    }//end of rules

}//end of class