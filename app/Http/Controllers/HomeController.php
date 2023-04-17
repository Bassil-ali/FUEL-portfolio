<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;

class HomeController extends Controller
{
    public function index()
    {
        return view('site.index.index');

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