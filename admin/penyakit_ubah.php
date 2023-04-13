<?php
include "header.php";
$id_penyakit = $_GET["id"];
$ambil_penyakit = $koneksi->query("SELECT * FROM penyakit WHERE id_penyakit = '$id_penyakit'");
$penyakit = $ambil_penyakit->fetch_assoc();
?>
<div class="row">
	<div class="card mt-4">
		<h4 class="card-title mt-3 ms-3">Ubah Data Penyakit</h4>
		<p class="card-category ms-3">Masukkan Data Penyakit</p>

		<div class="card-body">
			<div class="row">
				<div class="col-sm-8">
					<form method="post">
						<div class="mb-3">
							<label class="form-label">Kode Penyakit</label>
							<input type="text" class="form-control" name="kode_penyakit" value="<?php echo $penyakit["kode_penyakit"]; ?>" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Nama Penyakit</label>
							<input type="text" class="form-control" name="nama_penyakit" value="<?php echo $penyakit["nama_penyakit"]; ?>" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Solusi</label>
							<input type="text" class="form-control" value="<?php echo $penyakit['solusi'] ?>" name="solusi" required="required">
						</div>
						<div class="d-grid gap-2 d-md-block">
							<button class="btn btn-primary" name="simpan">Simpan</button>
						</div>
					</form>

				</div>
			</div>

		</div>
	</div>
</div>

<?php
if (isset($_POST["simpan"])) {
	$kode_penyakit = $_POST["kode_penyakit"];
	$nama_penyakit = $_POST["nama_penyakit"];
	$solusi = $_POST["solusi"];

	$koneksi->query("UPDATE penyakit SET
		kode_penyakit = '$kode_penyakit', nama_penyakit = '$nama_penyakit', solusi='$solusi' WHERE id_penyakit = '$id_penyakit'");

	echo "<script>alert ('Data berhasil diubah')</script>";
	echo "<script>location = 'penyakit_tampil.php'</script>";
}


include "footer.php";
?>