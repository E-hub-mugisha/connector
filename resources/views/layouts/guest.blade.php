<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-90680653-2');
    </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Service provider Dashboard">
    <meta name="author" content="BootstrapDash">

    <title>Sprovider Dashboard</title>

    <!-- vendor css -->
    <link href="{{asset('sprovider/lib/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('sprovider/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('sprovider/lib/typicons.font/typicons.css')}}" rel="stylesheet">
    <link href="{{asset('sprovider/lib/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">

    <!-- azia CSS -->
    <link rel="stylesheet" href="{{asset('sprovider/css/azia.css')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/fav.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/fav.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/fav.png') }}">
    @livewireStyles

</head>

<body>

    @include('livewire.sprovider.navbar')
    <main>
        {{ $slot }}
    </main>
    @include('sweetalert::alert')
    <div class="az-footer ht-40">
        <div class="container ht-100p pd-t-0-f">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © HileTask <?php echo date("Y"); ?></span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Designed by <a href="https://homiez.rw" target="_blank">HOMIEZ</a></span>
        </div><!-- container -->
    </div><!-- az-footer -->


    <script src="{{asset('sprovider/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('sprovider/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('sprovider/lib/ionicons/ionicons.js')}}"></script>
    <script src="{{asset('sprovider/lib/jquery.flot/jquery.flot.js')}}"></script>
    <script src="{{asset('sprovider/lib/jquery.flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('sprovider/lib/chart.js/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('sprovider/lib/peity/jquery.peity.min.js')}}"></script>

    <script src="{{asset('sprovider/js/azia.js')}}"></script>
    <script src="{{asset('sprovider/js/chart.flot.sampledata.js')}}"></script>
    <script src="{{asset('sprovider/js/dashboard.sampledata.js')}}"></script>
    <script src="{{asset('sprovider/js/jquery.cookie.js')}}" type="text/javascript"></script>

    @livewireScripts
</body>

</html>