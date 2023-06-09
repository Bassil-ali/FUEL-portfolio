<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;

    }//end of authorize

    public function rules(): array
    {
        $rules = [
            'image' => ['nullable', 'image'],
        ];

        foreach(getLanguages() as $language) {

            $roles['about_title_' . $language->code]       = ['nullable'];           
            $roles['about_description_' . $language->code] = ['nullable'];          

        }

        return $roles;

    }//end of rules

    public function attributes(): array
    {
        $rules = [
            'image' => trans('site.image'),
        ];
        foreach(getLanguages() as $language) {

            $roles['about_title_' . $language->code]       = trans('site.title');
            $roles['about_description_' . $language->code] = trans('site.description');          

        }

        return $roles;

    }//en dof attributes

}//end of class