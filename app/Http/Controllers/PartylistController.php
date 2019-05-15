<?php

namespace App\Http\Controllers;

use App\Partylist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PartylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partylists = Partylist::all();
        return View::make('partylist.index')->with(compact('partylists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('partylist.create');
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
        Partylist::create([
            'name' => $data['name'],
            'image' => 'uploads/'.$image_new_name
        ]);
        return redirect(route('partylist.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partylist  $partylist
     * @return \Illuminate\Http\Response
     */
    public function show(Partylist $partylist)
    {
        return View::make('partylist.show')->with(compact('partylist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partylist  $partylist
     * @return \Illuminate\Http\Response
     */
    public function edit(Partylist $partylist)
    {
        return View::make('partylist.edit')->with(compact('partylist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partylist  $partylist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partylist $partylist)
    {
        $data = $request->all();
        $partylist->name = $data['name'];
        if($request->has('image')){
            $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/', $image_new_name);
        $partylist->image = 'uploads/'.$image_new_name;
        }
        $partylist->save();
        return redirect(route('partylist.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partylist  $partylist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partylist $partylist)
    {
        //
    }
}
