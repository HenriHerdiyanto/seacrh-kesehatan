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
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<!-- ======= Mobile nav toggle button ======= -->
	<i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

	<!-- ======= Header ======= -->
	<header id="header" style="background-color: #284cf0;">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
			<path fill="#0099ff" fill-opacity="1" d="M0,256L288,64L576,224L864,192L1152,320L1440,192L1440,0L1152,0L864,0L576,0L288,0L0,0Z"></path>
		</svg>
		<div class="d-flex flex-column justify-content-center align-items-center">

			<h1 style="margin-top: 50%;" class="text-white"><?php echo date('H:i:s'); ?></h1>
			<?php
			$waktu = date('H:i:s');
			$hari = date('l');
			$tanggal = date('d');
			echo " <div class='text-white'>" . $hari . ", " . $tanggal . " " . bulan() . " " . date('Y') . "</div>";

			function bulan()
			{
				$bulan = date('F');
				switch ($bulan) {
					case 'January':
						$bulan = 'Januari';
						break;
					case 'February':
						$bulan = 'Februari';
						break;
					case 'March':
						$bulan = 'Maret';
						break;
					case 'April':
						$bulan = 'April';
						break;
					case 'May':
						$bulan = 'Mei';
						break;
					case 'June':
						$bulan = 'Juni';
						break;
					case 'July':
						$bulan = 'Juli';
						break;
					case 'August':
						$bulan = 'Agustus';
						break;
					case 'September':
						$bulan = 'September';
						break;
					case 'October':
						$bulan = 'Oktober';
						break;
					case 'November':
						$bulan = 'November';
						break;
					case 'December':
						$bulan = 'Desember';
						break;
					default:
						$bulan = date('F');
						break;
				}
				return $bulan;
			}
			?>


		</div>
	</header><!-- End Header -->

	<!-- ======= Hero Section ======= -->

	<main id="main">
		<nav class="navbar bg-primary">
			<div class="container-fluid">
				<b class="navbar-brand text-white">SISTEM PAKAR DIAGNOSA PENYAKIT MALARIA</b>
			</div>
		</nav>
		<?php
		if (isset($_GET['pesan'])) {
			if ($_GET['pesan'] == "gagal") {
				echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
			}
		}
		?>

		<div class="kotak_login">
			<p class="tulisan_login">Silahkan login</p>

			<form action="cek_login.php" method="post">
				<label>Username</label>
				<input type="text" name="username" class="form_login" placeholder="Username .." required="required">

				<label>Password</label>
				<input type="password" name="password" class="form_login" placeholder="Password .." required="required">

				<input type="submit" class="tombol_login" value="LOGIN">

				<br />
				<br />
				<center>
					<a class="link" href="register.php">Register</a>
				</center>
			</form>

		</div>

		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>