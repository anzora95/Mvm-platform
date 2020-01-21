@extends('master')
    @section('title')
        <title>Dashboard</title>
    @stop



    @section('content')
<br>
<br>
<div class="text-center">
    <h1> <strong> DASHBOARD </strong></h1>
</div>

<div class="container" style="margin: auto">
<div class="row">
    <div class="col-sm-3 offset-md-3">
        <div class="card">
            <div class="card-header">
                <a href="/dispatchcenter">
                    {{ HTML::image('images/dispatch_center.png', 'dispatch', array('class' => 'card-img')) }}
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Dispatch Center</h5>
            </div>
        </div>
    </div>
{{--    <div class="col-sm-3">--}}
{{--        <div class="card">--}}
{{--            <div class="card-header">--}}
{{--                {{ HTML::image('images/bob_cat.png', 'bob_cat', array('class' => 'card-img')) }}--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <h5 class="card-title text-center">Project Management</h5>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header">
                {{ HTML::image('images/equipment_calendar.png', 'calendar', array('class' => 'card-img')) }}
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Equipment Calendar</h5>

            </div>
        </div>
    </div>
{{--    <div class="col-sm-3">--}}
{{--        <div class="card">--}}
{{--            <div class="card-header">--}}
{{--                {{ HTML::image('images/bob_cat.png', 'bob_cat', array('class' => 'card-img')) }}--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <h5 class="card-title text-center">Square Invoicing</h5>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
{{----------------------------------------------------------------------------------ROW 2---------------------------------------------------------------}}

{{--<div class="row">--}}
{{--        <div class="col-sm-3">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    {{ HTML::image('images/bob_cat.png', 'bob_cat', array('class' => 'card-img')) }}--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title text-center">Truck Management</h5>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-sm-3">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    {{ HTML::image('images/bob_cat.png', 'bob_cat', array('class' => 'card-img')) }}--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title text-center">Contracts</h5>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-sm-3">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    {{ HTML::image('images/bob_cat.png', 'bob_cat', array('class' => 'card-img')) }}--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title text-center">Fleet Management</h5>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-sm-3">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    {{ HTML::image('images/bob_cat.png', 'bob_cat', array('class' => 'card-img')) }}--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title text-center">Customers</h5>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        @stop

