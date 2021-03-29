<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;

class CustomerModel extends Model
{
    protected $table = 'customers';

    protected  $appends = ['province', 'district', 'ward'];

    public function getProvinceAttribute()
    {
        if($this->attributes['province_id'] != null)
        {
        	return Province::where("id", "=", $this->attributes['province_id'])->first();
            // return json_decode($this->attributes['medical_history'],true);
        }
        return null;
    }

    public function getDistrictAttribute()
    {
        if($this->attributes['district_id'] != null)
        {
        	return District::where("id", "=", $this->attributes['district_id'])->first();
            // return json_decode($this->attributes['medical_history'],true);
        }
        return null;
    }

    public function getWardAttribute()
    {
        if($this->attributes['ward_id'] != null)
        {
        	return Ward::where("id", "=", $this->attributes['ward_id'])->first();
            // return json_decode($this->attributes['medical_history'],true);
        }
        return null;
    }

}
