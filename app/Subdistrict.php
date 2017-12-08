<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
    protected $fillable = [
    	'district_id', 'title', 'description'
    ];

    public function district()
    {
    	return $this->belongsTo('App\District');
    }
}
