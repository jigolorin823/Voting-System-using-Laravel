<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;
use App\VoteDetail;
use App\Position;
use App\Electoral;
use App\Voter;
use App\Vote;
use App\year;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::all();
        $year = year::all()->where('status','==','1')->first();
        $year_id = $year->id;
        $electorals = Electoral::all()->where("year_id",'==',$year_id);
        $voters = Voter::all();
        $voted = Vote::join('vote_details', 'votes.id', '=', 'vote_details.vote_id')
                    ->join('electorals', 'electorals.id', '=', 'vote_details.electoral_id')
                    ->select('votes.id','votes.voter_id')
                    ->where('electorals.year_id','=',$year_id)
                    ->groupBy('votes.id')
                    ->get();
        return view('home')->with(compact('positions'))->with(compact('electorals'))->with(compact('voters'))->with(compact('voted'));
    }

    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }
    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }
    public function showResultsPage()
    {
        $positions = Position::all();
        $year = year::all()->where('status','==','1')->first();
        $year_id = $year->id;
        $electorals = Electoral::all()->where("year_id",'==',$year_id);
        $voters = Voter::all();
        $voted = Vote::join('vote_details', 'votes.id', '=', 'vote_details.vote_id')
                    ->join('electorals', 'electorals.id', '=', 'vote_details.electoral_id')
                    ->select('votes.id','votes.voter_id')
                    ->where('electorals.year_id','=',$year_id)
                    ->groupBy('votes.id')
                    ->get();
        return view('results')->with(compact('positions'))->with(compact('electorals'))->with(compact('voters'))->with(compact('voted'));
    }
}
