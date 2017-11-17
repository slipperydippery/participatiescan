<?php

namespace App\Http\Controllers;

use App\Scan;
use App\Instantie;
use App\Instantiemodel;
use Illuminate\Http\Request;

class ScansController extends Controller
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
        $instantiemodels = Instantiemodel::pluck('title', 'id');
        return view('scan.create', compact('instantiemodels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \Auth::user();

        $scan = Scan::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $user->id,
            'scanmodel_id' => $request->scanmodel_id,
        ]);

        $instantie = Instantie::create([
            'user_id' => $user->id,
            'scan_id' => $scan->id,
            'instantiemodel_id' => $request->instantiemodel_id,
        ]);

        return $scan;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
