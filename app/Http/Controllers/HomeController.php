<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Slider;
use App\Models\Partner;

class HomeController extends Controller
{
    public function index()
    {
        $sliders  = Slider::all();
        $partners = Partner::all();

        return view('site.index.index', compact('sliders', 'partners'));

    }//end of index

    public function changeLanguage(Language $language)
    {
        if (!in_array($language->code, Language::pluck('code')->toArray())) {
            abort(400);
        }

        session()->put('code', $language->code);
        session()->put('dir', $language->dir);
        
        return redirect()->back();

    }//end of changeLanguage

}//end of controller