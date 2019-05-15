<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Vote;
use App\Voter;
use App\Position;
use App\Electoral;
use App\VoteDetail;
use App\year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class VoteController extends Controller
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
        $positions = Position::all();
        $year = year::all()->where('status','==','1')->first();
        $electorals = Electoral::all()->where("year_id",'==',$year->id);
        return View::make('vote.create')->with(compact('positions'))->with(compact('electorals'));
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
        
        $count;
        $test;
        if(array_key_exists("Senator",$data)){
            $bool = true;
        }
        $date = Carbon::today()->toDateString();
        Vote::create([
            'voter_id' => $data['voter_id'],
            'date' => $date
        ]);
        $last = Vote::all()->last()->id;
        $positions = Position::all();
        foreach($positions as $position){
            if(array_key_exists($position->description,$data)){
                $count = count($data[$position->description]);
                for($x=0;$x<$count;$x++){
                    VoteDetail::create([
                        'vote_id' => $last,
                        'electoral_id' => $data[$position->description][$x]
                    ]);
                }
            }
        }
        $voter = Voter::findOrFail($data["voter_id"]);
        $voter->voted=true;
        $voter->save();
        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote)
    {
        //
    }
}
