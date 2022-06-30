<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <meta content="The Neighbours Farm Managment System" name="description">
    <meta content="Impact Enterprises" name="author">
    <meta name="keywords" content="The Neighbours Farm Managment System"/>

    <!-- Favicon -->
    <link rel="icon" href="/assets/images/brand/NFMS.png" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/brand/NFMS.png" />

    <!-- Title -->
    <title>@yield('title')</title>

{{--    <!--Bootstrap.min css-->--}}
    <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <!-- Custom scroll bar css-->
    <link href="/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

    <!-- Horizontal-menu css -->
    <link href="/assets/plugins/horizontal-menu/dropdown-effects/fade-down.css" rel="stylesheet">
    <link href="/assets/plugins/horizontal-menu/horizontalmenu.css" rel="stylesheet">

    <!--Daterangepicker css-->
    <link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

    <!-- Sidebar Accordions css -->
    <link href="/assets/plugins/accordion1/css/easy-responsive-tabs.css" rel="stylesheet">

    <!-- Rightsidebar css -->
    <link href="/assets/plugins/sidebar/sidebar.css" rel="stylesheet">

    <!---Font icons css-->
    <link href="/assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
    <link href="/assets/plugins/iconfonts/icons.css" rel="stylesheet" />
    <link  href="/assets/fonts/fonts/font-awesome.min.css" rel="stylesheet">

    <!---Select 2--->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- Data table css -->
    <link href="/assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="/assets/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet" />

    <!-- Date Picker css-->
    <link href="/assets/plugins/date-picker/spectrum.css" rel="stylesheet" />

    <!-- Dashboard css -->
    <link href="/assets/css/style.css" rel="stylesheet" />

    @yield('more-style')
    <style>
        #hov:hover {
            background-color: #1753fc;
            color: white;
        }
        .required:after{
            content:'*';
            color:red;
            padding-left:5px;
        }
        .dataTables_wrapper .dt-buttons {
            float:none;
            text-align:center;
        }
    </style>
</head>
<body class="@yield('body-class') ">
<div id="global-loader">
    <img src="{{asset('/assets/images/icons/loader.svg')}}" alt="loader">
</div>

@yield('nav')
<!-- app-content-->
<div class="my-3 @yield('margin') @yield('app-content')">
    <div class="side-app">
        @yield('main-content')
    </div>
    <!--End side app-->

    <!--footer-->
    <footer class="footer" style=" margin-left: 20px;">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-12 col-sm-12   text-center">
                    Copyright © 2022 <a href="https://www.impact-enterprises.co/" target="_blank">Impact Enterprises</a>. Designed by <a href="#">Asfand Afridi</a> All rights reserved.
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer-->
</div>
<!-- End app-content-->
</div>
<!-- End Page Main-->
</div>
<!-- End Page -->

<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

</body>



<!-- Jquery js-->
<script src="/assets/js/vendors/jquery-3.2.1.min.js"></script>

{{--<!--Bootstrap.min js-->--}}
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js" ></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.js" ></script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


<!--Jquery Sparkline js-->
<script src="/assets/js/vendors/jquery.sparkline.min.js"></script>

<!-- Chart Circle js-->
<script src="/assets/js/vendors/circle-progress.min.js"></script>

<!-- Star Rating js-->
<script src="/assets/plugins/rating/jquery.rating-stars.js"></script>

<!--Moment js-->
<script src="/assets/plugins/moment/moment.min.js"></script>

<!-- Daterangepicker js-->
<script src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Horizontal-menu js -->
<script src="/assets/plugins/horizontal-menu/horizontalmenu.js"></script>

<!--Time Counter js-->
<script src="/assets/plugins/counters/jquery.missofis-countdown.js"></script>
<script src="/assets/plugins/counters/counter.js"></script>

<!-- Sidebar Accordions js -->
<script src="/assets/plugins/accordion1/js/easyResponsiveTabs.js"></script>

<!-- Custom scroll bar js-->
<script src="/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- Rightsidebar js -->
<script src="/assets/plugins/sidebar/sidebar.js"></script>

<!-- Datepicker js -->
<script src="/assets/plugins/date-picker/spectrum.js"></script>
<script src="/assets/plugins/date-picker/jquery-ui.js"></script>
<script src="/assets/plugins/input-mask/jquery.maskedinput.js"></script>

<!-- Data tables js-->
<script src="/assets/plugins/datatable/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatable/datatable.js"></script>
<script src="/assets/plugins/datatable/dataTables.responsive.min.js"></script>

<!---Select 2--->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Charts js-->

<script src="../assets/plugins/chart/chart.bundle.js"></script>
<script src="../assets/plugins/chart/chart.extension.js"></script>

<!-- Custom-charts js-->
<script src="../assets/js/chartjs.js"></script>

<!-- DataTables Export Buttons-->
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>

<!-- Custom js-->
<script src="/assets/js/custom.js"></script>

<script>
    $(function () {
        $('table.display').DataTable({
            dom: 'lBfrtip',
            buttons: [
                { extend: 'excelHtml5', text: 'Export To Excel', className: 'btn-primary', exportOptions: { columns: ':not(.notExport)'} },
                { extend: 'pdfHtml5', text: 'Export To PDF', className: 'btn-secondary', exportOptions: { columns: ':not(.notExport)'} }
            ],
        });

    } );
</script>
<script>
    //alert remove after 5sec
    setTimeout(function() {
        $('#deleteAlert').remove();
    }, 4000);
</script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@yield('more-script')
</html>
