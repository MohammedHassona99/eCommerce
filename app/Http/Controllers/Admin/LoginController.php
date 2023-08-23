<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function getLoginPage()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $rule = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $message = [
            'email.required' => 'Email is Required',
            'email.email' => 'The email should be valid',
            'password.required' => 'The Password is required'
        ];
        $validate = Validator::make($request->all(), $rule, $message);

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // notify()->success('تم تسجيل الدخول بنجاح');
            return redirect()->route('admin.dashboard');
        }
        // notify()->error('لم يتم يتسيجل الدخول حاول مرة اخرى');
        return redirect()->back()->withErrors($validate)->withInput($request->all());
    }
}
