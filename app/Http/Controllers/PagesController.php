<?php

namespace participatiescan\Http\Controllers;

use participatiescan\Scan;
use participatiescan\Scanmodel;
use participatiescan\Thememodel;
use participatiescan\Questionmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function welcome()
    {
    	$scanmodel = Scanmodel::with('themes.questions')->findOrFail(1);

    	return view('welcome', compact('scanmodel'));
    }

    public function startscan()
    {
    	if(Auth::check()){
    		return redirect()->route('scan.index');
    	}
    	// Page with: log in / register
    	//               trial scan
    	return view('pages.startscan');
    }
}
