<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title') - connector</title>

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('asset/images/fav-icon/fav-connector.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset/images/fav-icon/fav-connector.png') }}">
    <link rel="shortcut icon" href="{{ asset('asset/images/fav-icon/fav-connector.png') }}">

    <!-- Custom fonts for this template -->
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendor/summernote/summernote.min.css" rel="stylesheet">
    <script src="{{asset('admin/vendor/summernote/summernote.min.js"></script>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('admin.includes.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('admin.includes.navbar')
                <main>
                    @yield('content')
                </main>
                @include('sweetalert::alert')
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; connector <?php echo date("Y"); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>

    </div>

    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}">
    </script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
    <script src="{{ asset('admin/vendor/tinymce/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            selector: 'textarea#content', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
     <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-HWQ435LMGE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-HWQ435LMGE');
</script>
<script async defer src="https://apis.google.com/js/api.js"></script>

    </body>

</html>