<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\DB;
use App\Models\Orders;
use App\Models\OrderDetail;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $status_id = $request->input('status_id');
        $key_search = $request->input('key_search');

        if(auth()->user()->isAdmin()){
            $list_orders = Orders::orderBy('id', 'DESC');
        }else{
            $list_orders = Orders::where("user_id", "=", auth()->user()->id)->orderBy('id', 'DESC');
        }

        if(!empty($status_id)){
            $list_orders = $list_orders->where('status', $status_id);
        }
        if(!empty($key_search)){
            $list_orders = $list_orders->where('id', '=', $key_search);
        }

        $list_orders = $list_orders->get();


        return view('admin.orders.orders', compact('list_orders', 'status_id', 'key_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(auth()->user()->isAdmin()){
            $list_cus = CustomerModel::all();
        }else{
            $list_cus = CustomerModel::where("user_id", "=", auth()->user()->id)->get();
        }
        $list_products = ProductModel::all();
        return view('admin.orders.add_order', compact('list_cus', 'list_products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre/>";print_r($request->all());die;
        DB::transaction(function() use($request) {

            $order = new Orders;
            $order->user_id_create = auth()->user()->id;
            $order->user_id = auth()->user()->id;
            $order->customer_id = $request->input('customer_id');
            $order->name_receiver = $request->input('name_receiver');
            $order->address_receiver = $request->input('address_receiver');
            $order->phone_receiver = $request->input('phone_receiver');
            $order->order_date = now();
            if($request->input('person_pay_shipping') == 2){
                $order->person_pay_shipping = 2;
            }else{
                $order->person_pay_shipping = 1;
            }

            if($request->input('person_pay_shipping_to_station') == 2){
                $order->person_pay_shipping_to_station = 2;
            }else{
                $order->person_pay_shipping_to_station = 1;
            }

            $order->note = $request->input('note');
            
            $order->save();

            $orderProducts = [];
            $quantity = $request->input('quantity');

            foreach ($request->input('product_id') as $key => $productId) {
                //Cập nhật lại số lượng hàng
                $prod = ProductModel::find($productId);
                    $quantity_inventory = $prod->quantity;
                    $total_quantity = $quantity_inventory - $quantity[$key];
                $prod->quantity = $total_quantity;
                $prod->save();

                $orderProducts[] = [
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $quantity[$key]
                ];
            }
            OrderDetail::insert($orderProducts);

        });
        return redirect()->route('list.orders');
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
        return Orders::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        $order = Orders::find($id);
        $order->cod = $request->cod;
        $order->money_ship = $request->money_ship;
        $order->fee_to_station = $request->fee_to_station;
        if($request->status){
            $order->status = $request->status;
        }
        $order->save();
      return response()->json([ 'success' => true ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
