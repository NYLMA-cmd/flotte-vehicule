<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PMF TRANSPORT </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href={{ asset('vendors/feather/feather.css') }}>
    <link rel="stylesheet" href={{ asset('vendors/mdi/css/materialdesignicons.min.css') }}>
    <link rel="stylesheet" href={{ asset('vendors/ti-icons/css/themify-icons.css') }}>
    <link rel="stylesheet" href={{ asset('vendors/font-awesome/css/font-awesome.min.css') }}>
    <link rel="stylesheet" href={{ asset('vendors/typicons/typicons.css') }}>
    <link rel="stylesheet" href={{ asset('vendors/simple-line-icons/css/simple-line-icons.css') }}>
    <link rel="stylesheet" href={{ asset('vendors/css/vendor.bundle.base.css') }}>
    <link rel="stylesheet" href={{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href={{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('js/select.dataTables.min.css') }}>
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <!-- endinject -->
    <link rel="shortcut icon" href={{ asset('images/favicon.png') }} />
</head>

<body class="with-welcome-text">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="index.html">
                        <img src={{ asset('images/logo_pmf.svg') }} alt="logo" />
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
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img class="img-xs rounded-circle" src={{ asset('images/faces/face8.jpg') }}
                                alt="Profile image"> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" src={{ asset('images/faces/face8.jpg') }}
                                    alt="Profile image">
                                <p class="mb-1 mt-3 fw-semibold">Allen Moreno</p>
                                <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
                            </div>
                            <a class="dropdown-item"><i
                                    class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile
                                <span class="badge badge-pill badge-danger">1</span></a>
                            <a class="dropdown-item"><i
                                    class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i>
                                Messages</a>
                            <a class="dropdown-item"><i
                                    class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i>
                                Activity</a>
                            <a class="dropdown-item"><i
                                    class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i>
                                FAQ</a>
                            <a class="dropdown-item"><i
                                    class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="docs/documentation.html">
                            <i class="menu-icon fa fa-car"></i>
                            <span class="menu-title">Voitures</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="docs/documentation.html">
                            <i class="menu-icon fa fa-cab"></i>
                            <span class="menu-title">Séries de voitures</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="docs/documentation.html">
                            <i class="menu-icon fa fa-automobile"></i>
                            <span class="menu-title">Marques de voitures</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="docs/documentation.html">
                            <i class="menu-icon mdi mdi-file-document"></i>
                            <span class="menu-title">Dépenses</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="docs/documentation.html">
                            <i class="menu-icon mdi mdi-file-document"></i>
                            <span class="menu-title">Type de dépenses</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="docs/documentation.html">
                            <i class="menu-icon fa fa-shopping-cart"></i>
                            <span class="menu-title">Gestion des dépenses</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="docs/documentation.html">
                            <i class="menu-icon fa fa-folder"></i>
                            <span class="menu-title">Documents</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="docs/documentation.html">
                            <i class="menu-icon fa fa-folder-o"></i>
                            <span class="menu-title">Type de documents</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="docs/documentation.html">
                            <i class="menu-icon fa fa-folder-open"></i>
                            <span class="menu-title">Gestion des documents</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="home-tab">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src={{ asset('vendors/js/vendor.bundle.base.js') }}></script>
    <script src={{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src={{ asset('vendors/chart.js/chart.umd.js') }}></script>
    <script src={{ asset('vendors/progressbar.js/progressbar.min.js') }}></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src={{ asset('js/off-canvas.js') }}></script>
    <script src={{ asset('js/template.js') }}></script>
    <script src={{ asset('js/settings.js') }}></script>
    <script src={{ asset('js/hoverable-collapse.js') }}></script>
    <script src={{ asset('js/todolist.js') }}></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src={{ asset('js/jquery.cookie.js') }} type="text/javascript"></script>
    <script src={{ asset('js/dashboard.js') }}></script>
    <!-- <script src="js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
</body>

</html>
