<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Service;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:admin-workshops-read|admin-workshops-create|admin-workshops-write', ['only' => ['index', 'store']]);
        $this->middleware('permission:admin-workshops-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:admin-workshops-write', ['only' => ['edit', 'update', 'destroy']]);
    }

    public function index()
    {
        $workshops = Workshop::with('adminUser', 'locations', 'services')->get();

        return view('admin.workshop.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        $locations = Location::all();
        return view('admin.workshop.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'workshop_name' => 'required',
            'contact_person' => 'required',
            'phone_no' => 'required',
            'workshop_address' => 'required',
            'zipcode' => 'required',
            'password' => 'required|min:8',
            'locations' => 'required',
            'services' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_type = 2;
        $user->password = Hash::make($request->password);
        $user->save();


        if ($user) {
//                 $file=$request->file('workshop_logo');
//                 $path="workshop/logo";
//                 dd($file);
//                 $fileName   = time() . $file->getClientOriginalName();
//                 Storage::disk('public')->put($path . $fileName, File::get($file));
//                 $file_name  = $file->getClientOriginalName();
//                 $file_type  = $file->getClientOriginalExtension();
//                 $filePath   = 'storage/'.$path . $fileName;

//                 Storage::disk("public")->put("workshop/logo", $request->avatar);

            $file = $request->file('workshop_logo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('workshop/Image'), $filename);
            $workshop = new Workshop();
            $workshop->name = $request->workshop_name;
            $workshop->logo = $filename;
//            $workshop->logo = 'logo.png';
            $workshop->address = $request->workshop_address;
            $workshop->zipcode = $request->zipcode;
            $workshop->contact_person = $request->contact_person;
            $workshop->phone_no = $request->phone_no;
            $workshop->save();
            $workshop->locations()->attach($request->locations);
            $workshop->services()->attach($request->services);
            $user->workshops()->attach($workshop);
            $role = Role::where('name', 'Workshop')->first()->id;
            $user->assignRole($role);

        }

        Alert::success('Congrats', 'Workshop Created Successfully');

        return redirect(route('workshop.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workshop = Workshop::with('adminUser', 'locations', 'services')->find($id);

        $services = Service::all();
        $locations = Location::all();
        return view('admin.workshop.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
//        'email' => 'required',
            'workshop_name' => 'required',
            'contact_person' => 'required',
            'phone_no' => 'required',
            'workshop_address' => 'required',
            'zipcode' => 'required',
            'password' => 'nullable',
            'locations' => 'required',
            'services' => 'required',
        ]);

        $workshop = Workshop::with('adminUser')->find($id);

        $file = $request->file('workshop_logo');
        if ($file) {
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('workshop/Image'), $filename);
            $workshop->logo = $filename;
        }
        $workshop->name = $request->workshop_name;
        $workshop->address = $request->workshop_address;
        $workshop->zipcode = $request->zipcode;

        $workshop->contact_person = $request->contact_person;
        $workshop->phone_no = $request->phone_no;
        $workshop->save();
        $workshop->locations()->sync($request->locations);
        $workshop->services()->sync($request->services);
        $adminUser = User::find($workshop->adminUser[0]->id);
        $adminUser->name = $request->name;
        if ($request->password) {
            $adminUser->password = Hash::make($request->password);
        }
        $adminUser->save();
        Alert::success('Congrats', 'Workshop Updated Successfully');

        return redirect(route('workshop.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workshop = Workshop::with('users')->find($id);
        $users = $workshop->users;
        $workshop->users()->detach();
        $workshop->delete();
        foreach ($users as $user) {
            $user = User::find($user->id);
            $user->delete();
        }
        Alert::success('Congrats', 'Workshop Deleted Successfully');

        return back();
    }
}
