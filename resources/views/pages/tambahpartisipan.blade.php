<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.bundle')

</head>

<body>

    <div id="wrapper">
        @include('includes.navigation')


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Daftar Anggota</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
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
                                    <form method="post" action="{{url('main/storeanggota')}}" autocomplete="off">
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="nama" placeholder="Nama partisipan" id="nama">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" placeholder="Gunakan email asli agar mendapatkan pemberitahuan dari sistem"
                                                id="email">
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <select class="form-control" name="jabatan" id="jabatan">
                                                @foreach($jabatans as $row)

                                                <option>{{$row['jabatan']}}</option>



                                                @endforeach


                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
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
