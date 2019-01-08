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
                    <h1 class="page-header">List Anggota</h1>
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


                            <a href="{{url('main/tambahanggota')}}" class="btn btn-primary">Register Anggota</a>

                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jabatan</th>
                                        <!-- <th>Aksi</th> -->
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach($anggotas as $index => $row)
                                    <tr>
                                        <td>{{ $index +1 }}</td>
                                        <td>{{$row['nama']}}</td>
                                        <td>{{$row['email']}}</td>
                                        <td>{{$row['jabatan']}}</td>


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
            $('.delete_form').on('submit', function () {

                if (confirm("Are you sure you want to delete it?", $row['id'];)) {
                    return true;
                } else {
                    return false;
                }
            });
        });

    </script>

</body>

</html>
