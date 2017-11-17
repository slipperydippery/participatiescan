<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scan extends Model
{
    protected $fillable = [
        'title', 'description', 'user_id', 'scanmodel_id'
    ];
}
