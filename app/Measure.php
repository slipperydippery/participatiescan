<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
	protected $fillable = [
		'measure', 'active', 'group_id', 'scan_id', 'question_id'
	];

    public function group()
    {
    	return $this->belongsTo('App\Group');
    }

    public function scan()
    {
    	return $this->belongsTo('App\Scan');
    }

    public function question()
    {
    	return $this->belongsTo('App\Question');
    }
}