<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/scripts/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/scripts/jquery-ui/jquery-ui.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('packages/barryvdh/elfinder/css/elfinder.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/DataTables/css/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/stylesheet.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/custom-stylesheet.css') }}">

    <link rel="icon" href="{{ asset('assets/images/techno-park-logo-square.png') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=NTR|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    @stack('styles')

  </head>
  <body class="app">

    <!-- @App Content -->
    <!-- =================================================== -->
    <div>
      <!-- #Left Sidebar ==================== -->
      
      @include('admin.layouts.sidebar')

      <!-- #Main ============================ -->
      <div class="page-container">
        <!-- ### $Topbar ### -->
        
        @include('admin.layouts.topbar')

        <!-- ### $App Screen Content ### -->
        <main class='main-content bgc-grey-100'>
          <div id='mainContent'>

              @include('admin.layouts.alert')

            	@yield('content')

          </div>
        </main>

        <!-- ### $App Screen Footer ### -->
        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
          <span>Copyright © <script>document.write(new Date().getFullYear())</script> <a href="https://www.linkedin.com/in/irfan-fakhri/" target="_blank">Irfan Fakhri</a>. All rights reserved.</span>
        </footer>
      </div>
    </div>

    <script type="text/javascript" src="{{ asset('assets/scripts/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/polyfill.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/fontawesome/js/all.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/sidebar/index.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/search/index.js') }}"></script>

    <script type="text/javascript" src="{{ asset('packages/barryvdh/elfinder/js/elfinder.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/ckeditor/adapters/jquery.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/vendor/DataTables/js/jquery.dataTables.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <script type="text/javascript">
      const cancelButton = 'mx-1 btn btn-light btn-lg'

      const swalDangerButton = swal.mixin({
          confirmButtonClass: 'mx-1 btn btn-danger btn-lg',
          cancelButtonClass: cancelButton,
          buttonsStyling: false,
      })

      const swalPrimaryButton = swal.mixin({
          confirmButtonClass: 'mx-1 btn btn-primary btn-lg',
          cancelButtonClass: cancelButton,
          buttonsStyling: false,
      })
    </script>

    @stack('scripts')

  </body>
</html>
