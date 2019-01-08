<!DOCTYPE html>
<html>
<head>
@include('includes.bundle')
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1>Hi, {{ $name }}</h1>
                        </div>
                        <div class="panel-body">
                            <p> <b> {{ $creatorname }} </b> invited you to attend the meeting on <b> {{ $datetime }} </b> . </p>
                            <p>The meeting is about <i> {{ $title }} </i> and it will be held at <b> {{ $location }}</b>.</p>
                            <p>Best regards, Office Online Services</p>

                        </div>
                        

                    </div>
            </div>
        </div>
    </div>

</body>
</html>