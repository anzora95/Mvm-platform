<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Renta;
use DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Else_;

class RentRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machi= DB::table('machineries')->get();
        return View('DispachCenter.new_dispatch')->with('equip', $machi);

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
               $note=$request->input('note');
               $like_valid=date("Y-m",strtotime($request->input('start_date')));
                if (empty($request->input('note'))){
                    
                    $note='No notes';

                         }

//        $quer=array($filter);
//        $res=explode("}", $quer[0]);
//        array_pop($res);

//               FOR EACH DE TRANSFORMACION A ARREGLO DE OBJETOS
//
//               foreach ($filter as $fi)
//               {
//                   $quer=array();
//                   array_push($quer, $fi);
//               }
//        parse_str($filter,$resu);

//         $fin=array();
//
//
//        for ($i = 0; $i <= count($res)-1; $i++) {
//            $row=list($id_m, $maquina,$estado,$id_renta,$date,$pickup_date)=explode(",", $res[$i]);
//            $fin[]=$row;
//
//        }
//
//        if ($quer){
//
//            return View('DispachCenter.document_contract')->with('resu',$res);
//
//        }
//                foreach ($filter as $fil){
//                    $next=next($filter);
////                    if ($next){
////
////
////                   return View('DispachCenter.document_contract')->with('fil',$next)->with('like',$like_valid);
////
////               }else{
////                        $next='NO data en NEXT';
////                        return View('DispachCenter.document_contract')->with('fil',$next)->with('like',$like_valid);
////                    }
//                    if ($start_date > $fil->date){
//
//                        if ($start_date < $fil->pickup_date){
//                            $code_no='DATE del primer loop no valido queda dento de otra renta';
//
//                            return View('DispachCenter.document_contract')->with('fil',$filter)->with('like',$code_no);
//
//                        }elseif($end_date < $next-> date){
//
//                            $code_no2='DATE Y EL PICKUP del SEGUNDO loop ES VALIDO Esta despues y antes de una renta';
//
//                            return View('DispachCenter.document_contract')->with('fil',$filter)->with('like',$code_no2);
//
//                        }else{
//
//                                $code_no2='PICKUP del SEGUNDO loop NO VALIDO entra en otra renta ';
//
//                            return View('DispachCenter.document_contract')->with('fil',$filter)->with('like',$code_no2);
//
//                        }
//
//                    }elseif ($end_date < $fil->date){
//
//                        $code_vali='Date del segundo valido';
//
//                        return View('DispachCenter.document_contract')->with('fil',$filter)->with('like',$code_vali);
//
//                    }else{
//                        $code_vali='Date del segundo no valido cae en otra renta ';
//
//                        return View('DispachCenter.document_contract')->with('fil',$filter)->with('like',$code_vali);
//
//                    }
//
//                }

//                $custom="";
//for($i = 0; $i < $length - 1; ++$i) {
//    if (current($items) === next($items)) {
//        // they match
//    }
//}


//                     $users = DB::table('clientes')->where('Full_name', '=', $full)->get();
//                     if (empty($users)){

                         //                         EL CLIENTE NO EXISTE Y SE AGREGA SU COMPAÑIA TAMBIEN

                         if (empty($compa)){

//                             SI LA COMPAÑIA NO SE PONE EN EL FORMULARIO QUE LA GUARDE COMO UN CAMPO NULO

                             $id_fisrt_client = DB::table('clients')->insertGetId(["full_name"=>$full, 'client_address' => $address_rent, 'phone_num'=>$phone, 'email'=>$email]);

                         }else{
//                             SI LA COMPAÑIA YA ESTA EN LA BASE DE DATOS QUE SOLO BUSQUE Y SAQUE EL ID

                             $compañia = DB::table('machineries')->where('name', '=', $compa)->exists();


//                             if(empty($compañia)){

                                 $id_fisrt_comp = DB::table('companies')->insertGetId(['company_name'=>$compa]);


                                 $id_fisrt_client = DB::table('clients')->insertGetId(["full_name"=>$full, 'client_address' => $address_rent, 'phone_num'=>$phone, 'email'=>$email, 'id_comp'=>$id_fisrt_comp]);

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

                         $mach_id = DB::table('machineries')->select('id_machine')->where('name', '=', $machinery)->get();

                         foreach ($mach_id as $post) {

                             $maquina_id = $post;
                         }

//---------------------------------------------------------------------------------------------------------------


//                     }else{

//                         SI EL CLIENTE YA EXISTE

                         $mach_id = DB::table('machineries')->select('id_machine')->where('name', '=', $machinery)->get();

                         foreach ($mach_id as $post) {

                             $maquina_id = $post->id_machine;
                         }

                         $user2 = DB::table('clients')->where('full_name', '=', $full)->get();

                         foreach ($user2 as $us) {

                             $user3 = $us->id_client;
                         }

                         $id_renta_first = DB::table('rentals')->insertGetId(["machine"=>$maquina_id, "driver" => $driver, 'rental_cost'=>$rental_cost,'dispatch_date'=>$start_date,'pick_up_date'=>$end_date,'delivery_site'=>$address_rent,'client'=> $user3, 'delivery_note'=> $note]);






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
