<?php

namespace App\Http\Controllers;

use App\Scan;
use App\Group;
use App\Answer;
use App\Question;
use App\Instantie;
use App\Scanmodel;
use App\Dashmessage;
use App\Grouprequest;
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
        $groups = Group::pluck('title', 'id');
        return view('scan.create', compact('instantiemodels', 'groups'));
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

        $scan = Scan::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $user->id,
            'scanmodel_id' => $request->scanmodel_id,
            'activetheme' => 1,
            'activequestion' => 0,
        ]);

        $instantie = Instantie::create([
            'user_id' => $user->id,
            'scan_id' => $scan->id,
            'instantiemodel_id' => $request->instantiemodel_id,
        ]);

        $scanmodel = Scanmodel::findOrFail($request->scanmodel_id);
        foreach($scanmodel->themes as $theme) {
            foreach($theme->questions as $question) {
                Answer::create([
                    'user_id' => $user->id,
                    'scan_id' => $scan->id,
                    'question_id' => $question->id
                ]);
            }
        }

        $grouprequest =  false;

        if($request->has('group_bool')) {
            $group = Group::findOrFail($request->group_id);
            $grouprequest = $group;
            //  send a message to group owner
            Grouprequest::create([
                'group_id' => $request->group_id,
                'scan_id' => $scan->id,
            ]);
            Dashmessage::create([
                'message' => '<a href="group/' . $group->id . '">' . $user->name . ' wil graag meedoen met de groep <i>' . $group->title . '</i></a>',
                'user_id' => $group->user_id,
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
