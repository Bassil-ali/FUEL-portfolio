<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\FeatureRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{
    public function index(): View
    {
    	return view('admin.settings.feature');

    }//end of index

    public function store(FeatureRequest $request)
    {
 
       
//         if(empty($request->get('feature_title' . app()->getLocale()))) {
//  dd($request);
//             saveSetting('feature_title', '');
//             saveSetting('feature_description', '');

//         } else {

            $itemTitle  = [];
            $itemDisc   = [];
            foreach($request->get('feature_title_' . app()->getLocale()) as $indexName=>$name) {
                foreach(getLanguages() as $index=>$language) {
                    $itemTitle[$indexName] = [
                        'ar' => $request->get('feature_title_ar')[$indexName] ?? $request->get('feature_title_' . app()->getLocale())[$indexName],
                        'en' => $request->get('feature_title_en')[$indexName] ?? $request->get('feature_title_' . app()->getLocale())[$indexName],
                    ];

                    $itemDisc[$indexName] = [
                        'ar' => $request->get('feature_description_ar')[$indexName] ?? $request->get('feature_description_' . app()->getLocale())[$indexName],
                        'en' => $request->get('feature_description_en')[$indexName] ?? $request->get('feature_description_' . app()->getLocale())[$indexName],
                    ];
                }

            }

            saveSetting('feature_title', $itemTitle);
            saveSetting('feature_description', $itemDisc);
        // }


        if(request()->file('image')) {

            if(!empty(getSetting('feature_image'))) {

                Storage::disk('public')->delete(getSetting('system_image'));
            }

            $image = request()->file('image')->store('settings', 'public');

            saveSetting('feature_image', $image);
        }

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->back();

    }//end of index

}//end of controller