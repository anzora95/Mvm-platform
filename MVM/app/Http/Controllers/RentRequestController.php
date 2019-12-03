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

               $first = $request->input('first_name');
               $last = $request->input('last_name');
               $machinery = $request->input('machinery');
               $client= $first.$last;
               $attachment = $request->input('attachment');
               $address1= $request -> input('address_1');
               $address2 = $request -> input('address_2');
               $address_cli= $address1." ".$address2;
               $city=$request->input('city');
               $state = $request ->input('state');
//               $start_date = $request ->input('start_date');
               $time = strtotime('10/16/2003');  //SETEADO HASTA QUE SE TOQUE FRONT
               $cli_id=$request -> input('cli_id');
               $newformat = date('Y-m-d',$time);
               $end_date= $request -> input('end_date');
               $start_date = $newformat;
               $start_time= '15:25:22' ;  //SETEADO HASTA QUE SE TOQUE FRONT
               $driver= $request-> input('driver');
               $duracion= 4; //SE RESTARA FECHA DE PICKUP DE LA DE ENTREGA
               $rental_cost = $request->input('rental_cost');
               $phone = $request -> input('phone');
               $email = $request -> input('email');

                $custom="";

                $users = DB::table('clientes')->where('client_id', '=', $cli_id)->get();
                if (empty($users)){
                    $custom='1';
                }else{

                    foreach ($users as $post) {
                        $custom=$post->client_id;
                    }
                }


                if($custom==$cli_id){

                    $value = DB::table('rentas')->insert(["hora_solicitada" =>$start_time,'cliente'=>$cli_id,"maquina"=>$machinery,  "fecha" => $start_date, "driver" => $driver, "duracion"=>$duracion, 'rental_cost'=>$rental_cost]);

                }else{
//                    $value = DB::table('rentas')->insert(["hora_solicitada" =>$start_time,'cliente'=>$cli_id,"maquina"=>$machinery,  "fecha" => $start_date, "driver" => $driver, "duracion"=>$duracion, 'rental_cost'=>$rental_cost]);

                    $cli= DB::table('clientes')->insert(["First_name"=>$first, 'Last_name'=>$last, 'Address' => $address_cli, 'Phone_num'=>$phone, 'email'=>$email, 'id_comp'=>2, 'client_id'=>$cli_id]);

                }


                return redirect()->action('delivery_driver@index');

//               }



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
