<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Requests\Admin\Setting\ContactRequest;
use Illuminate\Contracts\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
    	return view('admin.settings.contacts');

    }//end of index

    public function store(ContactRequest $request)
    {
        saveTransSetting('contact_email', $request->email);
        saveTransSetting('contact_phone', $request->phone);
        saveTransSetting('contact_fax', $request->fax);
        saveTransSetting('contact_address', $request->address);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->back();

    }//end of index

}//end of controller