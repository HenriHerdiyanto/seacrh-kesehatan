<?php
include "header.php";

$penyakit = array();
$ambil_penyakit = $koneksi->query("SELECT * FROM penyakit");
while ($tiap_penyakit = $ambil_penyakit->fetch_assoc()) {
  $penyakit[] = $tiap_penyakit;
}

?>
<div class="row">
  <div class="card mt-4">
    <h4 class="card-title mt-3 ms-3">Daftar penyakit</h4>
    <p class="card-category ms-3">Data penyakit</p>

    <div class="card-body">
      <div class="d-grid gap-2 d-md-flex justify-content-md-end pb-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          <i class="bi bi-plus"></i> Tambah
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title mt-3 ms-3">Input Data Penyakit</h4>
              </div>
              <div class="modal-body">
                <form method="post">
                  <div class="mb-3">
                    <label class="form-label">Kode Penyakit</label>
                    <input type="text" class="form-control" name="kode_penyakit" required="required">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Nama Penyakit</label>
                    <input type="text" class="form-control" name="nama_penyakit" required="required">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Solusi</label>
                    <input type="text" class="form-control" name="solusi" required="required">
                  </div>
                  <div class="d-grid gap-2 d-md-block text-end">
                    <button class="btn btn-primary" name="simpan">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </form>
                <?php

                if (isset($_POST["simpan"])) {
                  $kode_penyakit = $_POST["kode_penyakit"];
                  $nama_penyakit = $_POST["nama_penyakit"];
                  $solusi = $_POST["solusi"];

                  $koneksi->query("INSERT INTO penyakit(kode_penyakit, nama_penyakit, solusi) VALUES ('$kode_penyakit','$nama_penyakit', '$solusi')");
                  echo "<script>alert ('Data berhasil ditambahkan')</script>";
                  echo "<script>location = 'penyakit_tampil.php'</script>";
                }

                ?>
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
              <th>Kode Penyakit</th>
              <th>Nama Penyakit</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($penyakit as $key => $value) : ?>

              <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $value["kode_penyakit"]; ?></td>
                <td><?php echo $value["nama_penyakit"]; ?></td>
                <td>

                  <a href="penyakit_ubah.php?id=<?php echo $value["id_penyakit"]; ?>" class="btn-sm btn btn-primary text-white" data-bs-toggle="tooltip" title="Ubah">
                    <span class="bi bi-pencil-square"></span>
                  </a>
                  <a href="penyakit_hapus.php?id=<?php echo $value["id_penyakit"]; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" class="btn-sm btn btn-danger" data-bs-toggle="tooltip" title="Hapus">
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