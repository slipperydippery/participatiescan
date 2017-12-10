<?php

namespace App\Http\Controllers;

use App\Scan;
use App\Group;
use App\Measure;
use App\District;
use App\Postcode;
use App\Scanmodel;
use App\Districtmodel;
use App\Instantiemodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districtmodels = Districtmodel::pluck('title', 'id');
        $instantiemodels = Instantiemodel::pluck('title', 'id');
        return view('group.create', compact('districtmodels', 'instantiemodels'));
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
        $group = new Group([
            'title' => $request->title,
            'user_id' => $user->id,
            'scan_id' => $scan->id,
            'scanmodel_id' => $request->scanmodel_id,
        ]);
        $group->save();
        $group->scans()->save($scan);


        $district = District::create([
            'group_id' => $group->id,
            'districtmodel_id' => $request->districtmodel_id,
        ]);

        $scanmodel = Scanmodel::findOrFail(1);
        foreach($scanmodel->themes as $theme) {
            foreach($theme->questions as $question) {
                Measure::create([
                    'group_id' => $group->id,
                    'question_id' => $question->id
                ]);
            }
        }

        $group->save();
        
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $group = Group::with('scans.user')->findOrFail($group->id);
        $districtmodels = Districtmodel::all();
        return view('group.show', compact('group', 'districtmodels'));
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
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('home');
    }
}
