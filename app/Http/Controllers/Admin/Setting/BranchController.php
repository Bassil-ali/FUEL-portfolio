<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\BranchRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class BranchController extends Controller
{
    public function index(): View
    {
    	return view('admin.settings.branch');

    }//end of index

    public function store(BranchRequest $request)
    {
      

       
//         if(empty($request->get('feature_title' . app()->getLocale()))) {
//  dd($request);
//             saveSetting('feature_title', '');
//             saveSetting('feature_description', '');

//         } else {

            $itemTitle  = [];
            $itemLoc   = [];
            $itemPhon   = [];
            foreach($request->get('branch_title_' . app()->getLocale()) as $indexName=>$name) {
                foreach(getLanguages() as $index=>$language) {
                    $itemTitle[$indexName] = [
                        'ar' => $request->get('branch_title_ar')[$indexName] ?? $request->get('branch_title_' . app()->getLocale())[$indexName],
                        'en' => $request->get('branch_title_en')[$indexName] ?? $request->get('branch_title_' . app()->getLocale())[$indexName],
                    ];

                    $itemLoc[$indexName] = [
                        'ar' => $request->get('branch_location_ar')[$indexName] ?? $request->get('branch_location_' . app()->getLocale())[$indexName],
                        'en' => $request->get('branch_location_en')[$indexName] ?? $request->get('branch_location_' . app()->getLocale())[$indexName],
                    ];
                    $itemPhon[$indexName] = [
                        'ar' => $request->get('branch_phone_ar')[$indexName] ?? $request->get('branch_phone_' . app()->getLocale())[$indexName],
                        'en' => $request->get('branch_phone_en')[$indexName] ?? $request->get('branch_phone_' . app()->getLocale())[$indexName],
                    ];
                }

            }
           
            saveSetting('branch_title', $itemTitle);
            saveSetting('branch_location', $itemLoc);
            saveSetting('branch_phone', $itemPhon);
        // }


        // if(request()->file('image')) {

        //     if(!empty(getSetting('feature_image'))) {

        //         Storage::disk('public')->delete(getSetting('system_image'));
        //     }

        //     $image = request()->file('image')->store('settings', 'public');

        //     saveSetting('feature_image', $image);
        // }

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->back();

    }//end of index

}//end of controller