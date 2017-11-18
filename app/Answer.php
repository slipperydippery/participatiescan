<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
    	'user_id', 'scan_id', 'question_id'
    ];
}
