<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\LocationCity;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:admin-locations-read|admin-locations-create|admin-locations-write', ['only' => ['index','store']]);
        $this->middleware('permission:admin-locations-create', ['only' => ['create','store']]);
        $this->middleware('permission:admin-locations-write', ['only' => ['edit','update','destroy']]);
    }
    public function index()
    {
        $locations=Location::with('cities')->get();
        return  view('admin.locations.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.locations.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
          'name'=>'required',
      ]);

      $location=Location::create(['name'=>$request->name]);
      if ($location){
          foreach ($request->city_name as $city){
           LocationCity::create(['location_id'=>$location->id,'name'=>$city]);
          }
      }

        Alert::success('Congrats', 'Location Created Successfully');

        return redirect(route('locations.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location=Location::with('cities')->find($id);

        return  view('admin.locations.edit',get_defined_vars());
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
        $request->validate([
            'name'=>'required',
        ]);
        $location=Location::find($id);
        $location->cities()->delete();
        $location->update(['name'=>$request->name]);
        if ($location){
            foreach ($request->city_name as $city){
                LocationCity::create(['location_id'=>$location->id,'name'=>$city]);
            }
        }
        Alert::success('Congrats', 'Location Updated Successfully');

        return redirect(route('locations.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     Location::find($id)->delete();
        Alert::success('Congrats', 'Location Deleted Successfully');

        return back();

    }
}
