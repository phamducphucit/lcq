<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';

	protected $fillable = [
		'name',
		'code'
	];
	
    
    public function districts()
	{
		return $this->hasMany(District::class, 'province_id');
    }
    
    public function wards()
	{
		return $this->hasMany(Ward::class, 'province_id');
    }
    
}
