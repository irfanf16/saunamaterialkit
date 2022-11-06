<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{

    public function registerForm(){

        return view('website.pages.register');
    }
    public function loginForm(){

        return view('website.pages.login');
    }
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email' => 'required',
            'password' => 'required|min:8',

        ]);

        try {
            $token = session()->get('token');
            $headers = array('Accept' => 'application/json', 'Authorization' => $token);
            $body = NULL;
            $url = config('app.url') . 'api/register';
            $response = Http::post( $url,[
                'name'=>$request->name,
                'email' => $request->email,
                'password' =>$request->password,
            ]);

            $response  =$response->json();

            if ($response['status'] == 100) {
                $errorMessages=$response['errors'];
                Session::flash('errorMessages',$errorMessages);
                return back();
            }
            if ($response['status'] == 200) {


                Session::put('token',$response['data']['token']);
                Session::put('user', $response['data']['user']);

                Alert::success('Congrats', 'Registered Successfully');
                return redirect('/');
            }
            if ($response['status'] == 500) {
                dd($response['exceptions']);
            }
            } catch (\Throwable $th) {
            throw $th;
        }



    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        try {
            $token = session()->get('token');
            $headers = array('Accept' => 'application/json', 'Authorization' => $token);
            $body = NULL;
            $url = config('app.url') . 'api/login';
            $response = Http::post( $url,[
                'email' => $request->email,
                'password' =>$request->password,
            ]);

            $response  =$response->json();
            if ($response['status'] == 100) {
                $errorMessages=$response['errors'];
                Session::flash('errorMessages',$errorMessages);
                return back();
            }
            if ($response['status'] == 200) {

//                dd($response['data']);
                Session::put('token',$response['data']['token']);
                Session::put('user', $response['data']['user']);
                Alert::success('Congrats', 'Login Successfully');
                return redirect('/');
            }
            if ($response['status'] == 500) {
                dd($response['exceptions']);
            }
        } catch (\Throwable $th) {
            throw $th;
        }

    }
    public function logout(){
        Session::flush();
        return redirect('/');
    }

}
