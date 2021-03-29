<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_categories = CategoryModel::all();
        return view('admin.categories.categories', compact('list_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.add_category');
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
            'status' => 'required',
            'description' => 'required',
            'image' => 'required',
            ],
        );

        if($validate->fails()) {
            return redirect()->back()
                        ->withErrors($validate)
                        ->withInput();
        }
        // echo "<pre/>";print_r($request);die;
        $category = new CategoryModel();

        $category->name = $request->name;
        $category->status = $request->status;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = 'img_categories/'.time()."-".$image->getClientOriginalName();
            $destinationPath = public_path('/img_categories');
            $request->file('image')->move($destinationPath, $image_name);
            $category->image = $image_name;
        }else{
            $image_name = 'img_categories/no-image.png';
            $category->image = $image_name;
        }

        $category->save();

        
        return redirect()->route('list.categories');
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
        $category = CategoryModel::find($id);
         return view('admin.categories.edit_category', compact('category'));
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
            'status' => 'required',
            'description' => 'required',
            'image' => 'required',
            ],
        );

        if($validate->fails()) {
            return redirect()->back()
                        ->withErrors($validate)
                        ->withInput();
        }
        // echo "<pre/>";print_r($request);die;
        $category = CategoryModel::find($id);

        $category->name = $request->name;
        $category->status = $request->status;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = 'img_categories/'.time()."-".$image->getClientOriginalName();
            $destinationPath = public_path('/img_categories');
            $request->file('image')->move($destinationPath, $image_name);
            $category->image = $image_name;
        }else{
            $image_name = 'img_categories/no-image.png';
            $category->image = $image_name;
        }

        $category->save();

        
        return redirect()->route('list.categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = CategoryModel::find($id);

        $category->delete();

        return redirect()->route('list.categories');
    }
}
