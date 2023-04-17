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

        foreach(getLanguages() as $language) {

            $roles['about_title_' . $language->code]       = ['required'];           
            $roles['about_description_' . $language->code] = ['required'];          

        }

        return $roles;

    }//end of rules

}//end of class