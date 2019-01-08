<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css')}}"  rel="stylesheet" />
    <!-- <script src="main.js"></script> -->
    <link href="{{ asset('css/sb-admin-2.css')}}" rel="stylesheet"/>

    <!-- Morris Charts CSS -->
    <link href="{{ asset('css/morrisjs/morris.css')}}" rel="stylesheet"/>

    <!-- Custom Fonts -->
    <link href="{{ asset('css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1>Hello, {{ $name }}</h1>
                        </div>
                        <div class="panel-body">
                            <p> We are very sorry to tell you, 
                                the meeting that will be held at <b> {{ $location }}</b> on <b> {{ $datetime }} </b> 
                                about <i> {{ $title }} </i> will be <b> CANCELED</b> due to a few circumtances.</p>
                            <p> Feel free to contact (Mr/Mrs) <b> {{ $creatorname }} </b> if you have several question about it. </p>
                            <p> Best regards, Office Online Services</p>

                        </div>

                    </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js')}}"> </script> 

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js')}}" ></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('css/metisMenu/metisMenu.min.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/sb-admin-2.js')}}"></script>
</body>
</html>