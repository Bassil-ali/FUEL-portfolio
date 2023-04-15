<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Requests\Admin\Setting\ContactRequest;
use Illuminate\Contracts\View\View;

class WebsitController extends Controller
{
    public function index(): View
    {
    	return view('admin.settings.website');

    }//end of index

    public function store(ContactRequest $request)
    {
        saveTransSetting('system_name', $request->system_name);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->back();

    }//end of index

}//end of controller