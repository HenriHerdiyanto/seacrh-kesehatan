<?php 
include "header.php";
// $ambil_menara = $koneksi -> query("SELECT * FROM menara");
// $jumlah_menara = mysqli_num_rows($ambil_menara);

// //Total Data Kecamatan
// $ambil_kecamatan = $koneksi -> query("SELECT * FROM kecamatan LEFT JOIN kabupaten ON kecamatan.id_kabupaten = kabupaten.id_kabupaten");
// $jumlah_kecamatan = mysqli_num_rows($ambil_kecamatan);

// //Total Data Pemilik menara
// $ambil_pemilik = $koneksi -> query("SELECT DISTINCT pemilik_menara FROM menara");
// $jumlah_pemilik = mysqli_num_rows($ambil_pemilik);

// $kecamatan = array();
// $ambil_kecamatan1 = $koneksi -> query("SELECT * FROM kecamatan");
// while ($tiap_kecamatan = $ambil_kecamatan1 -> fetch_assoc())
// {
// 	$id_kecamatan = $tiap_kecamatan["id_kecamatan"];
// 	$nama_kecamatan = $tiap_kecamatan["nama_kecamatan"];
// 	$ambil_menara = $koneksi -> query("SELECT COUNT(*) as jumlah FROM menara LEFT JOIN desa on menara.id_desa = desa.id_desa WHERE id_kecamatan = '$id_kecamatan'");
// 	$menara_kecamatan = $ambil_menara -> fetch_assoc();
// 	$jumlah_menara_kecamatan = $menara_kecamatan["jumlah"];
// 	$kecamatan [$nama_kecamatan] = $jumlah_menara_kecamatan;
// }
 ?>
			<div class="row">
				<div class="card mt-4">
					<h4 class="card-title mt-3 ms-3">Dashboard</h4>
					<p class="card-category ms-3">Informasi data menara</p>
					
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<div class="card text-bg-success mb-3">
									<div class="card-header">Jumlah Penyakit</div>
									<div class="card-body">
										<h5 class="card-title">Jumlah Seluruh Menara</h5>
										<h1 class="card-text">5</h1>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card text-bg-primary mb-3">
									<div class="card-header">Jumlah Gejala</div>
									<div class="card-body">
										<h5 class="card-title">Total Jumlah Kecamatan</h5>
										<h1 class="card-text">5</h1>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card text-bg-danger mb-3">
									<div class="card-header">Jumlah User</div>
									<div class="card-body">
										<h5 class="card-title">Total Jumlah Pemilik Menara</h5>
										<h1 class="card-text">5</h1>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="card chart-container pt-3">
									<h3 class="text-center">Data Menara Tiap Kecamatan</h3>
									<div id="grafik_menara_kecamatan"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
	<script type="text/javascript">
	Highcharts.chart('grafik_menara_kecamatan', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah menara di tiap kecamatan'
    },
    xAxis: {
        categories: [
        <?php foreach ($kecamatan as $nama_kecamatan => $jumlah_menara): ?>
            '<?php echo $nama_kecamatan ?>',
        <?php endforeach ?>
        ],
        crosshair: true
    },
    yAxis: {
        title: {
            useHTML: true,
            text: 'Jumlah'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Menara',
        data: 
        [
        <?php foreach ($kecamatan as $nama_kecamatan => $jumlah_menara): ?>
        <?php echo $jumlah_menara ?>,
        <?php endforeach ?>
        ]

    }]
});
</script>
<?php 
include "footer.php";
 ?>