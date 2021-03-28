<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    protected $fillable = ['name'];
        
    public function provinces(){
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function wards(){
        return $this->hasMany(Ward::class, 'district_id');
    }
}
