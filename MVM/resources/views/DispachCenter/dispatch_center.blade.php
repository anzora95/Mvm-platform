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
                    <div class="btn btn-outline-secondary btn-sm" href='#'>New Dispatch</div>
                </div>
            </div>
        </div>

        <!-- Dashboard Cards + Bages ////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <div class="card bg-light col" style="margin: 10px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">1</h5>
                        <p class="card-text" style="margin-bottom: 0px;">MACHINES GOING OUT TOMORROW</p>
{{--                        <span class="badge badge-warning">262D</span>--}}
                    </div>
                </div>
                <div class="card bg-light col" style="margin: 10px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">3</h5>
                        <p class="card-text" style="margin-bottom: 0px;">MACHINES CURRENTLY ON YARD</p>
{{--                        <span class="badge badge-warning">303E</span>--}}
{{--                        <span class="badge badge-warning">232D</span>--}}
{{--                        <span class="badge badge-warning">262D</span>--}}
                        @foreach($inyard as $yard)
                            <span class="badge badge-warning"> {{$yard}}</span>
                        @endforeach
                    </div>
                </div>
                <div class="card bg-light col" style="margin: 10px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">1</h5>
                        <p class="card-text" style="margin-bottom: 0px;">MACHINES OUT ON FIELD</p>
                        @foreach($out as $equip)
                            <span class="badge badge-danger">{{$equip}}</span>
                        @endforeach
                    </div>
                </div>
                <div class="card bg-light col" style="margin: 10px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">0</h5>
                        <p class="card-text" style="margin-bottom: 0px;">MACHINES DOWN/MAINTENANCE</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Today's Dispatch ////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="container">
            <div class="row">
                <div class="card bg-light col-4" style="margin: 10px;">
                    <div class="card-body"  style="font-size: 12px;">

                        <h5 class="card-title text-center">Dispatch Center</h5>

                        <div class="row"> <!-- Start Row -->
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
                        </div> <!-- End Row -->

                        <hr style="margin-top: 0px;">

                        <h6 class="card-title text-left">Deliveries</h6>

                        <!-- Delivery Example 1 -->
                        @foreach($rentals as $rent)
                            @if($rent->dispatch_date==$today)
                                <div class="accordion" id="accordionExample">
                                    <div class="card" type="button" data-toggle="collapse" data-target="#collapse{{$rent->machinery->model}}" aria-expanded="true" aria-controls="collapse{{$rent->machinery->model}}">
                                        <div class="card-header" id="heading{{$rent->machinery->model}}" style="padding: 15px !important;">
                                            <dl class="row"  style="margin-bottom: -15px !important;">

                                                <dt class="col-sm-4" style="margin-right: -20px;"> {{ HTML::image('images/machines/303E.jpg', '303', array('style' => 'max-width: 100%;')) }}</dt>

                                                <dd class="col-sm-8" style="font-size: 16px !important;"> <a style="font-size: 12px; text-decoration: none; font-color: #000 !important; font-weight: 700;">Machine(s):</a> <span class="badge badge-warning">{{$rent->machinery->model}}</span> </br>
                                                    <a style="font-size: 12px; text-decoration: none; font-color: #000 !important; font-weight: 700;">Status:</a> <span class="badge badge-success">Delivered</span>
                                                </dd>

                                            </dl>
                                        </div>
                                    </div>
                                    <div id="collapse{{$rent->machinery->model}}" class="collapse show" aria-labelledby="heading{{$rent->machinery->model}}"  data-parent="#accordionExample">

                                        <!-- Delivery Example 1 Exapanded -->
                                        <div class="card-body" style="padding: 15px !important;">
                                            <dl class="row">
                                                <!-- <dt class="col-sm-4" style="margin-right: -20px;">Machine(s):</dt>
                                                <dd class="col-sm-8" style="font-size: 16px !important;"> <span class="badge badge-warning">303E</span> </dd> -->

                                                <dt class="col-sm-4" style="margin-right: -20px;">Delivery Address</dt>
                                                <dd class="col-sm-8">{{$rent->delivery_site}}</dd>

                                                <dt class="col-sm-4" style="margin-right: -20px;">Trip Time</dt>
                                                <dd class="col-sm-8">38 Minutes from yard leaving now</dd>

                                                <dt class="col-sm-4" style="margin-right: -20px;">Customer</dt>
                                                <dd class="col-sm-8">{{$rent->clientes->full_name}}</dd>

                                                <dt class="col-sm-4" style="margin-right: -20px;">Notes</dt>
                                                <dd class="col-sm-8">{{$rent->delivery_notes}}</dd>

                                                <dt class="col-sm-4" style="margin-right: -20px;">Status</dt>
                                                <dd class="col-sm-8" style="font-size: 16px !important;">
                                                    <span class="badge badge-success" data-toggle="tooltip" data-placement="top" title="Click to switch">Delivered</span>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div> <!-- End Acordion -->
                            @endif
                        @endforeach

                        <hr> </hr>

                        <h6 class="card-title text-left">Pick-ups</h6>

                        <!-- Pickup Example 1 -->

                        @foreach($rentals as $rent)
                            @if($rent->pick_up_date==$today)
                                <div class="accordion" id="accordionExample">
                                    <div class="card" type="button" data-toggle="collapse" data-target="#collapse{{$rent->machinery->model}}" aria-expanded="true" aria-controls="collapse{{$rent->machinery->model}}">
                                        <div class="card-header" id="heading{{$rent->machinery->model}}" style="padding: 15px !important;">
                                            <dl class="row"  style="margin-bottom: -15px !important;">

                                                <dt class="col-sm-4" style="margin-right: -20px;"> {{ HTML::image('images/machines/232D.jpg', '232', array('style' => 'max-width: 100%;')) }}</dt>

                                                <dd class="col-sm-8" style="font-size: 16px !important;"> <a style="font-size: 12px; text-decoration: none; font-color: #000 !important; font-weight: 700;">Machine(s):</a> <span class="badge badge-warning">{{$rent->machinery->model}}</span> </br>
                                                    <a style="font-size: 12px; text-decoration: none; font-color: #000 !important; font-weight: 700;">Status:</a> <span class="badge badge-success">Pending</span>
                                                </dd>

                                            </dl>
                                        </div>
                                    </div>
                                    <div id="collapse{{$rent->machinery->model}}" class="collapse show" aria-labelledby="heading{{$rent->machinery->model}}"  data-parent="#accordionExample">

                                        <!-- Delivery Example 1 Exapanded -->
                                        <div class="card-body" style="padding: 15px !important;">
                                            <dl class="row">
                                                <!-- <dt class="col-sm-4" style="margin-right: -20px;">Machine(s):</dt>
                                                <dd class="col-sm-8" style="font-size: 16px !important;"> <span class="badge badge-warning">303E</span> </dd> -->

                                                <dt class="col-sm-4" style="margin-right: -20px;">Delivery Address</dt>
                                                <dd class="col-sm-8">{{$rent->delivery_site}}</dd>

                                                <dt class="col-sm-4" style="margin-right: -20px;">Trip Time</dt>
                                                <dd class="col-sm-8">38 Minutes from yard leaving now</dd>

                                                <dt class="col-sm-4" style="margin-right: -20px;">Customer</dt>
                                                <dd class="col-sm-8">{{$rent->clientes->full_name}}</dd>

                                                <dt class="col-sm-4" style="margin-right: -20px;">Notes</dt>
                                                <dd class="col-sm-8">Include 12" + 18" Buckets / Deliver on Alley</dd>

                                                <dt class="col-sm-4" style="margin-right: -20px;">Status</dt>
                                                <dd class="col-sm-8" style="font-size: 16px !important;">
                                                    <span class="badge badge-success" data-toggle="tooltip" data-placement="top" title="Click to switch">Pending</span>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div> <!-- End Acordion -->
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