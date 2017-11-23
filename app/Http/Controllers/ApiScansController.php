<?php

namespace participatiescan\Http\Controllers;

use participatiescan\Scan;
use participatiescan\Theme;
use participatiescan\Scanmodel;
use Illuminate\Http\Request;

class ApiScansController extends Controller
{
	public function show(Scan $scan)
	{
		// return $scan->scanmodel->get();		
    	return Scanmodel::with('themes.questions')->findOrFail($scan->scanmodel->id)->get();
	}

	public function store(Request $request)
	{
		$scan = Scan::findOrFail($request->scan['id']);
		$scan->title = $request->scan['title'];
		$scan->description = $request->scan['description'];
		$scan->activequestion = $request->scan['activequestion'];
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
}