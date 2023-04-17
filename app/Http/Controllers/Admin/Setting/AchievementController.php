<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\AchievementRequest;
use Illuminate\Contracts\View\View;

class AchievementController extends Controller
{
    public function index(): View
    {
    	return view('admin.settings.achievements');

    }//end of index

    public function store(AchievementRequest $request)
    {

        $itemName  = [];
        $itemCount = [];
        foreach($request->get('achievement_name_' . app()->getLocale()) as $indexName=>$name) {
            foreach(getLanguages() as $index=>$language) {
                $itemName[$indexName] = [
                    'ar' => $request->get('achievement_name_ar')[$indexName] ?? $request->get('achievement_name_' . app()->getLocale())[$indexName],
                    'en' => $request->get('achievement_name_en')[$indexName] ?? $request->get('achievement_name_' . app()->getLocale())[$indexName],
                ];

                $itemCount[$indexName] = [
                    'ar' => $request->get('achievement_count_ar')[$indexName] ?? $request->get('achievement_name_' . app()->getLocale())[$indexName],
                    'en' => $request->get('achievement_count_en')[$indexName] ?? $request->get('achievement_name_' . app()->getLocale())[$indexName],
                ];
            }

        }

        saveSetting('achievement_name', $itemName);
        saveSetting('achievement_count', $itemCount);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->back();

    }//end of index

}//end of controller