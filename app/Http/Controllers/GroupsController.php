<?php

namespace App\Http\Controllers;

use App\Scan;
use App\Group;
use App\Measure;
use App\District;
use App\Postcode;
use App\Scanmodel;
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
        $districts = District::pluck('title', 'id');
        $instantiemodels = Instantiemodel::pluck('title', 'id');
        return view('group.create', compact('districts', 'instantiemodels'));
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

 
        /**
         * Create something else here!!!
         */
        // $district = District::create([
        //     'group_id' => $group->id,
        //     'district_id' => $request->district_id,
        // ]);

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
        $districts = District::all();
        return view('group.show', compact('group', 'districts'));
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
