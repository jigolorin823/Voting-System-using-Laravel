<?php

namespace App\Http\Controllers;

use App\Electoral;
use App\Position;
use App\Partylist;
use App\Candidate;
use App\admininfo;
use App\year;
use App\VoteDetail;
use App\Region;
use App\Province;
use App\City;
use App\Barangay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ElectoralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $electorals = Electoral::with('candidate','position','partylist','votes')->get();
        $admins = admininfo::with('user','region')->get();
        $positions = Position::all();
        $year = year::all()->where('status','==','1')->first();
        return View::make('electoral.index')->with(compact('electorals'))->with(compact('admins'))->with(compact('positions'))->with(compact('year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $positions = Position::all();
        $partylists = Partylist::all();
        $year = year::all()->where('status','==','1')->first();
        $id = $year->id;
        $candidates = Candidate::whereDoesntHave('electoral', function ($query) use ($id){
            $query->where('year_id', $id);
        })->get();
        return View::make('electoral.create')->with(compact('candidates'))->with(compact('positions'))->with(compact('partylists'))->with(compact('year'));
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
        Electoral::create([
            'candidate_id' => $data['cand'],
            'position_id' => $data['position'],
            'partylist_id' => $data['partylist'],
            'year_id' => $data['year'],
            'status' => 'Active',
        ]);
        return redirect(route('electoral.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Electoral  $electoral
     * @return \Illuminate\Http\Response
     */
    public function show(Electoral $electoral)
    {
        return View::make('electoral.show')->with(compact('electoral'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Electoral  $electoral
     * @return \Illuminate\Http\Response
     */
    public function edit(Electoral $electoral)
    {
        $candidates = Candidate::with('person')->get();
        $positions = Position::all();
        $partylists = Partylist::all();
        return View::make('electoral.edit')->with(compact('electoral'))->with(compact('candidates'))->with(compact('positions'))->with(compact('partylists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Electoral  $electoral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Electoral $electoral)
    {
        $data=$request->all();
        $electoral->candidate_id=$data['person'];
        $electoral->position_id=$data['position'];
        $electoral->partylist_id=$data['partylist'];
        $electoral->year=$data['year'];
        $electoral->save();
        return redirect(route('electoral.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Electoral  $electoral
     * @return \Illuminate\Http\Response
     */
    public function destroy(Electoral $electoral)
    {
        //
    }
    public function resultsPerRegion($id)
    {
        $electoral = Electoral::findOrFail($id);
        $year = year::all()->where('status','==','1')->first();
        $year_id = $year->id;
        $votes = VoteDetail::with('vote')->get();
        $regions = Region::all();
        return View::make('results.region')->with(compact('electoral'))->with(compact('votes'))->with(compact('year_id'))->with(compact('regions'));
    }
    public function resultsPerProvince($id, $region_id)
    {
        $electoral = Electoral::findOrFail($id);
        $year = year::all()->where('status','==','1')->first();
        $year_id = $year->id;
        $votes = VoteDetail::with('vote')->get();
        $provinces = Province::all()->where('region_id','==',$region_id);
        return View::make('results.province')->with(compact('electoral'))->with(compact('votes'))->with(compact('year_id'))->with(compact('provinces'));
    }
    public function resultsPerCity($id, $province_id)
    {
        $electoral = Electoral::findOrFail($id);
        $year = year::all()->where('status','==','1')->first();
        $year_id = $year->id;
        $votes = VoteDetail::with('vote')->get();
        $cities = City::all()->where('province_id','==',$province_id);
        return View::make('results.city')->with(compact('electoral'))->with(compact('votes'))->with(compact('year_id'))->with(compact('cities'));
    }
    public function resultsPerBarangay($id, $city_id)
    {
        $electoral = Electoral::findOrFail($id);
        $year = year::all()->where('status','==','1')->first();
        $year_id = $year->id;
        $votes = VoteDetail::with('vote')->get();
        $barangays = Barangay::all()->where('city_id','==',$city_id);
        return View::make('results.barangay')->with(compact('electoral'))->with(compact('votes'))->with(compact('year_id'))->with(compact('barangays'));
    }
}
