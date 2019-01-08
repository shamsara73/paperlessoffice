<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    @include('includes.bundle')
    <style type="text/css">
        .box {
            width: 600px;
            margin: 0 auto;
            border: 1px solid #ccc;
        }

    </style>
</head>

<body>
    <br />
    <div class="container box">
        <h3 align="center">REGISTER</h3><br />

        @if(isset(Auth::user()->email))
        <script>window.location="/main/successlogin";</script>
        @endif

        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ url('/registerPost') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="alamat">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="alamat">Password Confirmation:</label>
                <input type="password" class="form-control" id="confirmation" name="confirmation">
            </div>
            <div class="form-group">
                <label for="alamat">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-md btn-primary">Submit</button>
                <a href="{{url('main')}}" class="btn btn-md btn-danger">Cancel</a>


            </div>

        </form>


    </div>

    <body>

</html>
