<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scan extends Model
{
    protected $fillable = [
        'title', 'description', 'user_id', 'scanmodel_id', 'activetheme', 'activequestion'
    ];

    public function scanmodel()
    {
    	return $this->belongsTo('App\Scanmodel');
    }

    public function answers()
    {
    	return $this->hasMany('App\Answer');
    }

    public function group()
    {
    	return $this->belongsTo('App\Group');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function grouprequest()
    {
    	return $this->hasOne('App\Grouprequest');
    }

    public function instantie()
    {
    	return $this->hasOne('App\Instantie');
    }

    public function measures()
    {
        return $this->hasMany('App\Measure');
    }
}
