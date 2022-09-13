<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:admin-products-read|admin-products-create|admin-products-write', ['only' => ['index','store']]);
        $this->middleware('permission:admin-products-create', ['only' => ['create','store']]);
        $this->middleware('permission:admin-products-write', ['only' => ['edit','update','destroy']]);
    }
    public function index()
    {
        $products = Product::with('variants')->get();
        return view('admin.products.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
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
            'image' => 'required',
        ]);


//        if($request->file('image')){

//        }
//
//        dd($data);


//        $file = $request->image;
//        $path = "products";
//
//        $fileName = time() .$file;
//        Storage::disk('public')->put($path . $fileName, File::get($file));
        $file = $request->file('image');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('product/Image'), $filename);
        $product = Product::create(['name' => $request->name, 'image' => $filename]);
        if ($product) {
            foreach ($request->size as $key => $variants) {
                ProductVariant::create([
                    'product_id' => $product->id,
                    'price' => $request->price[$key],
                    'size' => $request->size[$key],
                    'unit' => $request->unit[$key],
                ]);
            }
        }
        Alert::success('Congrats', 'Product Created Successfully');
        return redirect(route('products.index'));
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
        $product = Product::with('variants')->find($id);

        return view('admin.products.edit', get_defined_vars());
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
            'image' => 'nullable',
        ]);
        $product = Product::findorfail($id);

        if ($request->has('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('product/Image'), $filename);
            $product->image = $filename;
        }
        $product->name = $request->name;
        $product->save();

        foreach ($request->size as $key => $variants) {

            if (isset($request->variant_id[$key])) {
                $pV = ProductVariant::findorfail($request->variant_id[$key]);
                $pV->price = $request->price[$key];
                $pV->size = $request->size[$key];
                $pV->unit = $request->unit[$key];
                $pV->save();
            } else {

                ProductVariant::create([
                    'product_id' => $product->id,
                    'price' => $request->price[$key],
                    'size' => $request->size[$key],
                    'unit' => $request->unit[$key],
                ]);
            }

        }

        ProductVariant::whereIn('id', $request->deleted_items)->delete();

        Alert::success('Congrats', 'Product Updated Successfully');
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        Alert::success('Congrats', 'Product Deleted Successfully');
        return redirect(route('products.index'));
    }
}
