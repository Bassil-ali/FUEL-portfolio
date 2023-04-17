<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class AchievementRequest extends FormRequest
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

            $roles['achievement_count_' . $language->code] = ['required'];           
            $roles['achievement_name_' . $language->code]  = ['required'];          

        }

        return $roles;

    }//end of rules

    public function attributes(): array
    {
        $rules = [
            'image' => trans('site.image'),
        ];
        foreach(getLanguages() as $language) {

            $roles['about_count_' . $language->code]  = trans('site.count');
            $roles['about_name_' . $language->code]   = trans('site.name');          

        }

        return $roles;

    }//en dof attributes

}//end of class