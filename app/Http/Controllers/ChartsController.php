<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;

class ChartsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $bmrResult = $request->cal_input;
        var_dump($bmrResult);
       $lava = new Lavacharts;
        $reasons = $lava->DataTable();
        $reasons->addStringColumn('Reasons')
                ->addNumberColumn('Percent')
                ->addRow(['Check Reviews', 5])
                ->addRow(['Watch Trailers', 2])
                ->addRow(['See Actors Other Work', 4])
                ->addRow(['Settle Argument', 89]);
        $pieChart = $lava->PieChart('IMDB', $reasons, [
            'title' => 'Reasons I visit IMDB',
            'is3D' => true,
            'slices' => [
                    ['offset' => 0.2],
                    ['offset' => 0.25],
                    ['offset' => 0.3]
            ]
        ]);

        return view('layouts.charts', ['lava' => $lava]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
