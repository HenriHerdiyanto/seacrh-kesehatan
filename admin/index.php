<?php
include "header.php";
$ambil_user = $koneksi->query("SELECT * FROM user WHERE level = 'user'");
$jumlah_user = mysqli_num_rows($ambil_user);


$ambiladmin = $koneksi->query("SELECT * FROM user WHERE level = 'admin'");
$jumlahadmin = mysqli_num_rows($ambiladmin);

?>
<div class="row">
	<div class="card mt-4">
		<h4 class="card-title mt-3 ms-3">Dashboard</h4>

		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-sm-6">
							<div class="card bg-success text-white">
								<div class="card-body text-center">
									<h2 class="card-title">Jumlah Data User</h2>
									<h2 class="card-text "><?php echo $jumlah_user ?></h2>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card bg-primary text-white">
								<div class="card-body text-center">
									<h2 class="card-title">Jumlah Data Admin</h2>
									<h2 class="card-text "><?php echo $jumlahadmin ?></h2>
								</div>
							</div>
						</div>
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
				<?php foreach ($kecamatan as $nama_kecamatan => $jumlah_menara) : ?> '<?php echo $nama_kecamatan ?>',
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
			data: [
				<?php foreach ($kecamatan as $nama_kecamatan => $jumlah_menara) : ?>
					<?php echo $jumlah_menara ?>,
				<?php endforeach ?>
			]

		}]
	});
</script>
<?php
include "footer.php";
?>