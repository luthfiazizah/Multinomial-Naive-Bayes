<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Klasifikasi Text Mining</title>
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
                <a class="navbar-brand" href="index.php">Klasifikasi Text Mining</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user mr-2"></i></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
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
                    <a class="d-xl-none d-lg-none" href="index.html">Home</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="index.php"><i class="fa fa-fw fa-user-circle"></i>Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-file"></i>Dataset</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/data_training.php">Data Training</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/data_testing.php">Data Testing</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="pages/prepross.php"><i class="fab fa-fw fa-wpforms"></i>Preprossesing</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="pages/tf_idf.php"><i class="fab fa-fw fa-wpforms"></i>TF IDF</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pages/df_threshold.php"><i class="fas fa-fw fa-table"></i>DF Thresholding</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pages/uji_coba.php"><i class="fas fa-fw fa-columns"></i>Uji Coba</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pages/validasi.php"><i class="fas fa-fw fa-chart-pie"></i>Validasi</a>
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
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h3>HOME</h3>
                        <p>Aplikasi berbasis web ini adalah untuk penelitian skripsi yang berjudul "Metode Multinomial Naive Bayes Classifier dan Reduksi Fitur menggunakan DF Thresholding untuk Klasifikasi Blurb pada Media Berbagi Cerita Online"</p>
                        <p>Berikut ini tahapan-tahapan dalam penelitian ini.</p>
                            <div class="tab-regular">
                                <ul class="nav nav-tabs nav-fill" id="myTab7" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab-justify" data-toggle="tab" href="#home-justify" role="tab" aria-controls="home" aria-selected="true">Preprossesing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab-justify" data-toggle="tab" href="#profile-justify" role="tab" aria-controls="profile" aria-selected="false">TF IDF</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab-justify" data-toggle="tab" href="#contact-justify" role="tab" aria-controls="contact" aria-selected="false">DF Threholding</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="about-tab-justify" data-toggle="tab" href="#about-justify" role="tab" aria-controls="about" aria-selected="false">Multinomial Naive Bayes</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent7">
                                    <div class="tab-pane fade show active" id="home-justify" role="tabpanel" aria-labelledby="home-tab-justify">
                                        <p>Preprossesing adalah tahapan awal dari analisis penelitian ini. Tahapan yang dilakukan dalam proses ini adalah sebagai berikut:</p>
                                        <ul>
                                            <li><b>Case Folding</b> adalah tahap mengubah semua huruf menjadi huruf kecil dan menghapus karakter lain selain huruf. </li>
                                            <li><b>Tokenizing</b> adalah tahap pemenggalan kata dalam suatu dokumen menjadi potongan-potongan kata yang berdiri sendiri yang disebut term.</li>
                                            <li><b>Filtering</b> adalah tahap mengambil kata-kata penting atau menghilangkan kata tidak penting dalam dokumen berdasarkan dalam kata-kata dalam stoplist.</li>
                                            <li><b>Stemming</b> adalah tahap menghapus imbuhan dalam kata. Sehingga dari proses ini akan didapat kata dasar. Tahapan stemming dalam penelitian ini menggunakan algoritma Nazief dan Adriani.</li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="profile-justify" role="tabpanel" aria-labelledby="profile-tab-justify">
                                        <p>TF IDF atau <i>Term Frequency - Inverse Document Frequency</i> adalah perhitungan yang dibutuhkan dalam proses pembobotan kata.</p>
                                        <li><i><b>Term Frequency</b> (TF)</i> adalah banyaknya kata atau <i>term</i> yang ada dalam suatu dokumen.</li>
                                            <p>Untuk menghitung persamaan TF adalah sebagai berikut:</p>
                                            <h3>TF(d,t) = f(d,t)</h3>
                                            <p>Dimana f(d,t) adalah jumlah kemunculan t (term) dalam d (dokumen).</p>
                                        <li><i><b>Inverse Document Frequency</b> (IDF)</i> adalah frekuensi kemunculan kata atau <i>term</i> pada seluruh dokumen.</li>
                                            <p>Untuk menghitung IDF dihitung dengan persamaan berikut:</p>
                                            <h3>IDF(t) = log(N/df(t))</h3>
                                            <p>Dimana N adalah banyaknya dokumen dan df(t) adalah jumlah dokumen yang mengandung t (term).</p>
                                        <br>
                                        <p>Sehingga untuk menghitung pembobotan kata adalah dengan mengalikan nilai dari TF dan IDF sebagai berikut:</p>
                                        <h3>W = TF(d,t) x IDF (t)</h3>
                                    </div>
                                    <div class="tab-pane fade" id="contact-justify" role="tabpanel" aria-labelledby="contact-tab-justify">
                                        <p>DF Thresholding adalah salah satu teknik seleksi fitur yang paling sederhana namun memiliki kinerja yang cukup baik. <i>Document Frequency</i> (DF) adalah banyaknya dokumen yang mengandung <i>term</i> tertentu. <i>Term</i> yang jarang muncul memiliki kemungkinan tidak memiliki informasi. Begitu juga <i>term</i> yang sering muncul juga memiliki kemungkinan tidak memiliki informasi karena umum.</p>
                                        <p>Tahapan ini dilakukan dengan menentukan batas bawah dan batas atas pada data training berdasarkan pengamatan hasil perhitungan DF.</p>
                                    </div>
                                    <div class="tab-pane fade" id="about-justify" role="tabpanel" aria-labelledby="about-tab-justify">
                                        <p>Multinomial Naive Bayes adalah metode klasifikasi pengembangan dari Naive Bayes. Pada Naive Bayes memiliki inputan binomial yaitu hanya 0 dan 1. Dalam penelitian ini inputannya berupa angka desimal sehingga digunakan Multinomial Naive Bayes. Multinomial Naive Bayes ini memperhitungkan frekuensi setiap kata yang muncul pada dokumen.</p>
                                        <li>Untuk menghitung kelas dari dokumen d adalah sebagai berikut:</li>
                                            <h3>P(c|dokumen d) = P(c) x P(t1|c) x P(t2|c) x ... x P(tn|c)</h3>
                                            <p>Dimana P(c|dokumen d) adalah probabilitas suatu dokumen d berada di kelas c, P(c) adalah probabilitas prior dari kelas c, dan P(tn|c) adalah probabilitas kata ke-n dengan diketahui kelas c.</p>
                                        <li>Untuk menghitung probabilitas prior kelas c adalah:</li>
                                            <h3>P(c) = Nc/N</h3>
                                            <p>Dimana Nc adalah banyaknya kelas c pada seluruh dokumen dan N adalah banyaknya seluruh dokumen.</p>
                                        <li>Untuk menghitung probabilitas kata ke-n dengan menggunakan teknik <i>laplace smoothing</i> adalah:</li>
                                            <h3>P(tn|c) = (count(tn c) + 1)/(count(c) + V)</h3>
                                            <p>Dimana count(tn c) adalah jumlah term tn pada data training kelas c, count(c) adalah jumlah term di seluruh data pelatihan dengan kelas c, dan V adalah jumlah seluruh term pada data pelatihan.</p>
                                    </div>
                                </div>
                            </div>
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
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>
 
</html>