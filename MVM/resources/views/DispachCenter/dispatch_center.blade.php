@extends('master')
    @section('title')
        <title>Dispatch Center</title>
    @stop
    @section('extra_links')
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    @stop
    @section('content')
        <!-- Action Buttons (Located on the Right top side of the screen) //////////////////////////////////////////////// -->
        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <div class="col">

                </div>
                <div class="col">

                </div>
                <div class="col">

                </div>
                <div class="col text-right">
                    <a href='/new_dispatch'><div class="btn btn-outline-secondary btn-sm" >New Dispatch</div></a>
                </div>
            </div>
        </div>

         <!--Dashboard Cards + Bages ////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="container" style="margin-top: 20px; ">
            <div class="row">
            <div class="card-group" style="border:1px !important;margin-right: 10px;">
            <!--<div class="col-12">-->
                <div class="card bg-light col-md-6 col-sm-12 col-xs-12" style="margin: 10px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$size_next}}</h5>
                        <p class="card-text" style="margin-bottom: 0px;">MACHINES GOING OUT TOMORROW</p>
{{--                        <span class="badge badge-warning">262D</span>--}}
                        @foreach($next_day_rent as $next_day)
                            <span class="badge badge-warning"> {{$next_day}} </span>
                        @endforeach
                    </div>
                </div>
                <div class="card bg-light col-md-6 col-sm-12 col-xs-12" style="margin: 10px; border-left: 1px solid #d9dadb">
                    <div class="card-body text-center">

                        <h5 class="card-title">{{$zise_no_rents}}</h5>
                        <p class="card-text" style="margin-bottom: 0px;">MACHINES CURRENTLY ON YARD</p>

                        @foreach($inyard as $yard)
                            <span class="badge badge-warning"> {{$yard}}</span>
                        @endforeach
                    </div>
                </div>
                <div class="card bg-light col-md-6 col-sm-12 col-xs-12" style="margin: 10px; border-left: 1px solid #d9dadb">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$size_rent}}</h5>
                        <p class="card-text" style="margin-bottom: 0px; ">MACHINES OUT ON FIELD</p>
                        @foreach($out as $equip)
                            
                            <span class="badge badge-danger" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">{{$equip}}</span>
                        @endforeach
                    </div>
                </div>
                <script >
                    $(function () {
                        $('[data-toggle="tooltip"]').tooltip()
                    })
                </script>
                <div class="card bg-light col-md-6 col-sm-12 col-xs-12" style="margin: 10px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">0</h5>
                        <p class="card-text" style="margin-bottom: 0px;">MACHINES DOWN/MAINTENANCE</p>
                    </div>
                </div>
                    <!--</div>-->
            </div>
            </div>
        </div>

        <!-- Today's Dispatch ////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="container"  >
            <div class="row">

                <div class="card bg-light col-sm-12 col-md-12 col-lg-4" style="margin: 10px;">
                    <div class="card-body"  style="font-size: 12px;">

                        <h5 class="card-title text-center">Dispatch Center</h5>
                        <div class="container">
                        <div class="row" > <!-- Start Row -->

                            <div class="col-2">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="/date_confirm/+{{$previous}}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-8">
                                <p class="text-center" style="font-weight: 700; line-height: 35px;">{{$today_format}}</p>
                            </div>

                            <div class="col-2">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="/date_confirm/+{{$next}}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            </div>
                        </div> <!-- End Row -->

                        <hr style="margin-top: 0px;">

                        <h6 class="card-title text-left">Deliveries</h6>

                        <!-- Delivery Example 1 -->
                        @foreach($rentals as $rent)
                            @if($rent->dispatch_date==$today)
                                <div class="accordion" id="accordionExample" >
                                    <button class="card"  data-toggle="collapse" data-target="#collapse{{$rent->machinery->model}}" aria-expanded="true" aria-controls="collapse{{$rent->machinery->model}}" style="padding: 0px; border-bottom: 1px solid #d9dadb;">
                                        <div class="card-header" id="heading{{$rent->machinery->model}}" style="padding: 15px !important;">
                                            <dl class="row"  style="margin-bottom: -15px !important;">


                                                @switch($rent->machinery->model)
                                                    @case('303E')
                                                    <dd class="col-md-4 " style="margin-right: -20px;"> {{ HTML::image('images/machines/303E-.jpg', '303', array('style' => 'max-width: 100%;')) }}</dd>
                                                    @break

                                                    @case('259D')
                                                    <dd class="col-md-4 " style="margin-right: -20px; "> {{ HTML::image('images/machines/259D.jpg', '259', array('style' => 'max-width: 100%;')) }}</dd>
                                                    @break

                                                    @case('262D')
                                                    <dd class="col-md-4 " style="margin-right: -20px;"> {{ HTML::image('images/machines/262D.jpg', '262', array('style' => 'max-width: 100%;')) }}</dd>
                                                    @break

                                                    @case('232D')
                                                    <dd class="col-md-4 " style="margin-right: -20px;"> {{ HTML::image('images/machines/232D.jpg', '232', array('style' => 'max-width: 100%;')) }}</dd>
                                                    @break

                                                    @default
                                                    <dd class="col-md-4 " style="margin-right: -20px;"> {{ HTML::image('images/bob_cat.png', 'default', array('style' => 'max-width: 100%;')) }}</dd>
                                                @endswitch
                                                    <script>

                                                        function delete_{{$rent->id}}(id_val){
                                                            var delayInMilliseconds = 1000; //1 second

                                                            var flag =1;
                                                            var id = id_val;

                                                            alertify.confirm('Delete Dispatch', 'Do you want to delete this dispatch?', function(){alertify.success('Ok');
                                                                    setTimeout(function() {
                                                                        window.location.replace('/delete_dispatch/'+id+'/'+flag);
                                                                    }, delayInMilliseconds)
                                                                }
                                                                , function(){ alertify.error('Cancel')});
                                                        }

                                                    </script>


