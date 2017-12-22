<?php

namespace App\Http\Controllers;

use App\Scan;
use App\User;
use App\Scanmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScanpagesController extends Controller
{
	public function loggless()
	{
		if(Scan::find(1)){
			return redirect()->route('scan.show', Scan::find(1));
		} else {
			$user = User::find(1);
			$attributes = [
				"title" => "Testscan",
				"description" => null,
				"instantie_id" => "6",
				"districts" => [],
				"scanmodel_id" => "1",
				"activetheme" => "1",
				"activequestion" => "1"
			];
	        $scan = Scan::register($user, $attributes);
		}

        return redirect()->route('scan.show', Scan::find(1));
	}

    public function startscan(Scan $scan)
    {
        $scan = Scan::with('answers')->findOrFail($scan->id);
        
        return view('scan.start', compact('scan'));
    }

    public function kennismaken(Scan $scan)
    {
    	if(Auth::check() && count($scan->group)) {
    		return view('scan.kennismaken', compact('scan'));
    	} else {
    		return redirect()->route('scan.regioincijfers', $scan);
    	}
    }

    public function regioincijfers (Scan $scan)
    {
    	return view('scan.regioincijfers', compact('scan'));
    }

    public function algemeenbeeld(Scan $scan)
    {
    	return view('scan.algemeenbeeld', compact('scan'));
    }

    public function algemeenbeeldresultaten(Scan $scan)
    {
        return view('scan.algemeenbeeldresultaten', compact('scan'));
    }

    public function showscan(Scan $scan)
    {
        $scanmodel = $scan->scanmodel->with('themes.questions')->first();
        $scan = Scan::with('answers', 'user', 'instantie', 'measures.users')->findOrFail($scan->id);
        return view('scan.show', compact('scan', 'scanmodel'));
    }

    public function showmeasures(Scan $scan)
    {
        $scanmodel = $scan->scanmodel->with('themes.questions')->first();
        $scan = Scan::with('user', 'measures.users')->findOrFail($scan->id);
        return view('scan.measures', compact('scan', 'scanmodel'));
    }

    public function scancomplete(Scan $scan)
    {
        return view('scan.complete', compact('scan'));
    }

    public function results(Scan $scan)
    {
        $scanmodel = $scan->scanmodel->with('themes.questions')->first();
        $scan = Scan::with('answers', 'user', 'instantie', 'measures.users')->findOrFail($scan->id);
        return view('scan.results', compact('scan', 'scanmodel'));
    }
}
