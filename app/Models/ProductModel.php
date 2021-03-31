<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected  $appends = ['donvi'];

    public function category(){
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    public function getDonviAttribute()
    {
        if($this->attributes['unit'] == 1)
        {
        	return "kg";
        }else{
        	return "hộp";
        }
    }
}
