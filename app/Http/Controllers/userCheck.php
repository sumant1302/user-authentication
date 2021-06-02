<?php

namespace App\Http\Controllers;

use App\Http\Middleware\userAuth;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class userCheck extends Controller
{
    function index(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:16'
        ]);

        //Retrieve input details
        /*$email = $request->post('email');
        $password = $request->post('password');

        //From Database query
        $check = Profile::where(['email' => $email])->get();
        //echo $check;
        //creating session
        if (isset($check['0']->id)) {
            if (Hash::check($password, $check['0']->password)) {
                $request->session()->put('name', $check['0']->name);
                return redirect('profile');
            } else {
                $request->session()->flash('error', 'Incorrect Password');
                return redirect('login');
            }
        } else {
            $request->session()->flash('error', 'User Credentials not found');
            return redirect('login');
        }*/
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('name', Auth::user()->name);
            return redirect()->intended('profileDashboard');
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records',
        ]);
    }

    function redirectProfile()
    {
        return view('profileDashboard');
    }
}
