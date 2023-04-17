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
            'system_name.*'        => ['required','min:2','max:255'],
            'system_name'          => ['required'],
            'system_description.*' => ['required','min:2'],
            'system_description'   => ['required'],
            'image'                => ['nullable', 'image'],
        ];

    }//end of rules

    public function attributes(): array
    {
        return [
            'system_name.*'        => trans('settings.system_name'),
            'system_name'          => trans('settings.system_name'),
            'system_description.*' => trans('site.phone'),
            'system_description'   => trans('site.phone'),
            'image'                => trans('site.image'),
        ];

    }//en dof attributes

}//end of class