<!DOCTYPE html>
<html lang="en">
<head>
    <title>MVM Machinery</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

</head>
<body>


<br>
<br>
<div class="text-center">
    <h1> <strong> DASHBOARD </strong></h1>
</div>
<br>
<br>
<br>

<br>
<br>
<br>
<br>
<br>
<div class="container" style="margin: auto">
<div class="row ">
    <div class="col-sm-3 offset-md-3">
        <div class="card">
            <div class="card-header">
                <a href="/dispatch_center">
                    {{ HTML::image('images/bob_cat.png', 'bob_cat', array('class' => 'card-img')) }}
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
                {{ HTML::image('images/bob_cat.png', 'bob_cat', array('class' => 'card-img')) }}
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
    <br>
    <br>
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
</body>
</html>