{{--                                                <dt class="col-sm-4" style="margin-right: -20px;"> {{ HTML::image('images/machines/$rent->machinery->model.jpg', '303', array('style' => 'max-width: 100%;')) }}</dt>--}}

                                                <dd class="col-md-8" style="font-size: 16px !important;"> <a style="font-size: 12px; text-decoration: none; font-color: #000 !important; font-weight: 700;">Machine(s):</a> <span class="badge badge-warning">{{$rent->machinery->model}}</span> </br>
                                                    @if($rent->status==0)

                                                        <span onclick="changestatus{{$rent->id}}()" id="status2{{$rent->id}}" class="badge badge-success">Delivered</span>

                                                    @elseif($rent->status==1)

                                                        <span onclick="changestatus{{$rent->id}}()" id="status2{{$rent->id}}" class="badge badge-secondary">Pending</span>

                                                    @endif
                                                </dd>
                                            </dl>
                                        </div>

                                    <div id="collapse{{$rent->machinery->model}}" class="collapse " aria-labelledby="heading{{$rent->machinery->model}}"  data-parent="#accordionExample">

                                        <!-- Delivery Example 1 Exapanded -->
                                        <div class="container" style="border-bottom: #000000">
                                        <div class="card-body" style="padding: 10px !important;">
                                            <dl class="row" style="margin: auto">
                                                <!-- <dt class="col-sm-4" style="margin-right: -20px;">Machine(s):</dt>
                                                <dd class="col-sm-8" style="font-size: 16px !important;"> <span class="badge badge-warning">303E</span> </dd> -->

                                                <dt class="col-sm-12 col-md-4" style="margin-right: -20px;">Delivery Address</dt>
                                                <dd class="col-sm-12 col-md-8">{{$rent->delivery_site}}</dd>

                                                <dt class="col-sm-12 col-md-4" style="margin-right: -20px;">Trip Time</dt>
                                                <dd class="col-sm-12 col-md-8">38 Minutes from yard leaving now</dd>

                                                <dt class="col-sm-12 col-md-4" style="margin-right: -20px;">Customer</dt>
                                                <dd class="col-sm-12 col-md-8">{{$rent->clientes->full_name}}</dd>

                                                <dt class="col-sm-12 col-md-4" style="margin-right: -20px;">Notes</dt>
                                                <dd class="col-sm-12 col-md-8">{{$rent->delivery_note}}</dd>

                                                <dt class="col-sm-12 col-md-4" style="margin-right: -20px;">Status</dt>
                                                <dd class="col-sm-12 col-md-8" style="font-size: 16px !important;">
                                                    @if($rent->status==0)

                                                        <span class="badge badge-success" id="status{{$rent->id}}" data-toggle="tooltip" data-placement="top" onclick="changestatus{{$rent->id}}()"  title="Click to switch">Delivered</span>

                                                    @elseif($rent->status==1)

                                                        <span class="badge badge-secondary" id="status{{$rent->id}}" data-toggle="tooltip" data-placement="top" onclick="changestatus{{$rent->id}}()"  title="Click to switch">Pending</span>

                                                    @endif
                                                </dd>
                                                <div class="col-sm-6 col-md-6 col-lg-6 offset-sm-3 offset-lg-3 offset-md-3 badge badge-danger" style="font-size: 12px !important;" id={{$rent->id}}  onclick="delete_{{$rent->id}}({{$rent->id}})">Delete</div>
                                            </dl>
                                        </div>
                                        </div>
                                    </div>
                                        <script>
                                            function changestatus{{$rent->id}}(){
                                                var status = document.getElementById('status{{$rent->id}}');
                                                var status2 = document.getElementById('status2{{$rent->id}}');
                                                var value = status.innerHTML;
                                                var value2 = "Delivered";

                                                if(value.localeCompare(value2)==0){
                                                    status.className = "badge badge-secondary";
                                                    status.innerHTML="Pending";
                                                    status2.className = "badge badge-secondary";
                                                    status2.innerHTML="Pending";

                                                    /* INICIO AJAX PARA CAMBIAR ESTADO EN EL BACKEND */
                                                    var xhttp = new XMLHttpRequest();

                                                    var url = "/updatedelivered/{{$rent->id}}";
                                                    console.log(url);
                                                    xhttp.onreadystatechange = function() {
                                                        if (this.readyState == 4 && this.status == 200) {
                                                        }
                                                    };
                                                    xhttp.open("GET", "/updatedelivered/{{$rent->id}}", true);
                                                    xhttp.send();
                                                    /* FIN AJAX PARA CAMBIAR ESTADO EN EL BACKEND */
                                                }
                                                else{
                                                    /* INICIO AJAX PARA CAMBIAR ESTADO EN EL BACKEND */
                                                    status.className = "badge badge-success";
                                                    status.innerHTML="Delivered";
                                                    status2.className = "badge badge-success";
                                                    status2.innerHTML="Delivered";
                                                    var xhttp = new XMLHttpRequest();

                                                    var url = "/updatePending/{{$rent->id}}";
                                                    xhttp.onreadystatechange = function() {
                                                        if (this.readyState == 4 && this.status == 200) {

                                                        }
                                                    };
                                                    xhttp.open("GET", "/updatePending/{{$rent->id}}", true);
                                                    xhttp.send();
                                                    /* INICIO AJAX PARA CAMBIAR ESTADO EN EL BACKEND */
                                                }
                                            }
                                        </script>
                                    </button>
                                </div> <!-- End Acordion -->
                                <script>

                                    function delete_{{$rent->id}}(id_val){
                                        var delayInMilliseconds = 1000; //1 second

                                        var flag =0;
                                        var id = id_val;

                                        alertify.confirm('Delete Dispatch', 'Do you want to delete this dispatch?', function(){alertify.success('Deleted');
                                                setTimeout(function() {
                                                    window.location.replace('/delete_dispatch/'+id+'/'+flag);
                                                })
                                            }
                                            , function(){ alertify.error('Cancel')});
                                    }

                                </script>
                            @endif
                        @endforeach

                        <hr> </hr>

                        <h6 class="card-title text-left">Pick-ups</h6>

                        <!-- Pickup Example 1 -->

                        @foreach($rentals as $rent)
                            @if($rent->pick_up_date==$today)
                                <div class="accordion" id="accordionExample">
                                    <button class="card"  data-toggle="collapse" data-target="#collapse{{$rent->machinery->model}}P" aria-expanded="true" aria-controls="collapse{{$rent->machinery->model}}P" style="padding: 0px; margin-bottom: 0px; border-bottom: 1px solid #d9dadb; ">
                                        <div class="card-header" id="heading{{$rent->machinery->model}}P" style="padding: 15px !important;">
                                            <dl class="row"  style="margin-bottom: -15px !important;">

                                                @switch($rent->machinery->model)
                                                    @case('303E')
                                                    <dd class="col-md-4" style="margin-right: -20px;">{{ HTML::image('images/machines/303E-.jpg', '303', array('style' => 'max-width: 100%;')) }}</dd>
                                                    @break

                                                    @case('259D')
                                                    <dd class="col-md-4" style="margin-right: -20px;">{{ HTML::image('images/machines/259D.jpg', '259', array('style' => 'max-width: 100%;')) }}</dd>
                                                    @break

                                                    @case('262D')
                                                    <dd class="col-md-4" style="margin-right: -20px;">{{ HTML::image('images/machines/262D.jpg', '262', array('style' => 'max-width: 100%;')) }}</dd>
                                                    @break

                                                    @case('232D')
                                                    <dd class="col-md-4" style="margin-right: -20px;">{{ HTML::image('images/machines/232D.jpg', '232', array('style' => 'max-width: 100%;')) }}</dd>
                                                    @break

                                                    @default
                                                    <dd class="col-md-4" style="margin-right: -20px;">{{ HTML::image('images/bob_cat.png', 'default', array('style' => 'max-width: 100%;')) }}</dd>
                                                @endswitch


                                                <dd class="col-sm-8" style="font-size: 16px !important;"> <a style="font-size: 12px; text-decoration: none; font-color: #000 !important; font-weight: 700;">Machine(s):</a> <span class="badge badge-warning">{{$rent->machinery->model}}</span> </br>
                                                    @if($rent->status==0)

                                                        <span onclick="changestatus{{$rent->id}}()" id="status2{{$rent->id}}" class="badge badge-success">Delivered</span>

                                                    @elseif($rent->status==1)

                                                        <span onclick="changestatus{{$rent->id}}()" id="status2{{$rent->id}}" class="badge badge-secondary">Pending</span>

                                                    @endif
                                                </dd>
                                            </dl>
                                        </div>

                                    <div id="collapse{{$rent->machinery->model}}P" class="collapse " aria-labelledby="heading{{$rent->machinery->model}}P"  data-parent="#accordionExample">

                                        <!-- Delivery Example 1 Exapanded -->
                                        <div class="container" style="border-bottom: #000000">
                                        <div class="card-body" style="padding: 10px !important;">
                                            <dl class="row"  style="margin: auto">
                                                <!-- <dt class="col-sm-4" style="margin-right: -20px;">Machine(s):</dt>
                                                <dd class="col-sm-8" style="font-size: 16px !important;"> <span class="badge badge-warning">303E</span> </dd> -->

                                                <dt class="col-sm-12 col-md-4" style="margin-right: -20px;">Delivery Address</dt>
                                                <dd class="col-sm-12 col-md-8">{{$rent->delivery_site}}</dd>

                                                <dt class="col-sm-12 col-md-4" style="margin-right: -20px;">Trip Time</dt>
                                                <dd class="col-sm-12 col-md-8">38 Minutes from yard leaving now</dd>

                                                <dt class="col-sm-12 col-md-4" style="margin-right: -20px;">Customer</dt>
                                                <dd class="col-sm-8 col-md-8">{{$rent->clientes->full_name}}</dd>

                                                <dt class="col-sm-12 col-md-4" style="margin-right: -20px;">Notes</dt>
                                                <dd class="col-sm-8 col-md-8">{{$rent->delivery_note}}</dd>

                                                <dt class="col-sm-12 col-md-4" style="margin-right: -20px;">Status</dt>
                                                <dd class="col-sm-8 col-md-8" style="font-size: 16px !important;">

                                                    @if($rent->status==0)

                                                        <span class="badge badge-success" id="status{{$rent->id}}" data-toggle="tooltip" data-placement="top" onclick="changestatus_P{{$rent->id}}()"  title="Click to switch">Delivered</span>

                                                    @elseif($rent->status==1)

                                                        <span class="badge badge-secondary" id="status{{$rent->id}}" data-toggle="tooltip" data-placement="top" onclick="changestatus_P{{$rent->id}}()"  title="Click to switch">Pending</span>

                                                    @endif
                                                </dd>
                                                <div class="col-sm-6 col-md-6 col-lg-6 offset-sm-3 offset-lg-3 offset-md-3 badge badge-danger" style="font-size: 12px !important;" id={{$rent->id}}  onclick="delete_{{$rent->id}}({{$rent->id}})"> Delete</div>
                                            </dl>
                                        </div>
                                        </div>
                                    </div>
                                        <script>
                                            function changestatus_P{{$rent->id}}(){
                                                var status = document.getElementById('status{{$rent->id}}');
                                                var status2 = document.getElementById('status2{{$rent->id}}');

                                                var value = status.innerHTML;
                                                var value2 = "Delivered";

                                                if(value.localeCompare(value2)==0){
                                                    status.className = "badge badge-secondary";
                                                    status.innerHTML="Pending";
                                                    status2.className = "badge badge-secondary";
                                                    status2.innerHTML="Pending";


                                                    /* INICIO AJAX PARA CAMBIAR ESTADO EN EL BACKEND */
                                                    var xhttp = new XMLHttpRequest();

                                                    var url = "/updatedelivered/{{$rent->id}}";
                                                    console.log(url);
                                                    xhttp.onreadystatechange = function() {
                                                        if (this.readyState == 4 && this.status == 200) {
                                                        }
                                                    };
                                                    xhttp.open("GET", "/updatedelivered/{{$rent->id}}", true);
                                                    xhttp.send();
                                                    /* FIN AJAX PARA CAMBIAR ESTADO EN EL BACKEND */
                                                }
                                                else{
                                                    /* INICIO AJAX PARA CAMBIAR ESTADO EN EL BACKEND */
                                                    status.className = "badge badge-success";
                                                    status.innerHTML="Delivered";
                                                    status2.className = "badge badge-success";
                                                    status2.innerHTML="Delivered";

                                                    var xhttp = new XMLHttpRequest();

                                                    var url = "/updatePending/{{$rent->id}}";
                                                    xhttp.onreadystatechange = function() {
                                                        if (this.readyState == 4 && this.status == 200) {

                                                        }
                                                    };
                                                    xhttp.open("GET", "/updatePending/{{$rent->id}}", true);
                                                    xhttp.send();
                                                    /* INICIO AJAX PARA CAMBIAR ESTADO EN EL BACKEND */
                                                }
                                            }
                                        </script>
                                    </button>
                                </div> <!-- End Acordion -->
                                <script>

                                    function delete_{{$rent->id}}(id_val){
                                        var delayInMilliseconds = 1000; //1 second

                                        var flag =0;
                                        var id = id_val;

                                        alertify.confirm('Delete Dispatch', 'Do you want to delete this dispatch?', function(){alertify.success('Deleted');
                                                setTimeout(function() {
                                                    window.location.replace('/delete_dispatch/'+id+'/'+flag);
                                                })
                                            }
                                            , function(){ alertify.error('Cancel')});
                                    }

                                </script>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <script>
            $('#datepicker').datepicker({
                uiLibrary: 'bootstrap4'
            });
            $('#datepicker2').datepicker({
                uiLibrary: 'bootstrap4'
            });
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>




    @stop
