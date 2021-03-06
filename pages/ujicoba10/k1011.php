<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/libs/css/style.css">
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../../assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="../../assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="../../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Uji Coba</title>

</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="../../index.php">Uji Coba</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="index.php">Home</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="../../index.php"><i class="fa fa-fw fa-user-circle"></i>Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-file"></i>Dataset</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="data_training.php">Data Training</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="data_testing.php">Data Testing</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="../prepross.php"><i class="fab fa-fw fa-wpforms"></i>Preprossesing</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="../tf_idf.php"><i class="fab fa-fw fa-wpforms"></i>TF IDF</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../df_threshold.php"><i class="fas fa-fw fa-table"></i>DF Thresholding</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="../uji_coba.php"><i class="fas fa-fw fa-columns"></i>Uji Coba</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../validasi.php"><i class="fas fa-fw fa-chart-pie"></i>Validasi</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Klasifikasi Genre Cerita dengan Multinomial Naive Bayes Classifier dan Menggunakan Reduksi Fitur DF Thresholding</h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row text-right">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Percobaan ke-</button>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="k101.php">Percobaan 1</a></li>
                                  <li><a class="dropdown-item" href="k1011.php">Percobaan 2</a></li>
                                  <li><a class="dropdown-item" href="k1012.php">Percobaan 3</a></li>
                                  <li><a class="dropdown-item" href="k1013.php">Percobaan 4</a></li>
                                  <li><a class="dropdown-item" href="k1014.php">Percobaan 5</a></li>
                                  <li><a class="dropdown-item" href="k1015.php">Percobaan 6</a></li>
                                  <li><a class="dropdown-item" href="k1016.php">Percobaan 7</a></li>
                                  <li><a class="dropdown-item" href="k1017.php">Percobaan 8</a></li>
                                  <li><a class="dropdown-item" href="k1018.php">Percobaan 9</a></li>
                                  <li><a class="dropdown-item" href="k1019.php">Percobaan 10</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Form Uji Coba K = 10 Without DF Thresholding Percobaan ke-2</h5>
                                <div class="card-body">
                                    <form id="validationform" data-parsley-validate="" novalidate="" name="input" method="POST" action="k1011a.php">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-left">Blurb Cerita</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <textarea required="" name="inputan" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <input type="submit" name="submit" value="Hitung" class="btn btn-space btn-primary" role="button">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                <br>
                <br>
                                    <!-- ============================================================== -->
                <div class="row">
                    <br>
                </div>
                </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="../../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="../../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="../../assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="../../assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="../../assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="../../assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="../../assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="../../assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="../../assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="../../assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="../../assets/libs/js/dashboard-ecommerce.js"></script>

    <script type="text/javascript" src="../../assets/vendor/DataTables/media/js/jquery.js"></script>
    <script type="text/javascript" src="../../assets/vendor/DataTables/media/js/jquery.dataTables.js"></script>
    <!--<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">-->
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/DataTables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="../../assets/vendor/DataTables/media/css/dataTables.bootstrap.css">

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
            "ordering": false
        });
    });
    </script>
</body>
 
</html>