<?php

namespace App\Http\Controllers;

use App\Scan;
use App\Scanmodel;
use App\Thememodel;
use App\Questionmodel;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome()
    {
    	$scanmodel = Scanmodel::with('themes.questions')->findOrFail(1);

    	return view('welcome', compact('scanmodel'));
    }
}
