<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CustomerModel;
use App\Models\OrderDetail;


class Orders extends Model
{
    //
    protected $table = 'orders';

    protected  $appends = ['customer','products', 'nguoitracuoc', 'nguoitracuocrabenxe'];

    public function getCustomerAttribute()
    {
        if($this->attributes['customer_id'] != null)
        {
        	return CustomerModel::where("id", "=", $this->attributes['customer_id'])->first();
        }
        return null;
    }

    public function getProductsAttribute()
    {
        if($this->attributes['id'] != null)
        {
        	$order_detail = OrderDetail::where("order_id", "=", $this->attributes['id'])->get();
        	$html = "";
        	foreach ($order_detail as $key => $value) {
        		# code...
        		$html .= "<li><span style='color:#1ABC9C'>".$value->product->name. "</span> <span style='color:#d4166c'>" .$value->quantity."  ".$value->product->donvi."</span> </li>";
        	}
        	return $html;
        }
        return null;
    }

    public function getNguoitracuocAttribute()
    {
        if($this->attributes['person_pay_shipping'] == 1)
        {
        	return "Khách trả ship";
        }else{
            return "Bao ship";
        }
    }

    public function getNguoitracuocrabenxeAttribute()
    {
        if($this->attributes['person_pay_shipping_to_station'] == 1)
        {
            return "Khách trả cước ra bến xe";
        }else{
            return "Bao cước ra bến xep";
        }
    }
}
