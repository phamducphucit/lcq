<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductModel;

class OrderDetail extends Model
{
    //
    protected $table = 'order_details';

    protected  $appends = ['product'];

    public function getProductAttribute()
    {
        if($this->attributes['product_id'] != null)
        {
        	return ProductModel::where("id", "=", $this->attributes['product_id'])->first();
        }
        return null;
    }

}
