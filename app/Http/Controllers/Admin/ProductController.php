<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_products = ProductModel::all();
        $list_categories = CategoryModel::all();
        return view('admin.products.products', compact('list_products', 'list_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_categories = CategoryModel::all();
        return view('admin.products.add_product', compact('list_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validate
        $validate = Validator::make($request->all(), [
            'name' => 'required',            
            'category_id' => 'required',
            'code' => 'required|unique:products',
            'description' => 'required|max:191',
            'price' => 'required',
            'quantity' => 'required',
            'unit' => 'required',
            ],
        );

        if($validate->fails()) {
            return redirect()->back()
                        ->withErrors($validate)
                        ->withInput();
        }
        // echo "<pre/>";print_r($request);die;
        $product = new ProductModel();

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->code = $request->code;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->unit = $request->unit;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = 'img_products/'.time()."-".$image->getClientOriginalName();
            $destinationPath = public_path('/img_products');
            $request->file('image')->move($destinationPath, $image_name);
            $product->image = $image_name;
        }else{
            $image_name = 'img_products/no-image.png';
            $product->image = $image_name;
        }

        $product->save();

        
        return redirect()->route('list.products');
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
        return ProductModel::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = ProductModel::find($id);
        $list_categories = CategoryModel::all();
       return view('admin.products.edit_product', compact('product','list_categories'));
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
        //validate
        $validate = Validator::make($request->all(), [
            'name' => 'required',            
            'category_id' => 'required',
            'code' => 'required',
            'description' => 'required|max:191',
            'price' => 'required',
            'quantity' => 'required',
            'unit' => 'required',
            ],
        );

        if($validate->fails()) {
            return redirect()->back()
                        ->withErrors($validate)
                        ->withInput();
        }
        // echo "<pre/>";print_r($request);die;
        $product = ProductModel::find($id);

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->code = $request->code;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->unit = $request->unit;
        // $product->image = "no-image";

        //upload hinh img main
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = 'img_products/'.time()."-".$image->getClientOriginalName();
            $destinationPath = public_path('/img_products');
            $request->file('image')->move($destinationPath, $image_name);
            $product->image = $image_name;
        }

        $product->save();

        
        return redirect()->route('list.products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = ProductModel::find($id);

        $product->delete();

        return redirect()->route('list.products');
    }
}
