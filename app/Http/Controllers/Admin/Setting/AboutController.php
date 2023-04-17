<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\AboutRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index(): View
    {
    	return view('admin.settings.about');

    }//end of index

    public function store(AboutRequest $request)
    {

        $itemTitle  = [];
        $itemDisc   = [];
        foreach($request->get('about_title_' . app()->getLocale()) as $indexName=>$name) {
            foreach(getLanguages() as $index=>$language) {
                $itemTitle[$indexName] = [
                    'ar' => $request->get('about_title_ar')[$indexName] ?? $request->get('about_title_' . app()->getLocale())[$indexName],
                    'en' => $request->get('about_title_en')[$indexName] ?? $request->get('about_title_' . app()->getLocale())[$indexName],
                ];

                $itemDisc[$indexName] = [
                    'ar' => $request->get('about_description_ar')[$indexName] ?? $request->get('about_description_' . app()->getLocale())[$indexName],
                    'en' => $request->get('about_description_en')[$indexName] ?? $request->get('about_description_' . app()->getLocale())[$indexName],
                ];
            }

        }

        saveSetting('about_title', $itemTitle);
        saveSetting('about_description', $itemDisc);

        if(request()->file('image')) {

            if(!empty(getSetting('about_image'))) {

                Storage::disk('public')->delete(getSetting('system_image'));
            }


            $image = request()->file('image')->store('settings', 'public');

            saveSetting('about_image', $image);
        }

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->back();

    }//end of index

}//end of controller