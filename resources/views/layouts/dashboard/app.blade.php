<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap"
      rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Dashboard - {{ $title ? $title : 'Inventaris'}}</title>
  </head>
  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper">
        @include('layouts.dashboard.sidebar')
        <!-- Page-Content -->
        <div class="page-content-wrapper" id="page-content-wrapper">
          @include('layouts.dashboard.navbar')
          <!-- Content  -->
          <div class="content">
            <div class="container">
              <div class="content-title">
                <h1>{{ $title }}</h1>
              </div>
              <div class="content-subtitle">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      {{ $title }}
                    </li>
                  </ol>
                </nav>
              </div>
              <div class="content-body">
                <div class="row">
                  <div class="col-lg-12">
                    @yield('content')
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Conent  -->
        </div>
        <!-- End Page-Content -->
      </div>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
      crossorigin="anonymous"
    ></script>
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $(document).ready(() => {
        $(".page-content-wrapper .btn-toggler").click(function (e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
        });
        $('.select2').select2();
      });
    </script>
    <!-- <script src="js/style.js"></script> -->
  </body>
</html>
