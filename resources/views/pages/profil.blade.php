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
                    <h1 class="page-header">Hi !</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Current Profile
                        </div>
                        <div class="panel-body">

                            <h3 class="page-header">Nama : {{ Auth::user()->name }} </h3>
                            <h3 class="page-header">Email : {{ Auth::user()->email }}</ </h3> </div> <div class="panel-footer">
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



</body>

</html>
