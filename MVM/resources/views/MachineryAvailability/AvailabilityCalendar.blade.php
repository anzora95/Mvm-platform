<!DOCTYPE html>
<html lang="en">
<head>
    <title>Calendar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>







</head>

<body>

<div class="card col-md-12 col-sm-12">
    <div class="card-body">

        <div class="card-header col-sm-12">
            <h2 class="text-center">  <strong> {{$today_f}} </strong>  </h2>
        </div>

        <div class="card-body">

            <hr>
            <div class="container">
                <div class="row no-gutters">

                    <div class="col-md-6 col-sm-6 col-12" >
                        <h2 class="text-center ">
                            OUT ON FIELD
                        </h2>
                        <div class="container text-center ">
                            <div class="row text-center">
                                <div class="container">
                                @foreach($machin as $mach)
                                    @if($mach->place==2)
                                        <h3><span class="badge badge-danger"> {{$mach->id_machinery}}</span></h3>
                                    @endif


                                @endforeach
                                </div>
                            </div>

                        </div>



                    </div>
                    <div class="col-md-6 col-sm-6 col-12"  >
                        <h2 class="text-center">
                            IN YARD
                        </h2>
                        <div class="container text-center">
                            <div class="row text-center">
                                <div class="container">
                                    @foreach($machin as $mach)
                                        @if($mach->place==1)
                                        <h3><span class="badge badge-secondary"> {{$mach->id_machinery}}</span></h3>
                                            @elseif($mach->place==3)
                                            <h3><span class="badge badge-success"> {{$mach->id_machinery}}</span></h3>
                                        @endif

                                    @endforeach
                            </div>
                            </div>
                        </div>
                    </div>

{{--                    <div class="col-md-4 col-sm-4 col-12" >--}}
{{--                        <h2 class="text-center">--}}
{{--                            AVAILABLE--}}
{{--                        </h2>--}}
{{--                        <div class="container text-center">--}}
{{--                            <div class="row text-center">--}}
{{--                                <div class="container">--}}
{{--                                    @foreach($machin as $mach)--}}
{{--                                        @if($mach->place==3)--}}
{{--                                            <h3><span class="badge badge-success"> {{$mach->id_machinery}}</span></h3>--}}
{{--                                        @endif--}}

{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
            </div>

            <br>

            <div class="container" >
                <h2 class="text-center"> EQUIPMENT TO DELIVER:</h2>

                @foreach($rentas as $renta)

                <div class="row no-gutters" >
                    @if($renta->date==$today)
                    <div class="col-sm-3">
                        {{ HTML::image('images/bob_cat.png', 'bob_cat', array('class' => 'card-img')) }}
                    </div>
                    <div class="col-sm-9" style="margin: auto">
                        <h3>{{$renta->maquina}}</h3>
                        <div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-12">Direccion: {{$renta->clientes->Address}}</div>
                                    <div class="col-md-6 col-12">Maquina: {{$renta->machinery->name}} </div>
                                    <div class="w-100"></div>
                                    <div class="col-md-6 col-12">Contacto: {{$renta->clientes->First_name}} {{$renta->clientes->Last_name}}</div>
{{--                                    @if($renta->clientes->compañias->Name == @null)--}}
{{--                                        <div class="col">Empresa: </div>--}}
{{--                                        @else--}}
                                        <div class="col-md-6 col-12">Empresa: {{$renta->clientes->compañia->Name}}</div>
{{--                                    @endif--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            <br>
            <br>
            <div class="container" >

                <h2 class="text-center"> EQUIPMENT TO PICK UP:</h2>
                @foreach($rentas as $renta)
                <div class="row no-gutters" style="background-color: #dc3545;">
                    @if($renta->pick_up_date==$today)
                    <div class="col-sm-3">
                        {{ HTML::image('images/bob_cat.png', 'bob_cat', array('class' => 'card-img')) }}
                    </div>
                    <div class="col-sm-9" style="margin: auto">
                        <h3>{{$renta->maquina}}</h3>
                        <div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-12">Direccion: {{$renta->clientes->Address}}</div>
                                    <div class="col-md-6 col-12">Maquina: {{$renta->machinery->name}} </div>
                                    <div class="w-100"></div>
                                    <div class="col-md-6 col-12">Contacto: {{$renta->clientes->First_name}} {{$renta->clientes->Last_name}}</div>
                                    {{--                                    @if($renta->clientes->compañias->Name == @null)--}}
                                    {{--                                        <div class="col">Empresa: </div>--}}
                                    {{--                                        @else--}}
                                    <div class="col-md-6 col-12">Empresa: {{$renta->clientes->compañia->Name}}</div>
                                    {{--                                    @endif--}}
                                </div>
                            </div>
                        </div>
                    </div>
                        @endif
                </div>
                @endforeach


            </div>

        </div>

    </div>

</div>
</body>
</html>
