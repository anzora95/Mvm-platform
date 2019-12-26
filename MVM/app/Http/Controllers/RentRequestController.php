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

               $full = ucwords($request->input('full_name'));
               $machinery = $request->input('machinery');
               $address1= $request -> input('address_1');
               $address2 = $request -> input('address_2');
               $city=$request->input('city');
               $address_rent= $request->input('address_1');
               $start_date=date("Y-m-d",strtotime($request->input('start_date')));
               $time = strtotime('10/16/2003');  //SETEADO HASTA QUE SE TOQUE FRONT
               $cli_id=$request -> input('cli_id');
               $end_date=date("Y-m-d",strtotime($request->input('pick_up_date')));
               $start_time= '15:25:22' ;  //SETEADO HASTA QUE SE TOQUE FRONT
               $driver= 'Marvin';
               $rental_cost = 300;
               $phone = $request -> input('phone');
               $email = $request -> input('email');
               $compa=$request->input('compa');

                $custom="";



//                     $users = DB::table('clientes')->where('Full_name', '=', $full)->get();
//                     if (empty($users)){

                         //                         EL CLIENTE NO EXISTE Y SE AGREGA SU COMPAÑIA TAMBIEN

                         if (empty($compa)){

//                             SI LA COMPAÑIA NO SE PONE EN EL FORMULARIO QUE LA GUARDE COMO UN CAMPO NULO

                             $id_fisrt_client = DB::table('clientes')->insertGetId(["Full_name"=>$full, 'Address' => $address_rent, 'Phone_num'=>$phone, 'email'=>$email]);

                         }else{
//                             SI LA COMPAÑIA YA ESTA EN LA BASE DE DATOS QUE SOLO BUSQUE Y SAQUE EL ID

                             $compañia = DB::table('compañias')->where('Name', '=', $compa)->exists();


//                             if(empty($compañia)){

                                 $id_fisrt_comp = DB::table('compañias')->insertGetId(['Name'=>$compa]);


                                 $id_fisrt_client = DB::table('clientes')->insertGetId(["Full_name"=>$full, 'Address' => $address_rent, 'Phone_num'=>$phone, 'email'=>$email, 'id_comp'=>$id_fisrt_comp]);

//                             }
//
//                             else{
//
//                                 foreach ($compañia as $com) {
//                                     $com_id=$com->id_comp;
//                                 }
//
//
//                                 $id_fisrt_client = DB::table('clientes')->insertGetId(["Full_name"=>$full, 'Address' => $address_rent, 'Phone_num'=>$phone, 'email'=>$email, 'id_comp'=>$com_id]);
//
//
//                             }


                         }

//----------------------------------------------------------------------------------------------------------------------------------------------------
//                    Busqueda de maquinaria segun nombre

                         $mach_id = DB::table('machinery')->select('id_machinery')->where('name', '=', $machinery)->get();

                         foreach ($mach_id as $post) {

                             $maquina_id = $post->id_machinery;
                         }

//---------------------------------------------------------------------------------------------------------------
//                          INSERCCION DE LA TABLA DISPONIBILIDADS

//                         $id_renta_first = DB::table('rentas')->insertGetId(["hora_solicitada" =>$start_time,"maquina"=>$maquina_id, "driver" => $driver, 'rental_cost'=>$rental_cost,'date'=>$start_date,'pick_up_date'=>$end_date,'delivery_site'=>$address_rent,'cliente'=> $id_fisrt_client]);
//
//                         $val_rent_disponible= DB::table('disponibilidads')->insert(["maquina"=>$maquina_id,"estado"=>1,'id_renta'=>$id_renta_first, 'date'=>$start_date, 'pickup_date'=>$end_date]);


//                     }else{

//                         SI EL CLIENTE YA EXISTE

                         $mach_id = DB::table('machinery')->select('id_machinery')->where('name', '=', $machinery)->get();

                         foreach ($mach_id as $post) {

                             $maquina_id = $post->id_machinery;
                         }

                         $user2 = DB::table('clientes')->where('Full_name', '=', $full)->get();

                         foreach ($user2 as $us) {

                             $user3 = $us->client_id;
                         }

                         $id_renta_first = DB::table('rentas')->insertGetId(["hora_solicitada" =>$start_time,"maquina"=>$maquina_id, "driver" => $driver, 'rental_cost'=>$rental_cost,'date'=>$start_date,'pick_up_date'=>$end_date,'delivery_site'=>$address_rent,'cliente'=> $user3]);
                         $val_rent_disponible= DB::table('disponibilidads')->insert(["maquina"=>$maquina_id,"estado"=>1,'id_renta'=>$id_renta_first, 'date'=>$start_date, 'pickup_date'=>$end_date]);

//                     }

                     return redirect()->action('Calendar_Controller@index');


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
