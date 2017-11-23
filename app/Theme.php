<?php

namespace participatiescan;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public function questions()
    {
    	return $this->hasMany('participatiescan\Question');
    }

    public function scanmodels()
    {
    	return $this->belongsTo('participatiescan\Scanmodel');
    }
}
