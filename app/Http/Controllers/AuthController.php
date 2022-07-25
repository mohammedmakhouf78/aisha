<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('admin.pages.auth.login');
    }

    public function login(LoginRequest $request)
    {
       //dd($request);

       $dataOnly = $request->only(['email', 'password']);
      //  dd($dataOnly);
      
      
        if (Auth::attempt($dataOnly)) {
             dd('true');
            Alert::success("تم الدخول بنجاح");
            return redirect(route('admin.home'));
        } else {
            dd('false');
           return redirect()->back();
        }
    }
}
