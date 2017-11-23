<?php

namespace participatiescan\Http\Controllers;

use participatiescan\Scan;
use participatiescan\Answer;
use participatiescan\Question;
use participatiescan\Instantie;
use participatiescan\Scanmodel;
use participatiescan\Instantiemodel;
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

        return redirect()->route('scan.show', $scan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Scan $scan)
    {
        $scanmodel = $scan->scanmodel->with('themes.questions')->first();
        $scan = Scan::with('answers')->findOrFail($scan->id);
        return view('scan.show', compact('scan', 'scanmodel'));
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
