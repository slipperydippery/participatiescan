<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
	protected $fillable = [
		'districtmodel_id', 'scan_id', 'group_id'
	];

    public function districtmodel()
    {
    	return $this->belongsTo('App\Districtmodel');
    }

    public function scan()
    {
    	return $this->belongsTo('App\Scan');
    }

    public function group()
    {
    	return $this->belongsTo('App\Group');
    }

    public function subdistricts()
    {
    	return $this->hasMany('App\Subdistrict');
    }
}
