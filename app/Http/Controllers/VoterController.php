<?php

namespace App\Http\Controllers;

use App\Voter;
use App\Gender;
use App\Region;
use App\Province;
use App\City;
use App\Barangay;
use App\CivilStatus;
use App\Name;
use App\Person;
use App\User;
use App\admininfo;
use App\year;
use App\Vote;
use App\VoteDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class VoterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voters = Voter::with('user','person')->get();
        $admins = admininfo::with('user','region')->get();
        return View::make('voter.index')->with(compact('voters'))->with(compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = Gender::all();
        $regions = Region::all();
        $provinces = Province::all();
        $cities = City::all();
        $barangays = Barangay::all();
        $civilstatuses = CivilStatus::all();
        return View::make('voter.create')->with(compact('genders'))->with(compact('regions'))->with(compact('provinces'))
        ->with(compact('cities'))->with(compact('barangays'))->with(compact('civilstatuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/', $image_new_name);
        $data = $request->all();
        Name::create([
            'fname' => $data['fname'],
            'mname' => $data['mname'],
            'lname' => $data['lname']
        ]);
        $last = Name::all()->last()->id;
        Person::create([
            'name_id' => $last,
            'barangay_id' => $data['brgy'],
            'gender_id' => $data['gender'],
            'civil_status_id' => $data['civil_status'],
            'house_street' => $data['strt'],
            'date_birth' => $data['birthdate'],
            'occupation' => $data['occup'],
            'image' => 'uploads/'.$image_new_name
        ]);
        $lastp = Person::all()->last()->id;
        $strhold = $data['lname'].$data['voter_id'];
        User::create([
            'name' => $strhold,
            'email' => $strhold.'@gmail.com',
            'role_id' => '3',
            'password' => bcrypt($strhold)
        ]);
        $lastu = User::all()->last()->id;
        Voter::create([
            'user_id' => $lastu,
            'person_id' => $lastp,
            'voter_id' => $data['voter_id'],
            'status' => 'Active',
            'voted' => '0'
        ]);

        return redirect(route('voter.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function show(Voter $voter)
    {
        $votes = Vote::all()->where('voter_id','==',$voter->id);
        $votedetails = VoteDetail::all();
        $years = year::all();
        return View::make('voter.show')->with(compact('voter'))->with(compact('votes'))->with(compact('votedetails'))->with(compact('years'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function edit(Voter $voter)
    {
        $genders = Gender::all();
        $regions = Region::all();
        $provinces = Province::all();
        $cities = City::all();
        $barangays = Barangay::all();
        $civilstatuses = CivilStatus::all();
        return View::make('voter.edit')->with(compact('voter'))->with(compact('genders'))->with(compact('regions'))->with(compact('provinces'))
        ->with(compact('cities'))->with(compact('barangays'))->with(compact('civilstatuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voter $voter)
    {
        $data = $request->all();
        $person = Person::findOrFail($voter->person_id);
        $name = Name::findOrFail($person->name_id);
        $name->fName = $data['fname'];
        $name->mName = $data['mname'];
        $name->lName = $data['lname'];
        $person->gender_id = $data['gender'];
        $person->date_birth = $data['birthdate'];
        $person->barangay_id = $data['brgy'];
        $person->house_street = $data['strt'];
        $person->civil_status_id = $data['civil_status'];
        $person->occupation = $data['occup'];
        if($request->has('image')){
            $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/', $image_new_name);
        $person->image = 'uploads/'.$image_new_name;
        }
        $person->save();
        $voter->voter_id = $data['voter_id'];
        $voter->save();
        return redirect(route('voter.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voter $voter)
    {
        //
    }
    public function startVoting()
    {
        $voters = Voter::all();
        foreach($voters as $voter){
            $voter->voted = false;
            $voter->save();
        }
        $users = User::all()->where('role_id','==','3');
        
        foreach($users as $user){
            $user->status = true;
            $user->save();
        }
        return redirect(route('voter.index'));
    }
    public function endVoting()
    {
        $users = User::all()->where('role_id','==','3');
        
        foreach($users as $user){
            $user->status = false;
            $user->save();
        }
        return redirect(route('voter.index'));
    }
}
