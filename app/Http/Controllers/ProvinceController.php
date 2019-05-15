<?php

namespace App\Http\Controllers;

use App\Province;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        return View::make('province.index')->with(compact('provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();
        return View::make('province.create')->with(compact('regions'));
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
        Province::create([
            'region_id' => $data['region'],
            'description' => $data['description']
        ]);
        return redirect(route('province.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show($region_id)
    {
        $provinces = Province::all()->where('region_id','=',$region_id);
        return View::make('province.index')->with(compact('provinces'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province)
    {
        $regions = Region::all();
        return View::make('province.edit')->with(compact('province'))->with(compact('regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Province $province)
    {
        $data = $request->all();
        $province->region_id=$data['region'];
        $province->description=$data['description'];
        $province->save();
        return redirect(route('province.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        //
    }
}
