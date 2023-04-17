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
            'email'             => ['required', 'email', 'min:2','max:30'],
            'phone'             => ['required', 'string', 'min:2','max:30'],
            'fax'               => ['required', 'string', 'min:2','max:30'],
            'address'           => ['required', 'string', 'min:2','max:255'],
            'commercial_record' => ['required', 'string', 'min:2','max:255'],
            'tax_number'        => ['required', 'string', 'min:2','max:255'],
        ];

    }//end of rules

    public function attributes(): array
    {
        return [
            'email'             => trans('site.email'),
            'phone'             => trans('site.phone'),
            'fax'               => trans('site.fax'),
            'address'           => trans('site.address'),
            'commercial_record' => trans('site.commercial_record'),
            'tax_number'        => trans('site.tax_number'),
        ];

    }//en dof attributes

}//end of class