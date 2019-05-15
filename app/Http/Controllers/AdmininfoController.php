<?php

namespace App\Http\Controllers;

use App\admininfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Region;
use App\User;

class AdmininfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = admininfo::with('region','user')->get();
        return View::make('admininfo.index')->with(compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();
        // dd($regions);
        return View::make('admininfo.create')->with(compact('regions'));
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
        $cnt = admininfo::all();
        $strhold = "admin".(count($cnt)+1)."_".$data['region'];
        User::create([
            'name' => $strhold,
            'email' => $strhold.'@gmail.com',
            'role_id' => '2',
            'password' => bcrypt('password')
        ]);
        $idhold = User::all()->last();
        admininfo::create([
            'user_id' => $idhold->id,
            'region_id' => $data['region']
        ]);

        return redirect(route('admininfo.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\admininfo  $admininfo
     * @return \Illuminate\Http\Response
     */
    public function show(admininfo $admininfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\admininfo  $admininfo
     * @return \Illuminate\Http\Response
     */
    public function edit(admininfo $admininfo)
    {
        $regions = Region::all();
        return View::make('admininfo.edit')->with(compact('admininfo'))->with(compact('regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\admininfo  $admininfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $admin = admininfo::findOrFail($data["admin_id"]);
        
        $user = User::findOrFail($admin->user_id);
        if($user->status){
            $user->status = false;
        } else {
            $user->status = true;
        }
        $user->save();
        return redirect(route('admininfo.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\admininfo  $admininfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(admininfo $admininfo)
    {
        //
    }
}
