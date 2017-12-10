<?php

namespace App\Http\Controllers;

use App\Scan;
use App\Group;
use App\Answer;
use App\Measure;
use App\District;
use App\Question;
use App\Instantie;
use App\Scanmodel;
use App\Dashmessage;
use App\Grouprequest;
use App\Districtmodel;
use App\Instantiemodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scans = Auth::user()->scans;
        return view('scan.index', compact('scans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instantiemodels = Instantiemodel::pluck('title', 'id');
        $districtmodels = Districtmodel::pluck('title', 'id');
        $groups = Group::pluck('title', 'id');
        return view('scan.create', compact('instantiemodels', 'districtmodels', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $scan = Scan::register($user, $request->all());

        $grouprequest =  false;

        if($request->has('group_bool')) {
            $group = Group::findOrFail($request->group_id);
            $grouprequest = $group;
            //  send a message to group owner
            Grouprequest::create([
                'group_id' => $request->group_id,
                'scan_id' => $scan->id,
            ]);
        }

        return view('scan.postcreate', compact('scan', 'grouprequest'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Scan $scan)
    {
        $scan = Scan::with('answers')->findOrFail($scan->id);
        return view('scan.start', compact('scan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
