<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Contracts\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
    	return view('admin.auth.login');

    }//end of index

    public function store(LoginRequest $request)
    {

        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $request->merge([
            $login_type => $request->input('login')
        ]);

        $remember = $request->has('remember');

        $credentials = $request->only($login_type, 'password');

        if (auth('admin')->attempt($credentials, $remember)) {

            session()->flash('success', __('site.login_successfully'));

            return redirect()->route('admin.index');

        } else {

            return redirect()->back()->with(['login' => __('auth.no_data_found')])->withInput();

        }//end of if

    }//end of index

    public function logout()
    {
        auth('admin')->logout();

        return redirect()->route('admin.login.index');

    }//end of fun

}//end of controller
