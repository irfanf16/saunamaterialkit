<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use App\Models\Workshop;
use App\Models\WorkshopProduct;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StockManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:admin-stocks-read|admin-stocks-create|admin-stocks-write', ['only' => ['index','store']]);
        $this->middleware('permission:admin-stocks-create', ['only' => ['create','store']]);
        $this->middleware('permission:admin-stocks-write', ['only' => ['edit','update','destroy']]);
    }
    public function index()
    {
        $stocks=WorkshopProduct::with('workshop','product','productVariant')->get();
       return view('admin.stocks.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workshops=Workshop::all();
        $productVariants=ProductVariant::with('product')->get();
        return view('admin.stocks.create',get_defined_vars());
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
           'workshop_id'=>'required',
           'product_variant_id'=>'required',
           'stocks'=>'required',
        ]);
          $pv=ProductVariant::find($request->product_variant_id);
        WorkshopProduct::create([
           'workshop_id'=>$request->workshop_id,
           'product_id'=>$pv->product_id,
           'product_variant_id'=>$pv->id,
           'stocks'=>$request->stocks,
        ]);
        Alert::success('Congrats', 'Product Assigned Successfully');
        return redirect(route('stocks.index'));
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
        $workshops=Workshop::all();
        $productVariants=ProductVariant::with('product')->get();
        $workshopProduct=WorkshopProduct::with('workshop','product','productVariant')->find($id);
        return view('admin.stocks.edit',get_defined_vars());
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
            'stocks'=>'required',
        ]);
        $workshopProduct=WorkshopProduct::find($id);
        $workshopProduct->stocks=$request->stocks;
        $workshopProduct->save();
        Alert::success('Congrats', 'Product Stocks update Successfully');
        return redirect(route('stocks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
