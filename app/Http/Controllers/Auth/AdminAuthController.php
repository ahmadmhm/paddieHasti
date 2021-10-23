<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{

    public function login()
    {
        return view('login');
    }
    public function postLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|regex:/^09\d{9}$/',
            'password' => 'required',
        ]);

       
        $admin = Admin::where('mobile', $request->mobile)->where('password',Hash::make($request->password))->first();

        if ($admin) {
            if ($admin->access_status == 0) {
                return back()->withErrors([
                    'حساب کاربری شما غیر فعال است لطفا با پشتیبانی تماس بگیرید'
                ]);
            }
            Auth::guard()->login($admin, true);
            return redirect()->route('dashboard');
        } else{
            return back()->withErrors([
                'حساب کاربری شما غیر فعال است لطفا با پشتیبانی تماس بگیرید'
            ]);
        }
      
    }

    public function authenticate(Request $request){
        // Retrive Input
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // if success login

            return redirect('berhasil');

            //return redirect()->intended('/details');
        }
        // if failed login
        return redirect('login');
    }

}
