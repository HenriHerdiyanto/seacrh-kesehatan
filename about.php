<?php
require('koneksi.php');
session_start();
if (isset($_SESSION['username'])) {
    if (isset($_SESSION['level'])) {
        $user = $_SESSION['username'];
        $level = $_SESSION['level'];
        $sql_user = mysqli_query($koneksi, "SELECT * FROM user where username = '$user' && level = '$level'");
        $row_user = mysqli_num_rows($sql_user);
        $row = mysqli_fetch_assoc($sql_user);
        $id_user = $row['id'];
        // echo $id_user;
        if ($row_user != 1) {
            header('location: logout.php');
        }
    } else {
        header('location: index.php');
    }
} else {
    header('location: index.php');
}

if (isset($_POST['submit'])) {
    $gejala = $_POST['gejala'];
    echo $gejala;
    echo "<script type='text/javascript'>alert('" . $gejala . "');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Cek Penyakit</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

    <!-- ======= Header ======= -->
    <header id="header" style="background-color: #284cf0;">
        <div class="d-flex flex-column">

            <div class="profile">
                <img src="assets/img/profile-img.jpg" alt="" class="img-fluid rounded-circle">
                <h1 class="text-light"><a href="index.html"><?php echo $user . "<br>" . "(" . $level . ")" ?></a></h1>
                <div class="social-links mt-3 text-center">

                </div>
            </div>

            <nav id="navbar" class="nav-menu navbar">
                <ul>
                    <li><a href="user.php" class="nav-link scrollto "><i class="bx bx-home"></i> <span>Home</span></a></li>
                    <li><a href="about.php" class="nav-link scrollto active"><i class="bx bx-user"></i> <span>About</span></a></li>
                    <li><a href="history.php" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>History</span></a></li>
                    <li><a href="logout.php" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Logout</span></a></li>
                </ul>
            </nav><!-- .nav-menu -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <main id="main">
        <nav class="navbar bg-primary">
            <div class="container-fluid">
                <b class="navbar-brand text-white">SISTEM PAKAR DIAGNOSA PENYAKIT MALARIA</b>
            </div>
        </nav>
        <!-- ======= Resume Section ======= -->
        <section id="resume" class="resume">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="resume-item pb-0">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title text-center">Apa itu Malaria ?</h2><br><br>
                                    <p align="justify">Malaria merupakan penyakit yang disebabkan oleh parasit plasomodium. penyakit ini ditularkan melalui gigitan nyamuk Anopheles betina yang terinfeksi parasit tersebut. gigitan nyamuk membuat parasit masuk, mengendap di organ hati, dan menginfeksi sel darah merah. selain melalui gigitan nyamuk. terdapat beberapa kondisi yang menyebabkan malaria dapat menyebar menjangkit manusia seperti melalui donor darah organ, transfusi darah , berbagi pemakaian jarum suntik, dan janin yang terinfeksi dari ibu nya. di indonesia penyakit ini tergolong endemi karna terdapat beberapa daerah yang masih banyak menderita malaria terutama di wilayah maluku, nusa tenggara timur sulawesi papua, papua barat, serta di sebagian wilayah kalimantan dan sumatra</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <center>
                            <div class="card my-4" style="width: 18rem; height: 200px;">
                                <div class="card-body">
                                    <h4 class="text-center card-title">Lakukan Diagnosa</h4>
                                    <center><a class="btn btn-primary w-100" style="margin-top: 20%;" href="user.php">Diagnosa Sekarang</a></center>
                                </div>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Resume Section -->
    </main>
    <!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/typed.js/typed.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>