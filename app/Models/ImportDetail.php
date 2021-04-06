<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportDetail extends Model
{
    //
    protected $table = 'import_detail';

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
