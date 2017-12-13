<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
    	'title', 'user_id', 'scanmodel_id', 'scan_id'
    ];

    public function scans()
    {
    	return $this->hasMany('App\Scan');
    }

    public function owner()
    {
        return $this->belongsTo('App\Scan', 'scan_id');
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

    public function districts()
    {
        return $this->belongsToMany('App\District');
    }
}
