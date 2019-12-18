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
               $address1= $request -> input('address_1');
               $address2 = $request -> input('address_2');
               $city=$request->input('city');
               $address_rent= $address1." ".$address2." ".$city;
               $start_date = $request ->input('start_date');
               $time = strtotime('10/16/2003');  //SETEADO HASTA QUE SE TOQUE FRONT
               $cli_id=$request -> input('cli_id');
//               $newformat = date('Y-m-d',$time);
               $end_date= $request -> input('pick_up_date');
//               $start_date = $newformat;
               $start_time= '15:25:22' ;  //SETEADO HASTA QUE SE TOQUE FRONT
//               $driver= $request-> input('driver');
               $driver= 'Marvin';
               $rental_cost = $request->input('rental_cost');
               $phone = $request -> input('phone');
               $email = $request -> input('email');
               $compa=$request->input('compa');

                $custom="";


//                $same= DB::table('rentas')->where('date','=',$start_date)->get();
//                echo $same;
//                 if(empty($same)){

                     $users = DB::table('clientes')->where('client_id', '=', $cli_id)->get();
                     if (empty($users)){
                         $custom='1';
                     }else{

                         foreach ($users as $post) {
                             $custom=$post->client_id;
                         }
                     }

                     if($custom==$cli_id){
//                         ---------------------------------------------------------------------------------------------------

//                         SI EL CLIENTE YA XISTE
                         $mach_id = DB::table('machinery')->select('id_machinery')->where('name', '=', $machinery)->get();

                         foreach ($mach_id as $post) {

                             $maquina_id = $post->id_machinery;
                         }

                         $value = DB::table('rentas')->insert(["hora_solicitada" =>$start_time,'cliente'=>$cli_id,"maquina"=>$maquina_id, "driver" => $driver, 'rental_cost'=>$rental_cost,'date'=>$start_date,'pick_up_date'=>$end_date,'delivery_site'=>$address_rent]);



                     }else{

//                         EL CLIENTE NO EXISTE Y SE AGREGA SU COMPAÑIA TAMBIEN

//                    $compa= DB::table('compañias')->insert(['Name'=>$compa]);

                         if (empty($compa)){

                             $cli= DB::table('clientes')->insert(["First_name"=>$first, 'Last_name'=>$last, 'Address' => $address_rent, 'Phone_num'=>$phone, 'email'=>$email, 'client_id'=>$cli_id]);

                         }else{

                             $id_fisrt_comp = DB::table('compañias')->insertGetId(['Name'=>$compa]);

                             $cli= DB::table('clientes')->insert(["First_name"=>$first, 'Last_name'=>$last, 'Address' => $address_rent, 'Phone_num'=>$phone, 'email'=>$email, 'id_comp'=>$id_fisrt_comp, 'client_id'=>$cli_id]);

                         }

//----------------------------------------------------------------------------------------------------------------------------------------------------
//                    Busqueda de maquinaria segun nombre

                         $mach_id = DB::table('machinery')->select('id_machinery')->where('name', '=', $machinery)->get();

                         foreach ($mach_id as $post) {

                             $maquina_id = $post->id_machinery;
                         }

                         $value = DB::table('rentas')->insert([]);
//---------------------------------------------------------------------------------------------------------------
//                          INSERCCION DE LA TABLA DISPONIBILIDADS

                         $id_renta_first = DB::table('rentas')->insertGetId(["hora_solicitada" =>$start_time,'cliente'=>$cli_id,"maquina"=>$maquina_id, "driver" => $driver, 'rental_cost'=>$rental_cost,'date'=>$start_date,'pick_up_date'=>$end_date,'delivery_site'=>$address_rent]);

                         $val_rent_disponible= DB::table('disponibilidads')->insert(["maquina"=>$maquina_id,"estado"=>1,'id_renta'=>$id_renta_first, 'date'=>$start_date]);
                     }

                     return redirect()->action('Calendar_Controller@index');

//                 }
//                 else{
//
//                     return redirect()->action('delivery_driver@index');
//
//                 }







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
