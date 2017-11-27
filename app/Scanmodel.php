<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scanmodel extends Model
{
	public function scans()
	{
		return $this->hasMany('App\Scan');
	}

    public function themes()
    {
    	return $this->hasMany('App\Theme');
    }

    public function instantiemodels()
    {
    	return $this->hasMany('App\Instantiemodel');
    }

    public function groups()
    {
    	return $this->hasMany('App\Group');
    }
}
