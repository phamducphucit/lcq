<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\CustomerModel;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isAdmin()){
            $list_customers = CustomerModel::all();
        }else{
            $list_customers = CustomerModel::where("user_id", "=", auth()->user()->id)->get();
        }
        
        return view('admin.customers.customers', compact('list_customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all();
        return view('admin.customers.add_customer', compact('provinces'));
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
            'phone' => 'required',
            'address' => 'required|max:191',
            'province_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
            ],
        );

        if($validate->fails()) {
            return redirect()->back()
                        ->withErrors($validate)
                        ->withInput();
        }
        // echo "<pre/>";print_r($request);die;
        $customer = new CustomerModel();

        $customer->name = $request->name;
        $customer->user_id = auth()->user()->id;
        $customer->phone = $request->phone;
        $customer->adress = $request->address;
        $customer->province_id = $request->province_id;
        $customer->district_id = $request->district_id;
        $customer->ward_id = $request->ward_id;
        $customer->transport = $request->transport;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = 'img_customers/'.time()."-".$image->getClientOriginalName();
            $destinationPath = public_path('/img_customers');
            $request->file('image')->move($destinationPath, $image_name);
            $customer->image = $image_name;
        }else{
            $image_name = 'img_customers/no-image.png';
            $customer->image = $image_name;
        }

        $customer->save();

        
        return redirect()->route('list.customers');
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
        return CustomerModel::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinces = Province::all();

        $customer = CustomerModel::find($id);
        return view('admin.customers.edit_customer', compact('provinces','customer'));
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
            'phone' => 'required',
            'address' => 'required|max:191',
            'province_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required'
            ],
        );

        if($validate->fails()) {
            return redirect()->back()
                        ->withErrors($validate)
                        ->withInput();
        }
        // echo "<pre/>";print_r($request);die;
        $customer = CustomerModel::find($id);

        $customer->name = $request->name;
        $customer->user_id = auth()->user()->id;
        $customer->phone = $request->phone;
        $customer->adress = $request->address;
        $customer->province_id = $request->province_id;
        $customer->district_id = $request->district_id;
        $customer->ward_id = $request->ward_id;
        $customer->transport = $request->transport;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = 'img_customers/'.time()."-".$image->getClientOriginalName();
            $destinationPath = public_path('/img_customers');
            $request->file('image')->move($destinationPath, $image_name);
            $customer->image = $image_name;
        }else{
            $image_name = 'img_customers/no-image.png';
            $customer->image = $image_name;
        }

        $customer->save();

        
        return redirect()->route('list.customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = CustomerModel::find($id);

        $customer->delete();

         return redirect()->route('list.customers');
    }

    public function province(Request $request){
        return Province::all();
    }

    public function district(Request $request){
        return District::where('province_id',$request->id)->get();
    }

    public function ward(Request $request){
        return Ward::where('district_id', $request->id)->get();
    }

}
