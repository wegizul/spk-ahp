<?php

include('config.php');
include('fungsi.php');

if (isset($_POST['submit'])) {
	$jenis = $_POST['jenis'];
	$m    = getJumlahKriteria();

	// jumlah kriteria
	if ($jenis == 'kriteria') {
		$n		= getJumlahKriteria();
	} else {
		$n		= getJumlahAlternatif();
	}

	// memetakan nilai ke dalam bentuk matrik
	// x = baris
	// y = kolom
	$matrik = array();
	$urut 	= 0;

	for ($x = 0; $x <= ($n - 2); $x++) {
		for ($y = ($x + 1); $y <= ($n - 1); $y++) {
			$urut++;
			$pilih	= "pilih" . $urut;
			$matrik[$x][$y] = $_POST[$pilih];
			$matrik[$y][$x] = 1 / $_POST[$pilih];

			if ($jenis == 'kriteria') {
				inputDataPerbandinganKriteria($x, $y, $matrik[$x][$y]);
			} else {
				inputDataPerbandinganAlternatif($x, $y, ($jenis - 1), $matrik[$x][$y]);
			}
		}
	}

	for ($j = 0; $j < $m; $j++) {
		for ($x = 0; $x <= ($n - 2); $x++) {
			for ($y = ($x + 1); $y <= ($n - 1); $y++) {
				$urut++;
				$pilih  = getNilaiPerbandinganAlternatif($x, $y, ($j + 1));
				$matrik[$x][$y] = $pilih;
				$matrik[$y][$x] = 1 / $pilih;
			}
		}

		// diagonal --> bernilai 1
		for ($i = 0; $i <= ($n - 1); $i++) {
			$matrik[$i][$i] = 1;
		}

		// inisialisasi jumlah tiap kolom dan baris kriteria
		$jmlmpb = array();
		$jmlmnk = array();
		$jmlmnk2 = array();
		for ($i = 0; $i <= ($n - 1); $i++) {
			$jmlmpb[$i] = 0;
			$jmlmnk[$i] = 0;
			$jmlmnk2[$i] = 0;
		}

		// menghitung jumlah pada kolom kriteria tabel perbandingan berpasangan
		for ($x = 0; $x <= ($n - 1); $x++) {
			for ($y = 0; $y <= ($n - 1); $y++) {
				$value    = $matrik[$x][$y];
				$jmlmpb[$y] += $value;
			}
		}

		// menghitung jumlah pada baris kriteria tabel nilai kriteria
		// matrikb merupakan matrik yang telah dinormalisasi
		for ($x = 0; $x <= ($n - 1); $x++) {
			for ($y = 0; $y <= ($n - 1); $y++) {
				$matrikb[$x][$y] = $matrik[$x][$y] / $jmlmpb[$y];
				$value  = $matrikb[$x][$y];
				$jmlmnk[$x] += $value;
				$jmlmnk2[$y] += $value;
			}

			// nilai eigen vektor
			$ev[$x]   = $jmlmnk[$x] / $n;

			if ($jenis != 'kriteria') {
				$id_kriteria  = getKriteriaID($j);
				$id_alternatif  = getAlternatifID($x);
				inputAlternatifPV($id_alternatif, $id_kriteria, $ev[$x]);
			}
			$j + 1;
		}
	}

	if ($jenis == 'kriteria') {
		header('Location: ../../index.php?page=akriteria');
	} else {
		header('Location: ../../index.php?page=aalternatif');
	}
}
