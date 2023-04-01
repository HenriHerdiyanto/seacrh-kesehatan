<?php 
include "header.php";


//mengambil data dari database berdasarkan id yang dipilih
$ambil_admin = $koneksi -> query("SELECT * FROM user WHERE id_user = '$id_admin'");
$admin = $ambil_admin -> fetch_assoc();

// echo "<pre>";
// print_r ($admin);
// echo "</pre>";

?>
<div class="row">
	<div class="card mt-4">
		<h4 class="card-title mt-3 ms-3">Ubah Profil</h4>
		<p class="card-category ms-3">Masukkan Data Yang Ingin Diubah</p>

		<div class="card-body">
			<form method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-6 col-md-5 col-lg-6">
						<div class="mb-3">
							<label class="form-label">Nama</label>
							<input type="text" class="form-control" name="nama_user" value="<?php echo $admin["nama_user"] ?>">
						</div>
						<div class="mb-3">
							<label class="form-label">No Identitas</label>
							<input type="text" class="form-control" name="no_identitas_user" value="<?php echo $admin["no_identitas_user"] ?>">
						</div>
						<div class="mb-3">
							<label class="form-label">Email</label>
							<input type="text" class="form-control" name="email_user" value="<?php echo $admin["email_user"] ?>">
						</div>
						<div class="mb-3">
							<label class="form-label">No HP</label>
							<input type="text" class="form-control" name="no_hp_user" value="<?php echo $admin["no_hp_user"] ?>">
						</div>

					</div>
					<div class="col-sm-6 col-md-5 col-lg-6">
						<div class="mb-3">
							<label class="form-label">Username</label>
							<input type="text" class="form-control" name="username_user" value="<?php echo $admin["username_user"] ?>">
						</div>
						<div class="mb-3">
							<label class="form-label">Password</label>
							<input type="Password" class="form-control" name="password_user">
							<p class="text-muted">Kosongkan Jika Password Tidak Diubah</p>
						</div>
						<div class="mb-3">
							<label class="form-label">Foto</label>
							<img src="../assets/img/<?php echo $admin["foto_user"]; ?>" class="mb-1" width="100">
							<input type="file" class="form-control" name="foto_user">

						</div>
					</div>
				</div>
				<div class="d-grid gap-2 d-md-block">
					<button class="btn btn-primary" name="simpan">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 	
if (isset($_POST["simpan"])) {
	$nama = $_POST["nama_user"];
	$email = $_POST["email_user"];
	$identitas = $_POST["no_identitas_user"];
	$hp = $_POST["no_hp_user"];
	$user = $_POST["username_user"];
	$password = $_POST["password_user"];


	$foto = $_FILES["foto_user"] ["name"];
	$file = $_FILES["foto_user"] ["tmp_name"];

		//merubah data tanpa merubah file
	if (empty($file)) {
		if (empty ($_POST["password_user"])) {
			$koneksi -> query("UPDATE user SET 
				nama_user = '$nama',
				email_user = '$email',
				no_identitas_user = '$identitas',
				no_hp_user = '$hp',
				username_user = '$user' WHERE id_user = '$id_admin'");
		}
		else{
			$password = sha1($password);
			$koneksi -> query("UPDATE user SET 
				nama_user = '$nama',
				email_user = '$email',
				no_identitas_user = '$identitas',
				no_hp_user = '$hp',
				username_user = '$user',
				password_user = '$password' WHERE id_user = '$id_admin'");
		}

	}

		//merubah data sekaligus merubah file
	else{
		if (empty($_POST["password_user"])) {
			$koneksi -> query("UPDATE user SET
				nama_user = '$nama',
				email_user = '$email',
				no_identitas_user = '$identitas',
				no_hp_user = '$hp',
				username_user = '$user',
				foto_user = '$foto' WHERE id_user = '$id_admin'");

			move_uploaded_file($file, "../assets/img/$foto");
		}
		else{
			$password = sha1($password);
			$koneksi -> query("UPDATE user SET
				nama_user = '$nama',
				email_user = '$email',
				no_identitas_user = '$identitas',
				no_hp_user = '$hp',
				username_user = '$user',
				password_user = '$password',
				foto_user = '$foto' WHERE id_user = '$id_admin'");

			move_uploaded_file($file, "../assets/img/$foto");
		}
	}
	$ambil_admin = $koneksi -> query("SELECT * FROM user WHERE id_user = '$id_admin'");
	$admin = $ambil_admin -> fetch_assoc();
	$_SESSION['admin'] = $admin;

	echo "<script>alert ('Data berhasil diubah')</script>";
	echo "<script>location = 'profil.php'</script>";
}



include "footer.php";
?>