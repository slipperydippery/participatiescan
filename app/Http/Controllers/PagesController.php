<?php

namespace App\Http\Controllers;

use App\Scan;
use App\District;
use App\Scanmodel;
use App\Thememodel;
use App\Districtmodel;
use App\Questionmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function welcome()
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
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

    public function comparescans()
    {
        $user = Auth::user();
        $districtmodels = Districtmodel::get();
        return view ('compare.comparescans', compact('user', 'districtmodels'));
    }
}
