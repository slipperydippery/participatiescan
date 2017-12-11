<?php

namespace App\Http\Controllers;

use App\Scan;
use App\User;
use App\Group;
use App\District;
use App\Districtmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return $user->groups;
    }

    public function indexusers(Group $group)
    {
        $users = [];
        foreach($group->scans as $scan) {
            array_push($users, $scan->user);
        }
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return Group::with('scans.user', 'scans.answers', 'scans.instantie.instantiemodel', 'measures.users', 'district.districtmodel', 'owner')->where('id', $group->id)->get()->first();
    }

    public function getdistrict(Group $group)
    {
        return District::with('districtmodel')->where('group_id', '=', $group->id)->first();
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
    public function update(Request $request, Group $group)
    {
        $group->title = $request->group['title'];
        $group->save();
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

    public function removescan(Group $group, Scan $scan)
    {
        $scan->group()->dissociate();
        $scan->save();
        return $group;
    }
}
