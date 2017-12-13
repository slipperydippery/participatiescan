<?php

namespace App\Http\Controllers;

use App\Scan;
use App\User;
use App\Theme;
use App\Scanmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiScansController extends Controller
{
    public function index()
    {
        return Scan::with('user', 'answers', 'instantie.instantiemodel', 'district.districtmodel')->get();
    }

    public function indexuser(User $user)
    {
        return Scan::with('compares.user', 'compares.answers', 'compares.instantie.instantiemodel', 'compares.district.districtmodel')->where('user_id', $user->id)->get();
    }

	public function show(Scan $scan)
	{
        return Scan::with('answers', 'user', 'instantie.instantiemodel', 'measures')->findOrFail($scan->id);
	}

    public function store(Request $request)
    {
        return $request;
    }

	public function update(Request $request)
	{
		$scan = Scan::findOrFail($request->scan['id']);
		$scan->title = $request->scan['title'];
		$scan->description = $request->scan['description'];
        $scan->algemeenbeeld = $request->scan['algemeenbeeld'];
		$scan->group_id = $request->scan['group_id'];
		$scan->save();
		return $request;	
	}

    public function indexthemes(Scan $scan)
    {
    	return $scan->scanmodel->themes->with('questions')->get();
    }

    public function indexquestions(Scan $scan, Theme $theme)
    {
    	return $theme->questions;
    }

    public function indexanswers(Scan $scan)
    {
    	return $scan->answers;
    }

    public function storewithanswers(Request $request, Scan $scan)
    {
    	// foreach($request->body as $answer){
    	// 	return $answer;
    	// }
    	return $request->body->answers;
    	return $request->body;
    }

    public function postanswer(Request $request, Scan $scan)
    {
    	return $request;
    }

    public function getuser(Scan $scan)
    {
    	return $scan->user->get();
    }

}
