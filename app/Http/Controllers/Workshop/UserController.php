<?php

namespace App\Http\Controllers\Workshop;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Workshop;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:workshop-users-read|workshop-users-create|workshop-users-write', ['only' => ['index','store']]);
        $this->middleware('permission:workshop-users-create', ['only' => ['create','store']]);
        $this->middleware('permission:workshop-users-write', ['only' => ['edit','update','destroy']]);
    }



    public function index(Request $request)
    {
        $data = User::whereHas('roles')->where('workshop_id',Auth::user()->workshops()->first()->id)->orderBy('id','DESC')->get();
        $roles = Role::where('name','!=','Workshop')->where('workshop_id',Auth::user()->workshops()->first()->id)->orderBy('id','DESC')->get();
        return view('workshop.users.index',compact('data','roles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['user_type'] =2;
        $input['workshop_id'] =Auth::user()->workshops()->first()->id;

        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        $workshop =Workshop::findorfail(Auth::user()->workshops()->first()->id);
        $user->workshops()->attach($workshop);

        Alert::success('Congrats', 'User Created Successfully');

        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::where('name','!=','Workshop')->where('workshop_id',Auth::user()->workshops()->first()->id)->orderBy('id','DESC')->get();
        $userRole = $user->roles->first();

        return view('admin.users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($request->all());
        $this->validate($request, [
            'name' => 'required',
//            'email' => 'required|email|unique:users,email,'.$id,
//            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }
        else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));
        Alert::success('Congrats', 'User Updated Successfully');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        Alert::success('Congrats', 'User Deleted Successfully');

        return redirect()->route('users.index');

    }
}
