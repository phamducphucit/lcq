<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count_order =  DB::table('orders')->count();
        $count_product =  DB::table('products')->count();
        $count_customer =  DB::table('customers')->count();
        //Sâm tươi ID_Categỏy = 1
        $list_samtuoi = ProductModel::where("category_id", "=", 1)->get();
        //Sâm troc ID_Categỏy = 2
        $list_samtroc = ProductModel::where("category_id", "=", 2)->get();
        //Sâm troc ID_Categỏy = 2
        $list_samgay = ProductModel::where("category_id", "=", 7)->get();
        //Sâm kho ID_Categỏy = 3
        $list_samkho = ProductModel::where("category_id", "=", 3)->get();
        //Sâm nuoc ID_Categỏy = 4
        $list_samnuoc = ProductModel::where("category_id", "=", 4)->get();
        //Nấm ID_Categỏy = 5
        $list_nam = ProductModel::where("category_id", "=", 5)->get();
        //Thực phẩm chức năng ID_Categỏy = 5
        $list_thucpham = ProductModel::where("category_id", "=", 6)->get();

        return view('home', compact('count_order','count_product','count_customer', 'list_samtuoi', 'list_samtroc', 'list_samkho', 'list_samnuoc', 'list_nam', 'list_thucpham', 'list_samgay'));
    }
}
