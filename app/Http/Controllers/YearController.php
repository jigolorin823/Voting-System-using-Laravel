<?php

namespace App\Http\Controllers;

use App\year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = year::all();
        return View::make('year.index')->with(compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('year.create');
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
        $years = year::all();
        foreach($years as $year){
            $year->status = false;
            $year->save();
        }
        year::create([
            'year' => $data['year']
        ]);
        return redirect(route('year.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\year  $year
     * @return \Illuminate\Http\Response
     */
    public function show(year $year)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\year  $year
     * @return \Illuminate\Http\Response
     */
    public function edit(year $year)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\year  $year
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, year $year)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\year  $year
     * @return \Illuminate\Http\Response
     */
    public function destroy(year $year)
    {
        //
    }
}
