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
    	return Scanmodel::with('themes.questions')->findOrFail($scan->scanmodel->id)->get();
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
}
