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
        $unit = $this->attributes['unit'];

        switch ($unit) {
          case 1:
            return "kg";
            break;
          case 2:
            return "hộp";
            break;
          case 3:
            return "túi";
            break;
          default:
            echo "Không đơn vị";
        }
    }
}
