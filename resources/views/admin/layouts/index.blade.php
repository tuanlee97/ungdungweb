<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Myshop</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    {{-- <link href="admin_asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_asset/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="admin_asset/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    DataTables Responsive CSS
    <link href="admin_asset/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_asset/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> --}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="admin_asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin_asset/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="admin_asset/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="admin_asset/css/plugins/timeline/timeline.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="admin_asset/css/sb-admin.css" rel="stylesheet">

    @yield('style')
</head>

<body>

    <div id="wrapper">

        @include('admin.layouts.header')
        @yield('content')
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    {{-- <script src="admin_asset/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_asset/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_asset/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="admin_asset/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="admin_asset/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="admin_asset/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin_asset/dist/js/sb-admin-2.js"></script>

    <script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>
    --}}
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script src="admin_asset/js/jquery-1.10.2.js"></script>
    <script src="admin_asset/js/bootstrap.min.js"></script>
    <script src="admin_asset/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="admin_asset/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="admin_asset/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <!-- SB Admin Scripts - Include with every page -->
    <script src="admin_asset/js/sb-admin.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.delete').click(function() {
                var r = confirm("bạn muốn xóa!");
                if (r == true) {
                    return true;
                } else {
                  return false;
              }
          });
        });
    </script>
{{--     <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
    --}}
    @yield('script')

</body>

</html>
