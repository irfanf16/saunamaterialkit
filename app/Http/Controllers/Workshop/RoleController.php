<?php

namespace App\Http\Controllers\Workshop;


use App\Http\Controllers\Controller;
//use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:workshop-roles-read|workshop-roles-create|workshop-roles-write', ['only' => ['index','store']]);
        $this->middleware('permission:workshop-roles-create', ['only' => ['create','store']]);
        $this->middleware('permission:workshop-roles-write', ['only' => ['edit','update','destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::where('name','!=','Workshop')->where('workshop_id',Auth::user()->workshops()->first()->id)->orderBy('id','DESC')->get();
        return view('workshop.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('admin.roles.create',compact('permission'));
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
            'permission' => 'required',
        ]);
        $permissions=Permission::whereIn('name',$request->input('permission'))->pluck('id');
        $role = Role::create(['name' => $request->input('name'),'workshop_id'=>Auth::user()->workshops()->first()->id]);
        $role->syncPermissions($permissions);
        Alert::success('Congrats', 'Role Created Successfully');
        return redirect()->route('roles.index');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->join('permissions','permissions.id','=','role_has_permissions.permission_id')
            ->pluck('permissions.name','role_has_permissions.permission_id')
            ->all();

        return view('workshop.roles.edit',compact('role','permission','rolePermissions'));
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
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $permissions=Permission::whereIn('name',$request->input('permission'))->pluck('id');
        $role->syncPermissions($permissions);
        Alert::success('Congrats', 'Role Updated Successfully');
        return redirect()->route('roles.index');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        Alert::success('Congrats', 'Role Deleted Successfully');
        return redirect()->route('roles.index');

    }
}
