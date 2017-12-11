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
		if(count(Scan::find(1))){
			return redirect()->route('scan.show', Scan::find(1));
		} else {
			$user = User::find(1);
			$attributes = [
				"title" => "Testscan",
				"description" => null,
				"instantiemodel_id" => "6",
				"districtmodel_id" => "1",
				"scanmodel_id" => "1",
				"activetheme" => "1",
				"activequestion" => "1"
			];
	        $scan = Scan::register($user, $attributes);
		}

		return redirect()->route('startscan');
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
        $scan = Scan::with('answers', 'user', 'instantie.instantiemodel', 'measures.users')->findOrFail($scan->id);
        return view('scan.show', compact('scan', 'scanmodel'));
    }

    public function showmeasures(Scan $scan)
    {
        $scanmodel = $scan->scanmodel->with('themes.questions')->first();
        $scan = Scan::with('user', 'measures.users')->findOrFail($scan->id);
        return view('scan.measures', compact('scan', 'scanmodel'));
    }
}
