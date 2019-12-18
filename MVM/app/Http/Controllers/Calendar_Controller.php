<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Renta;
use App\Machinery;
use Illuminate\View\View;
use DB;

class Calendar_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today_format=date('l dS F Y ');
        $today=date("Y-m-d");
        $re=Renta::with('clientes')->get();
        $machi= DB::table('machinery')->get();
        $dispo = DB::table('disponibilidads')->get();
        return View('MachineryAvailability.AvailabilityCalendar')->with('rentas',$re)->with('machin', $machi)->with('today',$today)->with('today_f', $today_format)->with('dispo',$dispo);
    }

    public function getAjax (){

        $id= $_GET['date'];



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
