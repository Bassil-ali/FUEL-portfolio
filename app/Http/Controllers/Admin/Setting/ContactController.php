<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
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
        saveSetting('contact_email', $request->email);
        saveSetting('contact_phone', $request->phone);
        saveSetting('contact_fax', $request->fax);
        saveSetting('contact_address', $request->address);
        saveSetting('contact_commercial_record', $request->commercial_record);
        saveSetting('contact_tax_number', $request->tax_number);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->back();

    }//end of index

}//end of controller