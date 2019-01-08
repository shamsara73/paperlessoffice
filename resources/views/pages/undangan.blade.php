<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.bundle')

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('includes.navigation')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">List Undangan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-md-12">

                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div>
                    @endif

                    <form>



                        <div class="form-group">

                        <a href="{{url('main/tambahundangan')}}" class="btn btn-primary">Tambah Undangan</a>



                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabel Undangan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Undangan</th>
                                        <th>Title</th>
                                        <th>Location</th>
                                        <th>Time</th>
                                        <th>Desc</th>
                                        <th>Attendances</th>
                                        <th>Actions</th>

                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach($meetings as $index => $row)
                                    <tr>
                                        <td>{{ $index +1 }}</td>
                                        <td>{{$row['legalno']}}</td>
                                        <td>{{$row['title']}}</td>
                                        <td>{{$row['location']}}</td>
                                        <td>{{$row['date']}}</td>
                                        <td>{{$row['description']}}</td>
                                        <td>{{$row['attendances']}}</td>
                                        <td>
                                        @if($row['emailsent']==false)
                                        
                                            <form method="post" class="sendmeeting" action="{{url('main/sendMeeting', $row['id'])}}">
                                                {{csrf_field()}}
                                                <input type="hidden" />
                                                <button type="submit" class="btn btn-info"> Send Email </button>
                                            </form>
                                            <br>
                                        
                                        @endif
                                       
                                            <form method="post" action="{{url('main/printMeeting', $row['id'])}}">
                                                {{csrf_field()}}
                                                <input type="hidden" />
                                                <button type="submit" class="btn btn-info"> Print Undangan </button>
                                            </form>
                                            <br>
                                            <form method="post" action="{{url('main/printAbsent', $row['id'])}}">
                                                {{csrf_field()}}
                                                <input type="hidden" />
                                                <button type="submit" class="btn btn-info"> Print Absent </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </ <tbody>



                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });

    </script>

    <script>
        $(document).ready(function () {
            $('.sendmeeting').on('submit', function () {

                if (confirm("Are you sure you want to send it?", $row['id'];)) {
                    return true;
                } else {
                    return false;
                }
            });
        });

    </script>

</body>

</html>
