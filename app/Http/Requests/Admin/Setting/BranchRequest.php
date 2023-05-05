<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;

    }//end of authorize

    public function rules(): array
    {
       

        foreach(getLanguages() as $language) {

            $roles['branch_title_' . $language->code]       = ['required'];           
            $roles['branch_location_' . $language->code] = ['required'];  
            $roles['branch_phone_' . $language->code] = ['required'];        

        }

        return $roles;

    }//end of rules

    public function attributes(): array
    {
        $rules = [
            'image' => trans('site.image'),
        ];
        foreach(getLanguages() as $language) {

            $roles['branch_title_' . $language->code]        = trans('site.title');
            $roles['branch_location_' . $language->code]  = trans('site.location');  
            $roles['branch_phone_' . $language->code]  = trans('site.phone');        

        }

        return $roles;

    }//en dof attributes

}//end of class