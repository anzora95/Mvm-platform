<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use DB;
use App\Renta;
use App\Cliente;
use App\Compañia;

use setasign\Fpdi\Fpdi;
//use Imagick;


class Rental_Agreement_Controller extends Controller
{
    public function rental_customer_data(){

//        $re= DB::table('rentals')->get(); se usuara un where par filtrar la busqueda
        $pdf=new Fpdi();
        $ren=Renta::with('clientes','machine')->where('id','=',5)->first();

        $pdf->AddPage();
        $pdf->setSourceFile('C:\Users\josep\php_proyect\mvmplatform\MVM\public\documents\base\Rental_agreement_2020.pdf');

        $tplIdx=$pdf->importPage(1);
        $pdf->useTemplate($tplIdx,null,null,null,null,true);
        /* ********************CROPED****************** */
//--------------------RENTAL TEXT-------------------
// CUSTOMER N. TEXT
        $pdf->SetFont('Helvetica');
        $pdf->SetTextColor(2, 4, 7);
        $pdf->SetXY(46, 47.5);
        $pdf->Write(11,"23908");
// RENTAL AGREEMENT N. TEXT
        $pdf->SetFont('Helvetica');
        $pdf->SetTextColor(2, 4, 7);
        $pdf->SetXY(177, 47.5);
        $pdf->Write(11,"15525");
//--------------------CUSTOMER TEXT-----------------
// FULLNAME TEXT
        $pdf->SetFont('Helvetica');
        $pdf->SetTextColor(2, 4, 7);
        $pdf->SetXY(46, 61.4);
        $pdf->Write(11,$ren->clientes->full_name);
// COMPANY TEXT
        $pdf->SetFont('Helvetica');
        $pdf->SetTextColor(2, 4, 7);
        $pdf->SetXY(46, 67.5);
        $pdf->Write(11,$ren->clientes->id_comp);
// ADDRESS TEXT
        $pdf->SetFont('Helvetica');
        $pdf->SetTextColor(2, 4, 7);
        $pdf->SetXY(46, 73.5);
        $pdf->Write(11,$ren->delivery_site);
// JOBSITE TEXT
        $pdf->SetFont('Helvetica');
        $pdf->SetTextColor(2, 4, 7);
        $pdf->SetXY(46, 79.5);
        $pdf->Write(11,"El Cerrito");
// PHONE TEXT
        $pdf->SetFont('Helvetica');
        $pdf->SetTextColor(2, 4, 7);
        $pdf->SetXY(46, 85.7);
        $pdf->Write(11,$ren->clientes->phone_num);
//--------------------DATE&TIME TEXT-----------------
// DATE OUT TEXT
        $pdf->SetFont('Helvetica');
        $pdf->SetTextColor(2, 4, 7);
        $pdf->SetXY(157, 61.1);
        $pdf->Write(11,date("m/d/Y",strtotime($ren->dispatch_date)));
// DATE OUT->TIME TEXT
        $pdf->SetFont('Helvetica');
        $pdf->SetTextColor(2, 4, 7);
        $pdf->SetXY(157, 67.1);
        $pdf->Write(11,"8:43");
// EST DATE IN TEXT
        $pdf->SetFont('Helvetica');
        $pdf->SetTextColor(2, 4, 7);
        $pdf->SetXY(157, 79.6);
        $pdf->Write(11,"2/15/2020");
// EST DATE IN->TIME TEXT
        $pdf->SetFont('Helvetica');
        $pdf->SetTextColor(2, 4, 7);
        $pdf->SetXY(157, 86);
        $pdf->Write(11,"20:00");

//MACHINES
// QTY
        $pdf->SetFont('Helvetica');
        $pdf->SetTextColor(2, 4, 7);
        $pdf->SetXY(25, 110);
        $pdf->Write(11,"1");
// DESCRIPTION
        $pdf->SetFont('Helvetica');
        $pdf->SetTextColor(2, 4, 7);
        $pdf->SetXY(57, 110);
        $pdf->Write(11,$ren->machinery->name);
// DAY
        $pdf->SetFont('Helvetica');
        $pdf->SetTextColor(2, 4, 7);
        $pdf->SetXY(145, 110);
        $pdf->Write(11,"2");
// PRICE
        $pdf->SetFont('Helvetica');
        $pdf->SetTextColor(2, 4, 7);
        $pdf->SetXY(163, 110);
        $pdf->Write(11,"$200");
// Total
        $pdf->SetFont('Helvetica');
        $pdf->SetTextColor(2, 4, 7);
        $pdf->SetXY(182, 110);
        $pdf->Write(11,"$400");
//// QTY
//        $pdf->SetFont('Helvetica');
//        $pdf->SetTextColor(2, 4, 7);
//        $pdf->SetXY(25, 115);
//        $pdf->Write(11,"1");
//// DESCRIPTION
//        $pdf->SetFont('Helvetica');
//        $pdf->SetTextColor(2, 4, 7);
//        $pdf->SetXY(57, 115);
//        $pdf->Write(11,"Skid Steer Loader 262-D");
//// DAY
//        $pdf->SetFont('Helvetica');
//        $pdf->SetTextColor(2, 4, 7);
//        $pdf->SetXY(145, 115);
//        $pdf->Write(11,"2");
//// PRICE
//        $pdf->SetFont('Helvetica');
//        $pdf->SetTextColor(2, 4, 7);
//        $pdf->SetXY(163, 115);
//        $pdf->Write(11,"$150");
//// Total
//        $pdf->SetFont('Helvetica');
//        $pdf->SetTextColor(2, 4, 7);
//        $pdf->SetXY(182, 115);
//        $pdf->Write(11,"$300");

        $filePath='C:\Users\josep\php_proyect\mvmplatform\MVM\public\documents\signed\MVRENT.pdf';
        $pdf->Output();






    }

    public function generate(){

//        $im = new Imagick();
//
//        $im->setResolution(595,648);
//        $im->readimage('signed_Documents/MVRENTcroped.pdf[0]');
//        $im->setImageFormat('jpg');
//        $im->mergeImageLayers(Imagick::LAYERMETHOD_FLATTEN);
//        $im->setImageAlphaChannel(Imagick::ALPHACHANNEL_REMOVE);
//        $im->writeImage('thumb222.jpg');
//        $im->clear();
//        $im->destroy();
    }
}
