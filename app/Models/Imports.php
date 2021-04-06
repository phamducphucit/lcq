<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ImportDetail;

class Imports extends Model
{
    //
    protected $table = 'imports';

    protected  $appends = ['products'];

    public function getProductsAttribute()
    {
        if($this->attributes['id'] != null)
        {
        	$import_detail = ImportDetail::where("imports_id", "=", $this->attributes['id'])->get();
        	$html = "";
        	foreach ($import_detail as $key => $value) {
        		# code...
        		$html .= "<tr>";
        		$html .= "<td scope='row'><span style='color:#1ABC9C'>".$value->product->name. "</span></td> <td><span style='color:#d4166c'>" .$value->quantity."  ".$value->product->donvi."</span> </td><td>".$value->quantity_before_entering."</td><td>".$value->quantity_after_entering."</td>";
        		$html .= "</tr>";
        	}
        	return $html;
        }
        return null;
    }
}
