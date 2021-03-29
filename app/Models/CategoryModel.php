<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'category';

    public function products(){
        return $this->hasMany(ProductModel::class);
    }
}
