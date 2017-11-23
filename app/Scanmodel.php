<?php

namespace participatiescan;

use Illuminate\Database\Eloquent\Model;

class Scanmodel extends Model
{
	public function scans()
	{
		return $this->hasMany('participatiescan\Scan');
	}

    public function themes()
    {
    	return $this->hasMany('participatiescan\Theme');
    }

    public function instantiemodels()
    {
    	return $this->hasMany('participatiescan\Instantiemodel');
    }

    public function groups()
    {
    	return $this->hasMany('participatiescan\Group');
    }
}
