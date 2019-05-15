<?php

namespace App\Http\Controllers;

use App\Barangay;
use App\City;
use App\Province;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BarangayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangays = Barangay::all();
        return View::make('barangay.index')->with(compact('barangays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();
        $provinces = Province::all();
        $cities = City::all();
        return View::make('barangay.create')->with(compact('regions'))->with(compact('provinces'))->with(compact('cities'));
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
        Barangay::create([
            'city_id' => $data['city'],
            'description' => $data['description']
        ]);
        return redirect(route('barangay.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barangay  $barangay
     * @return \Illuminate\Http\Response
     */
    public function show($city_id)
    {
        $barangays = Barangay::all()->where('city_id','=',$city_id);
        return View::make('barangay.index')->with(compact('barangays'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barangay  $barangay
     * @return \Illuminate\Http\Response
     */
    public function edit(Barangay $barangay)
    {
        $regions = Region::all();
        $provinces = Province::all();
        $cities = City::all();
        return View::make('barangay.edit')->with(compact('barangay'))->with(compact('regions'))->with(compact('provinces'))->with(compact('cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barangay  $barangay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barangay $barangay)
    {
        $data = $request->all();
        $barangay->city_id = $data['city'];
        $barangay->description = $data['description'];
        $barangay->save();
        return redirect(route('barangay.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barangay  $barangay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barangay $barangay)
    {
        //
    }
}
