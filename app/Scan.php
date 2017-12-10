<?php

namespace App;

use App\Scan;
use App\User;
use App\Answer;
use App\Measure;
use App\District;
use App\Instantie;
use App\Scanmodel;
use Illuminate\Database\Eloquent\Model;

class Scan extends Model
{
    protected $fillable = [
        'title', 'description', 'user_id', 'scanmodel_id'
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

    public function owns()
    {
        return $this->hasOne('App\Group');
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

    public function district()
    {
        return $this->hasOne('App\District');
    }

    public function compares()
    {
        return $this->belongsToMany('App\Scan', 'compare_scan', 'compare_id', 'scan_id');
    }

    public static function register(User $user, $attributes)
    {
        $scan = new Scan($attributes);
        $user->scans()->save($scan);

        $instantie = Instantie::create([
            'scan_id' => $scan->id,
            'instantiemodel_id' => $attributes['instantiemodel_id'],
        ]);

        $district = District::create([
            'scan_id' => $scan->id,
            'districtmodel_id' => $attributes['districtmodel_id'],
        ]);

        $scanmodel = Scanmodel::findOrFail($attributes['scanmodel_id']);
        foreach($scanmodel->themes as $theme) {
            foreach($theme->questions as $question) {
                Answer::create([
                    'scan_id' => $scan->id,
                    'question_id' => $question->id
                ]);
                Measure::create([
                    'scan_id' => $scan->id,
                    'question_id' => $question->id
                ]);
            }
        }
        return $scan;
    }
}
