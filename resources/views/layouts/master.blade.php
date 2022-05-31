<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">

    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="@@path/vendor/@fancyapps/fancybox/dist/jquery.fancybox.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('common.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('common.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('common.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('admin/js/demo/chart-pie-demo.js')}}"></script>

    <script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>

    <!-- Fancybox JS -->
    <script src="@@path/vendor/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>

    <!-- Script for google maps -->
    <script
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrQsfEb0xqDCxuElEgT9m-HmpwzO4_bAs&callback=initMap"
                    defer
                    ></script>
    <script>
        function initMap() {

            var myLatlng = { lat:  50.85045, lng:  4.34878 };
            var lat = parseFloat(document.getElementById("lat").value);
            var long = parseFloat(document.getElementById("long").value);
            if(isNaN(lat) || isNaN(long)){
                 myLatlng = { lat:  50.85045, lng:  4.34878 };
            }
            else{
                 myLatlng = { lat:  lat, lng:  long };
            }

            const map = new google.maps.Map(document.getElementById("google-map"), {
                zoom: 14,
                center: myLatlng,
                streetViewControl: false,
            });
            // Create the initial InfoWindow.
            let infoWindow = new google.maps.InfoWindow({
                content: "Locatie Evenement",
                position: myLatlng,

            });

            infoWindow.open(map);
            // Configure the click listener.
            map.addListener("click", (mapsMouseEvent) => {
                // Close the current InfoWindow.
                infoWindow.close();
                infoWindow = new google.maps.InfoWindow({
                position: mapsMouseEvent.latLng,
                });
                infoWindow.setContent(
                    "Locatie Evenement"
                );
                var coordinates = mapsMouseEvent.latLng.toJSON();
                document.getElementById("long").value = coordinates.lng;
                document.getElementById("lat").value = coordinates.lat;
                infoWindow.open(map);
            });
            }

            window.initMap = initMap;

    </script>

</body>

</html>