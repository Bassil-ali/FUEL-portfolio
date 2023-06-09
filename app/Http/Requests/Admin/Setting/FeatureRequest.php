<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class FeatureRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;

    }//end of authorize

    public function rules(): array
    {
        $rules = [
            'image' => ['required', 'image'],
        ];

        foreach(getLanguages() as $language) {

            $roles['feature_title_' . $language->code]       = ['required'];           
            $roles['feature_description_' . $language->code] = ['required'];          

        }

        return $roles;

    }//end of rules

    public function attributes(): array
    {
        $rules = [
            'image' => trans('site.image'),
        ];
        foreach(getLanguages() as $language) {

            $roles['feature_title_' . $language->code]        = trans('site.title');
            $roles['feature_description_' . $language->code]  = trans('site.description');          

        }

        return $roles;

    }//en dof attributes

}//end of class