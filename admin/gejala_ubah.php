<?php
include "header.php";
//data penyakit
$penyakit = array();
$ambil_penyakit = $koneksi->query("SELECT * FROM penyakit");
while ($tiap_penyakit = $ambil_penyakit->fetch_assoc()) {
	$penyakit[] = $tiap_penyakit;
}
//id gejala
$id_gejala = $_GET["id"];

//data gejala berdasarkan id
$ambil_gejala = $koneksi->query("SELECT * FROM gejala WHERE id_gejala = '$id_gejala'");
$gejala = $ambil_gejala->fetch_assoc();

// echo "<pre>";
// print_r ($gejala);
// echo "</pre>";

?>

<div class="row">
	<div class="card mt-4">
		<h4 class="card-title mt-3 ms-3">Input Data Gejala</h4>
		<p class="card-category ms-3">Masukkan Data Gejala</p>

		<div class="card-body">
			<div class="row">
				<div class="col-sm-8">
					<form method="post">
						<div class="mb-3">
							<label class="form-label">Penyakit</label>
							<select class="form-control" name="penyakit" required="required">
								<!-- <option value="">--Pilih penyakit</option> -->
								<?php foreach ($penyakit as $key => $value) : ?>
									<option value="<?php echo $value["id_penyakit"]; ?>" <?php if ($value["id_penyakit"] == $gejala["id_penyakit"]) {
																								echo 'selected';
																							} ?>><?php echo $value["kode_penyakit"]; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Kode gejala</label>
							<input type="text" class="form-control" name="kode_gejala" value="<?php echo $gejala["kode_gejala"]; ?>" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Nama gejala</label>
							<input type="text" class="form-control" name="nama_gejala" value="<?php echo $gejala["nama_gejala"]; ?>" required="required">
						</div>
						<div class="mb-3">
							<label class="form-label">Pertanyaan</label>
							<input type="text" class="form-control" name="pertanyaan" value="<?php echo $gejala["pertanyaan"]; ?>" required="required">
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
	//mendapatkan data inputan dari formulir
	$penyakit = $_POST["penyakit"];
	$kode = $_POST["kode_gejala"];
	$nama = $_POST["nama_gejala"];
	$pertanyaan = $_POST["pertanyaan"];


	$koneksi->query("UPDATE gejala SET
		id_penyakit = '$kab',
		kode_gejala = '$kode',
		nama_gejala = '$nama' WHERE id_gejala = '$id_gejala'");

	echo "<script>alert ('Data diubah')</script>";
	echo "<script>location = 'gejala_tampil.php'</script>";
}


include "footer.php";
?>