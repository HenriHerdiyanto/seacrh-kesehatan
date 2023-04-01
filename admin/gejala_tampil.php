<?php
include "header.php";

$gejala = array();
$ambil_gejala = $koneksi->query("SELECT * FROM gejala LEFT JOIN penyakit ON gejala.id_penyakit = penyakit.id_penyakit");
while ($tiap_gejala = $ambil_gejala->fetch_assoc()) {
  $gejala[] = $tiap_gejala;
}
$penyakit = array();
$ambil_penyakit = $koneksi->query("SELECT * FROM penyakit");
while ($tiap_penyakit = $ambil_penyakit->fetch_assoc()) {
  $penyakit[] = $tiap_penyakit;
}
?>
<div class="row">
  <div class="card mt-4">
    <h4 class="card-title mt-3 ms-3">Daftar Gejala</h4>
    <p class="card-category ms-3">Data Gejala Sakit</p>

    <div class="card-body">
      <div class="d-grid gap-2 d-md-flex justify-content-md-end pb-3">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end pb-3">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="bi bi-plus"></i> Tambah Gejala
          </button>

          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title mt-3 ms-3">Input Data Gejala</h4>
                </div>
                <div class="modal-body">
                  <form method="post">
                    <div class="mb-3">
                      <label class="form-label">Penyakit</label>
                      <select class="form-control" name="penyakit" required="required">
                        <option value="">--Pilih Penyakit</option>
                        <?php foreach ($penyakit as $key => $value) : ?>
                          <option value="<?php echo $value["id_penyakit"]; ?>"><?php echo $value["kode_penyakit"]; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Kode Gejala</label>
                      <input type="text" class="form-control" name="kode_gejala" required="required">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Nama Gejala</label>
                      <input type="text" class="form-control" name="nama_gejala" required="required">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Pertanyaan</label>
                      <input type="text" class="form-control" name="pertanyaan" required="required">
                    </div>
                    <div class="d-grid gap-2 d-md-block text-end">
                      <button class="btn btn-primary" name="simpan">Simpan</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </form>
                  <?php

                  if (isset($_POST["simpan"])) {
                    $penyakit = $_POST["penyakit"];
                    $kode_gejala = $_POST["kode_gejala"];
                    $nama_gejala = $_POST["nama_gejala"];
                    $pertanyaan = $_POST["pertanyaan"];


                    $koneksi->query("INSERT INTO gejala(id_penyakit,kode_gejala,nama_gejala,pertanyaan) VALUES ('$penyakit','$kode_gejala','$nama_gejala','$pertanyaan')");
                    echo "<script>alert ('Data ditambahkan')</script>";
                    echo "<script>location = 'gejala_tampil.php'</script>";
                  }

                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="table table-responsive">
        <table id="datatabel" class="table table-bordered table-striped table-sm table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Penyakit</th>
              <th>Kode Gejala</th>
              <th>Nama Gejala</th>
              <th>Pertanyaan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($gejala as $key => $value) : ?>

              <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $value["kode_penyakit"]; ?></td>
                <td><?php echo $value["kode_gejala"]; ?></td>
                <td><?php echo $value["nama_gejala"]; ?> </td>
                <td><?php echo $value["pertanyaan"]; ?> </td>
                <td>
                  <a href="gejala_ubah.php?id=<?php echo $value["id_gejala"]; ?>" class="btn-sm btn btn-primary text-white" data-bs-toggle="tooltip" title="Ubah">
                    <span class="bi bi-pencil-square"></span>
                  </a>
                  <a href="gejala_hapus.php?id=<?php echo $value["id_gejala"]; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" class="btn-sm btn btn-danger" data-bs-toggle="tooltip" title="Hapus">
                    <span class="bi bi-trash-fill"></span>
                  </a>
                </td>
              </tr>

            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php
include "footer.php";
?>