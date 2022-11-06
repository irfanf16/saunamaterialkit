<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{

    public function loginForm()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where(['email' => $request->email, 'user_type' => 3])->first();
        if ($user) {
            Alert::error('error', 'You do not have access to system user');
            return back();
        }

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            Alert::error('error', 'Provided credentials are not valid');
            return back();
        }
        Alert::success('Welcome', 'Welcome To Airconchamp');

        if (Auth::user()->user_type == 1) {
            return redirect(route('admin.dashboard'));
        }
        return redirect(route('workshop.dashboard'));

    }
    public function customerRegister(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 100,
                'errors' => $validator->messages()->all()
            ]);
        }

        try {

            $user =User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'user_type'=>3,
                'password'=> Hash::make($request->password)
            ]);
            $data['token'] =  $user->createToken('MyApp')->plainTextToken;
            $data['user'] =  $user;
            return response()->json([
                'status' => 200,
                'data' =>$data
            ]);


        } catch (\Throwable $th) {

            ///throw $th;
            return response()->json([
                "status" => 500,
                "message" => "Sorry! Something Went Wrong.",
                "exceptions" => $th
            ]);
        }
    }
    public function customerLogin(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 100,
                'errors' => $validator->messages()->all()
            ]);
        }

        try {

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $user = Auth::user();
                $data['token'] =  $user->createToken('MyApp')->plainTextToken;
                $data['user'] =  $user;
                return response()->json([
                    'status' => 200,
                    'data' =>$data
                ]);
            }
            else{
                return response()->json([
                    'status' => 100,
                    'errors' =>['Unauthorised']
                ]);
            }

        } catch (\Throwable $th) {

            ///throw $th;
            return response()->json([
                "status" => 500,
                "message" => "Sorry! Something Went Wrong.",
                "exceptions" => $th
            ]);
        }
    }
}
