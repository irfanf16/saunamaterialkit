<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{

    public function loginForm(){
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where(['email'=>$request->email,'user_type'=>3])->first();
        if ($user) {
            Alert::error('error', 'You do not have access to system user');
            return back();
        }

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            Alert::error('error', 'Provided credentials are not valid');
            return back();
        }
        Alert::success('Welcome', 'Welcome To Airconchamp');

        if (Auth::user()->user_type==1){
            return redirect(route('home'));
        }
        return redirect(route('workshop.dashboard'));

    }

}
