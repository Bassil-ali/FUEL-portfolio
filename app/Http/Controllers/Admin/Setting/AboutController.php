<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\AboutRequest;
use Illuminate\Contracts\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
    	return view('admin.settings.about');

    }//end of index

    public function store(AboutRequest $request)
    {

        $itemName  = [];
        $itemCount = [];
        foreach($request->get('about_name_' . app()->getLocale()) as $indexName=>$name) {
            foreach(getLanguages() as $index=>$language) {
                $itemName[$indexName] = [
                    'ar' => $request->get('about_name_ar')[$indexName] ?? $request->get('about_name_' . app()->getLocale())[$indexName],
                    'en' => $request->get('about_name_en')[$indexName] ?? $request->get('about_name_' . app()->getLocale())[$indexName],
                ];

                $itemCount[$indexName] = [
                    'ar' => $request->get('about_count_ar')[$indexName] ?? $request->get('about_name_' . app()->getLocale())[$indexName],
                    'en' => $request->get('about_count_en')[$indexName] ?? $request->get('about_name_' . app()->getLocale())[$indexName],
                ];
            }

        }

        saveSetting('about_name', $itemName);
        saveSetting('about_count', $itemCount);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->back();

    }//end of index

}//end of controller