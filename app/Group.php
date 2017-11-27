<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
    	'title', 'user_id', 'scanmodel_id', 'postcode_id'
    ];
}
