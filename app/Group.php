<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
    	'title', 'user_id', 'scanmodel_id', 'postcode_id'
    ];

    public function scans()
    {
    	return $this->hasMany('App\Scan');
    }

    public function invitations()
    {
    	return $this->hasMany('App\Invitation');
    }

    public function grouprequests()
    {
    	return $this->hasMany('App\Grouprequest');
    }

    public function measures()
    {
        return $this->hasMany('App\Measure');
    }
}
