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
                    <li><a href="about.php" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
                    <li><a href="history.php" class="nav-link scrollto active"><i class="bx bx-file-blank"></i> <span>History</span></a></li>
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

                <div class="section-title">
                    <h2>History</h2>
                </div>
                <?php
                $history = array();
                $ambil_history = $koneksi->query("SELECT * FROM history LEFT JOIN penyakit ON history.nama_penyakit = penyakit.nama_penyakit WHERE id_user = '$id_user' order by tanggal asc ");
                while ($tiap_history = $ambil_history->fetch_assoc()) {
                    $history[] = $tiap_history;
                }

                ?>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Penyakit</th>
                                <th scope="col">Solusi</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach ($history as $key => $value) { ?>
                                <tr>

                                    <th scope="row"><?php echo $key + 1; ?></th>
                                    <td><?php echo $value['tanggal']; ?></td>
                                    <td><?php echo $value["nama_penyakit"]; ?></td>
                                    <td><?php echo $value["solusi"] ?></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
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