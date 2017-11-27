<?php

namespace App\Http\Controllers;

use App\Scan;
use App\Scanmodel;
use App\Thememodel;
use App\Questionmodel;
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
