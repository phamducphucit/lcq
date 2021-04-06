<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\Imports;
use App\Models\ImportDetail;
use Illuminate\Support\Facades\DB;

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

    public function listImports(Request $request)
    {
        //
        $key_search = $request->input('key_search');
        
        $list_imports = Imports::orderBy('id', 'DESC');

        if(!empty($key_search)){
            $list_imports = $list_imports->where('name', 'like', '%'.$key_search.'%');
        }

        $list_imports = $list_imports->get();


        return view('admin.products.list_imports', compact('list_imports','key_search'));
    }

    public function createImports()
    {
        $list_imports = Imports::all();
        return view('admin.products.add_import', compact('list_imports'));
    }

    // Import product
    public function storeImports(Request $request)
    {
        // echo "<pre/>";print_r($request->all());die;
        DB::transaction(function() use($request) {

            $import = new Imports;
            $import->user_id = auth()->user()->id;
            $import->name = $request->input('name');
            $import->order_date = now();
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = 'img_bill/'.time()."-".$image->getClientOriginalName();
                $destinationPath = public_path('/img_bill');
                $request->file('image')->move($destinationPath, $image_name);
                $import->image = $image_name;
            }else{
                $image_name = 'img_bill/no-image.png';
                $import->image = $image_name;
            }
            
            $import->save();

            $importProducts = [];
            $quantity = $request->input('quantity');

            foreach ($request->input('product_id') as $key => $productId) {
                //Cập nhật lại số lượng hàng
                $prod = ProductModel::find($productId);
                $name_product = $prod->name;
                $quantity_before_entering = $prod->quantity;
                $quantity_inventory = $prod->quantity;
                $total_quantity = $quantity_inventory + $quantity[$key];
                $prod->quantity = $total_quantity;
                $quantity_after_entering = $total_quantity;
                $prod->save();

                $importProducts[] = [
                    'imports_id' => $import->id,
                    'product_id' => $productId,
                    'name_product' => $name_product,
                    'quantity_before_entering' => $quantity_before_entering,
                    'quantity' => $quantity[$key],
                    'quantity_after_entering' => $quantity_after_entering,
                ];
            }
            ImportDetail::insert($importProducts);

        });
        return redirect()->route('list.imports');
    }

}
