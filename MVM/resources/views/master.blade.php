<html>
<head>
    @yield('title')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

{{--    {{HTML::style('css/main.css')}}--}}
    {{HTML::style('css/bootstrap.css')}}
    {{HTML::style('css/app.css')}}

    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    @yield('extra_links')

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            {{ HTML::image('images/logo.png', 'dispatch', array('class' => 'd-inline-block align-top', 'width' => '30', 'height'=>'30')) }}
            MVM ERP
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dispatchcenter">Dispatch Center</a>
                </li>
                <li class="nav-item" hidden>
                    <a class="nav-link" href="#">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/new_dispatch">New Dispatch</a>
                </li>
                <li class="nav-item" hidden>
                    <a class="nav-link" href="#">New Invoice</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <a class="navbar-brand" href="#">{{ HTML::image('images/profile.png', 'profile', array('class' => 'd-inline-block align-top', 'width' => '30', 'height'=>'30')) }}</a>
                <a class="nav-link" href="#">Marvin</a>
            </ul>


        </div>
    </nav>

    <!-- Secondary Navigation /////////////////////////////////////////////////////////////////////////////////////// -->
    <div class="container-fluid" style="background-color: #b3b3b3;" hidden>
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                    <img src="src/img/secondarymenu/icon1.png" style="max-width: 100%; padding: 10px;">
                </div>
                <div class="col-md-1">
                    <img src="src/img/secondarymenu/icon2.png" style="max-width: 100%; padding: 10px;">
                </div>
                <div class="col-md-1">
                    <img src="src/img/secondarymenu/icon3.png" style="max-width: 100%; padding: 10px;">
                </div>
                <div class="col-md-1">
                    <img src="src/img/secondarymenu/icon4.png" style="max-width: 100%; padding: 10px;">
                </div>
                <div class="col-md-1">
                    <img src="src/img/secondarymenu/icon5.png" style="max-width: 100%; padding: 10px;">
                </div>
                <div class="col-md-1">
                    <img src="src/img/secondarymenu/icon6.png" style="max-width: 100%; padding: 10px;">
                </div>
                <div class="col-md-1">
                    <img src="src/img/secondarymenu/icon7.png" style="max-width: 100%; padding: 10px;">
                </div>
                <div class="col-md-1">
                    <img src="src/img/secondarymenu/icon8.png" style="max-width: 100%; padding: 10px;">
                </div>
                <div class="col-md-1">
                    <img src="src/img/secondarymenu/icon9.png" style="max-width: 100%; padding: 10px;">
                </div>
                <div class="col-md-1">
                    <img src="src/img/secondarymenu/icon10.png" style="max-width: 100%; padding: 10px;">
                </div>
                <div class="col-md-1">
                    <img src="src/img/secondarymenu/icon11.png" style="max-width: 100%; padding: 10px;">
                </div>
                <div class="col-md-1">
                    <img src="src/img/secondarymenu/icon12.png" style="max-width: 100%; padding: 10px;">
                </div>
            </div>
        </div>
    </div>
{{--@show--}}


@yield('content')

</body>
</html>
