<?php

namespace App\Http\Controllers;

use App\City;
use App\Region;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return View::make('city.index')->with(compact('cities'));
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
        return View::make('city.create')->with(compact('regions'))->with(compact('provinces'));
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
        City::create([
            'province_id' => $data['prov'],
            'description' => $data['description']
        ]);
        return redirect(route('city.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show($province_id)
    {
        $cities = City::all()->where('province_id','=',$province_id);
        return View::make('city.index')->with(compact('cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $regions = Region::all();
        $provinces = Province::all();
        return View::make('city.edit')->with(compact('city'))->with(compact('regions'))->with(compact('provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $data = $request->all();
        $city->province_id = $data['prov'];
        $city->description = $data['description'];
        $city->save();
        return redirect(route('city.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
}
