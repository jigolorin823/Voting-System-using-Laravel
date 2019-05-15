<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\admininfo;
use App\Person;
use App\Voter;
use App\Electoral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::with('person')->get();
        $admins = admininfo::with('user','region')->get();
        return View::make('candidate.index')->with(compact('candidates'))->with(compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $people = Person::with('name')->doesntHave('candidate')->get();
        return View::make('candidate.create')->with(compact('people'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Candidate::create([
            'person_id' => $data['person'],
            'ballot_name' => $data['ballot_name']
        ]);
        return redirect(route('candidate.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        $electorals = Electoral::all()->where('candidate_id','==',$candidate->id)->sortBy('year_id');
        return View::make('candidate.show')->with(compact('candidate'))->with(compact('electorals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        $people = Person::with('name')->get();
        return View::make('candidate.edit')->with(compact('candidate'))->with(compact('people'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        $data=$request->all();
        $candidate->person_id = $data['person'];
        $candidate->ballot_name = $data['ballot_name'];
        $candidate->save();
        return redirect(route('candidate.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
