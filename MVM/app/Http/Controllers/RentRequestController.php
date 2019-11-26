<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Renta;
use DB;

class RentRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return('Ese es un mensjae de el index de el request controller');
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
        if ($request->input('submit') != null ){

            // Update record
            if($request->input('editid') !=null ){
              $name = $request->input('name');
              $email = $request->input('email');
              $editid = $request->input('editid');

              if($name !='' && $email != ''){
                 $data = array('name'=>$name,"email"=>$email);

                 // Update
                 Renta::updateData($editid, $data);

                 Session::flash('message','Update successfully.');

              }

            }else{ // Insert record
               $first = $request->input('first_name');
               $last = $request->input('last_name');
               $machinery = $request->input('machinery');
               $client= $first+$last;
               if($first !='' && $last !='' && $machinery != ''){
                  $data = array('name'=>$first,"username"=>$last,"email"=>$machinery);


                  // Insert
                  $value = DB::table('rentas')->insert(['cliente'=>$client,"maquina"=>$machinery]);
                  if($value){
                    Session::flash('message','Insert successfully.');
                  }else{
                    Session::flash('message','Username already exists.');
                  }

               }
            }

          }
          return redirect()->action('RentRequestController@index',['id'=>0]);
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
