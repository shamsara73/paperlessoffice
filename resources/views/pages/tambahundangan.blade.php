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
                    <h1 class="page-header">Tambah Undangan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-md-6">

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

                    <form method="post" action="{{url('main/storemeeting')}}" autocomplete="off">
                        {{csrf_field()}}

                        
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" name="title" placeholder="Enter meeting location" id="title">
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input class="form-control" name="loc" placeholder="Enter meeting title" id="loc">
                        </div>
                        <div class="form-group">
                            <label>Datetime</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" id="date" name="date" placeholder="Pick meeting date" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Attendances</label>
                            <div class="form-group">
                                <select class="form-control" name="states[]" id="states" placeholder="Select meeting Attendances"  multiple="multiple">
                                @foreach($anggotas as $index => $row)
                                <option value="{{$row['id']}}">{{$row['nama']}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input class="form-control" name="desc" placeholder="Enter meeting desc" id="desc">
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>


        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD HH:mm',
                minDate: Date()
            });
            $('#states').select2();
        });

    </script>

</body>

</html>
