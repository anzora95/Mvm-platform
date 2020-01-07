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
        $next=date("Y-m-d",strtotime($today.' +1 day'));
        $previous=date("Y-m-d",strtotime($today.' -1 day'));
        $re=Renta::with('clientes')->get();
//        $re= DB::table('rentals')->get();
        $machi= DB::table('machineries')->get();
        $condi_rents = DB::table('rentals')->where('dispatch_date','like','%2020-01%')->get();  // PARA CONDICIONARLO A LAS RENTAS

        if ($re){

            return View('DispachCenter.document_contract')->with('like',$re);

        }

        $rents_today=array();
        foreach ($condi_rents as $rent){

            if ($today < $rent ->dispatch_date ){

            }elseif($today >= $rent->dispatch_date and $today <= $rent->pick_up_date){

                array_push($rents_today,$rent->machine);


            }

            else{




            }
        }

        $no_rents_today=array();
        foreach ($machi as $maquin){

            if (in_array($maquin->id_machine,$rents_today)){

//                array_push($no_rents_today );

            }else{
                array_push($no_rents_today, $maquin->id_machine);

            }



        }
//        return View('DispachCenter.document_contract')->with('like',$rents_today);
//        return View('MachineryAvailability.AvailabilityCalendar')->with('rentas',$re)->with('machin', $machi)->with('today',$today)->with('today_f', $today_format)->with('inyard',$no_rents_today)->with('out',$rents_today)->with('next',$next)->with('previous',$previous);


        return View('DispachCenter.dispatch_center')->with('today',$today)->with('today_format',$today_format)->with('next',$next)->with('previous',$previous)->with('machi',$machi)->with('out',$rents_today)->with('rentals',$re);

    }

    public function getAjax ($date_incoming){

        $today=date("Y-m-d",strtotime($date_incoming));
        $next=date("Y-m-d",strtotime($date_incoming.' +1 day'));
        $previous=date("Y-m-d",strtotime($date_incoming.' -1 day'));
        $today_format=date('l dS F Y ',strtotime($today));
        $re=Renta::with('clients')->get();
        $machi= DB::table('machineries')->get();
        $condi_rents = DB::table('rentals')->where('dispatch_date','like','%2020-01%')->get();  // PARA CONDICIONARLO A LAS RENTAS


        $rents_today=array();

        foreach ($condi_rents as $rent){

            if ($today < $rent ->date ){
//                hoy no esta en esta renta

            }elseif($today >= $rent->date and $today <= $rent->pick_up_date){

                array_push($rents_today,$rent->maquina);


            }

            else{




            }
        }

        $no_rents_today=array();
        foreach ($machi as $maquin){

            if (in_array($maquin->id_machinery,$rents_today)){



            }else{
                array_push($no_rents_today, $maquin->id_machinery);

            }



        }
//        return View('DispachCenter.document_contract')->with('like',$rents_today);
        return View('MachineryAvailability.AvailabilityCalendar')->with('rentas',$re)->with('machin', $machi)->with('today',$today)->with('today_f', $today_format)->with('inyard',$no_rents_today)->with('out',$rents_today)->with('next',$next)->with('previous',$previous);
//

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
