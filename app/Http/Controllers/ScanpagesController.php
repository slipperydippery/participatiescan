<?php

namespace App\Http\Controllers;

use App\Scan;
use App\Scanmodel;
use Illuminate\Http\Request;

class ScanpagesController extends Controller
{
    public function kennismaken(Scan $scan)
    {
    	if(count($scan->group)) {
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
        $scan = Scan::with('answers', 'user', 'instantie.instantiemodel', 'measures')->findOrFail($scan->id);
        return view('scan.show', compact('scan', 'scanmodel'));
    }
}