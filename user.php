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
          <li>
            <a href="user.php" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a>
          </li>
          <!-- <li>
                        <a href="about.php" class="nav-link scrollto "><i class="bx bx-user"></i> <span>About</span></a>
                    </li> -->
          <li>
            <a href="history.php" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>History</span></a>
          </li>
          <li>
            <a href="logout.php" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Logout</span></a>
          </li>
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
            <div class="card my-4" style="width: 18rem; height: 200px;">
              <div class="card-body">
                <h4 class="text-center card-title">Lakukan Diagnosa</h4>
                <!-- <center><a class="btn btn-primary w-100" style="margin-top: 20%;" href="user.php">Diagnosa Sekarang</a></center> -->
                <!-- Button trigger modal -->
                <!-- Full screen modal -->
                <center><button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Diagnosa Sekarang</button></center>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form id="healthForm">
                          <div class="form-group">
                            <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda">
                          </div>
                          <div class="form-group mt-2">
                            <input type="number" class="form-control" id="age" placeholder="Masukkan usia Anda">
                          </div>
                          <div class="form-group mt-3">
                            <label for="symptoms">Gejala yang dialami:</label><br>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="fever">
                              <label class="form-check-label" for="fever">Demam</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="headache">
                              <label class="form-check-label" for="headache">Sakit kepala</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="fatigue">
                              <label class="form-check-label" for="fatigue">Kelelahan</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="nausea">
                              <label class="form-check-label" for="nausea">Mual</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="muscle-pain">
                              <label class="form-check-label" for="muscle-pain">Nyeri otot</label>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary mt-3">Periksa</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container mt-5">
        <div class="row">
          <div class="col-lg-12">
            <img src="assets/img/malaria.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-12">
            <h1>BAHAYA MALARIA</h1>
            <p align="justify">Malaria adalah penyakit menular yang disebabkan oleh parasit Plasmodium yang ditularkan melalui gigitan nyamuk Anopheles yang terinfeksi. Penyakit ini dapat mengancam jiwa jika tidak diobati dengan tepat. Berikut adalah beberapa bahaya dari penyakit malaria:</p>
            <ul>
              <li align="justify">Kematian: Malaria dapat menyebabkan kematian jika tidak diobati atau jika terjadi komplikasi yang serius. Malaria yang disebabkan oleh spesies Plasmodium falciparum adalah yang paling berbahaya dan dapat mempengaruhi organ tubuh seperti otak dan ginjal.</li>
              <li align="justify">Komplikasi pada organ tubuh: Malaria dapat menyebabkan komplikasi serius pada organ tubuh seperti otak (encephalopathy), paru-paru (edema paru), hati (gagal hati), ginjal (gagal ginjal), dan sistem peredaran darah (gangguan pembekuan darah).</li>
              <li align="justify">Anemia: Infeksi malaria dapat menyebabkan anemia yang parah. Parasit malaria hidup dalam sel darah merah dan menghancurkannya, menyebabkan penurunan jumlah sel darah merah yang sehat. Anemia dapat menyebabkan kelemahan, kelelahan, dan kesulitan dalam melakukan aktivitas sehari-hari.</li>
              <li align="justify">Efek pada kehamilan: Infeksi malaria pada wanita hamil dapat menyebabkan komplikasi serius seperti keguguran, kelahiran prematur, berat badan lahir rendah pada bayi, dan anemia pada ibu hamil.</li>
              <li align="justify">Penyebaran yang cepat: Malaria dapat menyebar dengan cepat dalam populasi jika tidak ada langkah-langkah pengendalian yang efektif. Nyamuk Anopheles yang terinfeksi malaria dapat menggigit orang sehat dan menyebarkan parasit ke orang lain.</li>
            </ul>
            <p align="justify">Penting untuk diingat bahwa pencegahan dan pengobatan yang tepat sangat penting dalam mengatasi penyakit malaria. Upaya pencegahan meliputi penggunaan kelambu berinsektisida, penggunaan obat anti-malaria profilaksis, pengendalian nyamuk vektor, dan peningkatan kesadaran akan tanda dan gejala malaria. Jika Anda mengalami gejala seperti demam tinggi, menggigil, sakit kepala parah, mual, muntah, atau diare setelah mengunjungi daerah yang endemik malaria, segeralah mencari perawatan medis untuk diagnosis dan pengobatan yang tepat.</p>
          </div>
        </div>
      </div>

    </section>
    <!-- End Resume Section -->
  </main>
  <!-- End #main -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#healthForm').submit(function(event) {
        event.preventDefault();

        var fever = $('#fever').is(':checked');
        var headache = $('#headache').is(':checked');
        var fatigue = $('#fatigue').is(':checked');
        var nausea = $('#nausea').is(':checked');
        var musclePain = $('#muscle-pain').is(':checked');

        var checkedSymptomsCount = [fever, headache, fatigue, nausea, musclePain].filter(Boolean).length;

        if (checkedSymptomsCount > 3) {
          alert('Anda terdeteksi terkena sakit malaria. segera lakukan test berikut untuk mengetahui kamu terkena malaria jenis apa');
          window.location.href = 'pemeriksaan.php';
        } else {
          alert('Kamu hanya terkena sakit demam biasa, segera ke dokter');
        }
      });
    });
  </script>
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