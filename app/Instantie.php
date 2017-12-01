<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instantie extends Model
{
    protected $fillable = [
    	'user_id', 'instantiemodel_id', 'scan_id'
    ];

    public function instantiemodel()
    {
    	return $this->belongsTo('App\instantiemodel');
    }
}
