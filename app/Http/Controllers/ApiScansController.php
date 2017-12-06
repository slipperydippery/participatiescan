<?php

namespace App\Http\Controllers;

use App\Scan;
use App\Theme;
use App\Scanmodel;
use Illuminate\Http\Request;

class ApiScansController extends Controller
{
	public function show(Scan $scan)
	{
		// return $scan->scanmodel->get();		
    	// return Scanmodel::with('themes.questions')->findOrFail($scan->scanmodel->id)->get();

        return Scan::with('answers', 'group.scans.answers', 'group.scans.user', 'group.scans.instantie.instantiemodel', 'group.measures')->findOrFail($scan->id);
	}

	public function store(Request $request)
	{
		$scan = Scan::findOrFail($request->scan['id']);
		$scan->title = $request->scan['title'];
		$scan->description = $request->scan['description'];
        $scan->activequestion = $request->scan['activequestion'];
		$scan->activetheme = $request->scan['activetheme'];
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
