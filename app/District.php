<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
	protected $fillable = [
		'scanmodel_id', 'id', 'title'
	];

    public function scanmodel()
    {
    	return $this->belongsTo('App\Scanmodel');
    }

    public function scans()
    {
    	return $this->belongsToMany('App\Scan');
    }

    public function group()
    {
    	return $this->belongsToMany('App\Group');
    }

    public function subdistricts()
    {
    	return $this->hasMany('App\Subdistrict');
    }
}
