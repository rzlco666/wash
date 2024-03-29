<?php
//Inisialisasi nilai variabel awal
$jumlah = null;
$bln_laporan = "";
if ($saldo_bulan != null) {
	foreach ($saldo_bulan as $item) {
		$jum = $item->jumlah;
		$jumlah .= "$jum" . ", ";

		$jur = $item->bulan;
		$bln_laporan .= "'$jur'" . ", ";
	}
}else{
	$jumlah = "0, ";
	$bln_laporan = "'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'";
}
?>
<script>
	var options = {
		chart: {
			type: 'bar',
			fontFamily: "Inter",
			offsetX: -26,
			stacked: false,
			height: 265,
			width: '102%',
			toolbar: {
				show: false
			}
		},
		dataLabels: {
			enabled: false
		},
		series: [{
			name: 'Pendapatan',
			data: [<?= $jumlah; ?>]
		}],
		plotOptions: {
			bar: {
				horizontal: false,
				columnWidth: '20%',
				endingShape: 'rounded'
			},
		},
		colors: ['#5066E1'],
		xaxis: {
			categories: [<?= $bln_laporan; ?>],
		},
		tooltip: {
			y: {
				formatter: function (val) {
					return "Rp " + val + ",-";
				}
			}
		}
	}

	var chart = new ApexCharts(document.querySelector("#saless"), options);

	chart.render();

</script>

<?php
//Inisialisasi nilai variabel awal
$jumlah = null;
$jml = null;
$bln_laporan = "";
if ($perbandingan != null) {
	foreach ($perbandingan as $item) {
		$mob = $item->jumlah_mobil;
		$jumlah .= "$mob" . ", ";

		$mot = $item->jumlah_motor;
		$jml .= "$mot" . ", ";

		$jur = $item->bulan;
		$bln_laporan .= "'$jur'" . ", ";
	}
}else{
	$jumlah = "0, ";
	$jml = "0, ";
	$bln_laporan = "'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'";
}
?>
<script>
	var options = {
		chart: {
			type: 'bar',
			fontFamily: "Inter",
			toolbar: {
				show: false
			}
		},
		series: [{
			name: 'Mobil',
			data: [<?= $jumlah; ?>]
		}, {
			name: 'Motor',
			data: [<?= $jml; ?>]
		}],
		plotOptions: {
			bar: {
				horizontal: false,
				columnWidth: '50%',
				endingShape: 'rounded'
			},
		},
		colors: ['#5066E1', '#FF657A'],
		dataLabels: {
			enabled: false
		},
		stroke: {
			show: true,
			width: 8,
			colors: ['transparent']
		},
		grid: {
			show: false,
			padding: {
				left: 0,
				right: 0
			}
		},
		xaxis: {
			axisBorder: {
				show: false,
			},
			categories: [<?= $bln_laporan; ?>],
		},
		yaxis: {
			show: false,
		},
		fill: {
			opacity: 1
		},
		legend: {
			show: false
		}
	}

	var chart = new ApexCharts(document.querySelector("#ecommerce-activity-chartt"), options);

	chart.render();

</script>

<?php
//Inisialisasi nilai variabel awal
$jumlah = null;
$jml = null;
$bln_laporan = "";
if ($perbandingan_pendapatan != null){
	foreach ($perbandingan_pendapatan as $item) {
		$mob = $item->jumlah_mobil;
		$jumlah .= "$mob";

		$mot = $item->jumlah_motor;
		$jml .= "$mot" . ", ";

		$jur = $item->bulan;
		$bln_laporan .= "'$jur'";
	}
}else{
	$jumlah = 0;
	$jml = 0;
	$bln_laporan = "'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'";
}
?>
<script>
	var options = {
		chart: {
			type: 'donut',
			// fontFamily: chartFontStyle,
		},
		series: [<?= $jumlah; ?>,<?= $jml; ?>],
		labels: ['Mobil', 'Motor'],
		colors: ['#5066E1', '#FF657A'],
		track: {
			background: "#cccccc"
		},
		dataLabels: {
			enabled: false
		},
		stroke: {
			colors: ['#5066E1', '#FF657A'],
		},
		plotOptions: {
			pie: {
				expandOnClick: true,
				donut: {
					labels: {
						show: true,
						value: {
							formatter: function (val) {
								return 'Rp' + val;
							}
						}
					}
				}
			}
		},
		tooltip: {
			shared: false,
			y: {
				formatter: function (val) {
					return 'Rp' + val;
				}
			}
		},
		legend: {
			show: false
		}
	}

	var chart = new ApexCharts(document.querySelector("#monthly-saless"), options);

	chart.render();

</script>
