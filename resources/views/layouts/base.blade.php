<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PMF TRANSPORT</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/select.dataTables.min.css') }}">

    <!-- inject:css -->
    <link href={{ asset('assets/css/select2.min.css') }} rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/side-logo.png') }} "/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-table.min.css') }}">
</head>

<body class="with-welcome-text">
    <div class="container-scroller">
        <!-- Navbar -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo_pmf.svg') }}" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item fw-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Bonjour, <span class="text-black fw-bold">PM GOSSE</span></h1>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown">
                            <img class="img-xs rounded-circle" src="{{ asset('images/faces/face8.jpg') }}" alt="Profile image">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" src="{{ asset('images/faces/face8.jpg') }}" alt="Profile image">
                                <p class="mb-1 mt-3 fw-semibold">Allen Moreno</p>
                                <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
                            </div>
                            <a class="dropdown-item" href="#">
                                <i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Mon Profil
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activité
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i> Déconnexion
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="menu-icon fa fa-car"></i>
                            <span class="menu-title">Voitures</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('series.index')}}">
                            <i class="menu-icon fa fa-automobile"></i>
                            <span class="menu-title">Séries de voitures</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('brands.index')}}">
                            <i class="menu-icon fa fa-automobile"></i>
                            <span class="menu-title">Marques de voitures</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="menu-icon fa fa-automobile"></i>
                            <span class="menu-title">Dépenses</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="menu-icon fa fa-automobile"></i>
                            <span class="menu-title">Catégorie de dépenses</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="menu-icon fa fa-automobile"></i>
                            <span class="menu-title">Gestion des dépenses</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="menu-icon fa fa-automobile"></i>
                            <span class="menu-title">Documents</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="menu-icon fa fa-automobile"></i>
                            <span class="menu-title">Type de document</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="menu-icon fa fa-automobile"></i>
                            <span class="menu-title">Gestion des documents</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="home-tab">
                                <!-- Contenu principal -->
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
                      <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2023. All rights reserved.</span>
                    </div>
                  </footer>
            </div>
        </div>
    </div>

    <!-- plugins:js -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/proBanner.js')}}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/tableExport.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-table-fr-FR.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-table-export.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>
    {{-- <script src={{asset("assets/js/chart.min.js")}}
        integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script> --}}
    @stack('script')
    <!-- End custom js for this page -->

    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

    <!-- Plugin js for this page -->
    <script src="{{ asset('vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('vendors/progressbar.js/progressbar.min.js') }}"></script>

    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>

    <!-- Custom js for this page -->
    <script src="{{ asset('js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>

</body>

</html>
