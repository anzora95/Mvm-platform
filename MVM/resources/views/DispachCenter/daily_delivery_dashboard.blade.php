<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->


    {{HTML::style('vendor/bootstrap/css/bootstrap.min.css')}}
    {{HTML::style('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}
    {{HTML::style('vendor/animate/animate.css')}}
    {{HTML::style('vendor/select2/select2.min.css')}}
    {{HTML::style('vendor/perfect-scrollbar/perfect-scrollbar.css')}}
    {{HTML::style('css/util.css')}}
    {{HTML::style('css/main.css')}}
    {{HTML::style('css/main.css')}}
{{--    {{HTML::asset('images/icons/favicon.ico')}}--}}


</head>
<body>

<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table">

                <div class="row header">
                    <div class="cell">
                        Maquina
                    </div>
                    <div class="cell" style="text: center">
                        Cliente
                    </div>
                    <div class="cell">
                        Email
                    </div>
                    <div class="cell" style="text: center">
                        Phone Number
                    </div>
                    <div class="cell" style="text: center">
                        Email
                    </div>
                    <div class="cell" style="text: center">
                        Button
                    </div>
                </div>

                @foreach($rents as $renta)
                <div class="row">
                    <div class="cell" data-title="Maquina" >
                        {{$renta->maquina}}
                    </div>

                    <div class="cell" data-title="Cliente">
                        lol
                    </div>
                    <div class="cell" data-title="Job Title">
                   lol
                    </div>
                    <div class="cell" data-title="Location">
                    lol
                    </div>
                    <div class="cell" data-title="Location">
                     lol
                    </div>
                    <div class="cell" data-title="Location">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Modal</button>
                    </div>
                </div>
                @endforeach

            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div>
                    </div>
                </div>
            </div>


                <br>
                <br>
                <input type="file" accept="image/*" capture="camera" />


            </div>

        </div>
    </div>
</div>



<!--===============================================================================================-->
<script src="C:/Users/josep/php_proyect/mvmplatform/MVM/resources/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="C:/Users/josep/php_proyect/mvmplatform/MVM/resources/vendor/bootstrap/js/popper.js"></script>
<script src="C:/Users/josep/php_proyect/mvmplatform/MVM/resources/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="C:/Users/josep/php_proyect/mvmplatform/MVM/resources/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="C:/Users/josep/php_proyect/mvmplatform/MVM/resources/js/main.js"></script>

<script>
    // register modal component
    Vue.component('modal', {
        template: '#modal-template'
    })

    // start app
    new Vue({
        el: '#app',
        data: {
            showModal: false
        }
    })
</script>



<style>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-container {
        width: 300px;
        margin: 0px auto;
        padding: 20px 30px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    .modal-header h3 {
        margin-top: 0;
        color: #42b983;
    }

    .modal-body {
        margin: 20px 0;
    }

    .modal-default-button {
        float: right;
    }

    /*
     * The following styles are auto-applied to elements with
     * transition="modal" when their visibility is toggled
     * by Vue.js.
     *
     * You can easily play with the modal transition by editing
     * these styles.
     */

    .modal-enter {
        opacity: 0;
    }

    .modal-leave-active {
        opacity: 0;
    }

    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }

</style>

</body>
</html>
