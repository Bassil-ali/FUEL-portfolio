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

        foreach(getLanguages() as $language) {

            $roles['achievement_count_' . $language->code] = ['required'];           
            $roles['achievement_name_' . $language->code] = ['required'];          

        }

        return $roles;

    }//end of rules

}//end of class