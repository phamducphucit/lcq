<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Ward;

class ConfigController extends Controller
{
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
