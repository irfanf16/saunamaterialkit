<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners=Banner::all();
        return view('admin.banners.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $file = $request->file('image');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('banners/Image'), $filename);
        $banner=new Banner();
        $banner->title=$request->title;
        $banner->description=$request->description;
        $banner->image=$filename;
        $banner->save();
        Alert::success('Congrats', 'Banner Created Successfully');

        return redirect(route('banners.index'));
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
        $banner=Banner::findorfail($id);

        return view('admin.banners.edit',get_defined_vars());
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
            'title' => 'required',
            'description' => 'required',
//            'image' => 'required',
        ]);
        $banner=Banner::findorfail($id);

        $file = $request->file('image');
        if ($file){
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('banners/Image'), $filename);
            $banner->image=$filename;
        }
        $banner->title=$request->title;
        $banner->description=$request->description;
        $banner->save();
        Alert::success('Congrats', 'Banner Updated Successfully');

        return redirect(route('banners.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Banner::findorfail($id)->delete();
        Alert::success('Congrats', 'Banner Deleted Successfully');

        return redirect(route('banners.index'));
    }
}
