<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'wards';
    protected $fillable = ['name'];
    
    public function provinces(){
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function districts(){
        return $this->belongsTo(District::class, 'district_id');
    }
}
