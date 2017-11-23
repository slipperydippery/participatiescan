<?php

namespace participatiescan;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function themes()
    {
    	return $this->belongsTo('participatiescan\Theme');
    }
}
