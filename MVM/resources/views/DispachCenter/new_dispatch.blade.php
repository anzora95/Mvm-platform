@extends('master')
@section('title')
    <title>New Dispatch</title>
@stop
@section('extra_links')


{{--    {{HTML::style('css/bootstrap.css')}}--}}

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

    <!-- Date Picker -->
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    {{HTML::style('css/gmap.css')}}
    {{HTML::script('js/gmap.js')}}


@stop
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col text-right">
                <a href="/"><div class="btn btn-outline-secondary btn-sm" >Go Back</div></a>
                <button type="button" class="btn btn-outline-secondary btn-sm" hidden>Dispatch Calendar</button> <!-- Hidden -->
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="card bg-light col-md-4" style="margin: 10px;">
                <div class="row">
                    <div id="form1" class="card-body">
                        <h5 class="card-title text-center">New Dispatch Form</h5>
                        <form action='/save' method="post" class="well form-horizontal">
                            @csrf
                            <fieldset>
                            <div class="form-group">
                                <label style="font-size: 12px;">Customer Name *</label>
                                <input type="text" class="form-control form-control-sm" id="customername" name="full_name" required>
                            </div>

                            <div class="form-group">
                                <label style="font-size: 12px;">Company Name or/Last Name if no Company Name</label>
                                <input type="text" class="form-control form-control-sm" id="customercompany" name="compa">
                            </div>

                            <div class="form-group">
                                <label style="font-size: 12px;">Phone Number*</label>
                                <input type="text" class="form-control form-control-sm" id="customerphone" name="phone" required>
                            </div>

                            <div class="form-group">
                                <label style="font-size: 12px;">Email</label>
                                <input type="email" class="form-control form-control-sm" id="customeremail" name="email">
                            </div>

                            <div class="form-group">
                                <label style="font-size: 12px;">Equipment to Rent</label> <span class="badge badge-secondary" style="font-size: 10px;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Add Another</span>
                                <select class="form-control" id="exampleFormControlSelect1" style="font-size: 12px;" name="machinery">
                                    @foreach($equip as $equipment)
                                        <option> {{ $equipment -> name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="collapse" id="collapseExample">
                                <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect1" style="font-size: 12px;">
                                        @foreach($equip as $equipment)
                                            <option> {{ $equipment -> name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHrRpn0FGYLAZ0bi1UTHPCmGClIZo8diA&libraries=places&callback=initAutocomplete" async defer></script>
                            <div class="form-group" >
                                <label style="font-size: 12px;">Delivery Address</label>
                                <div id="locationField" >
                                <input type="text" class="form-control form-control-sm" id="autocomplete" onFocus="geolocate()" name="address_1" required>
                                </div>
                            </div>

                            <div class="form-group" style="font-size: 12px;">
                                <div class="row">
                                    <div class="col">
                                        <label style="font-size: 12px;">Delivery Date</label>
                                        <input id="datepicker" width="120"name="start_date" required>
                                    </div>
                                    <div class="col">
                                        <label style="font-size: 12px;">Estimated Return</label>
                                        <input id="datepicker2" width="120" name="pick_up_date" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-size: 12px;">Attachments / Delivery Notes</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-secondary btn-sm">Submit Dispatch</button>
                            </div>
                            </fieldset>

                        </form>
                    </div>
                </div>
            </div><!-- End Col 4 -->
        </div> <!-- End Row -->
    </div>

    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',


        });
        $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap4',

        });
    </script>

    <script>

        $('input[name="phone"]').mask('(000) 000 0000');
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@stop
