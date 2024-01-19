<?php
	include 'koneksi.php';
	$kriteria = $_POST['kriteria'];
 
	echo "<option value=''>Pilih Nilai</option>";
 
	$query = mysqli_query($koneksi, "SELECT * FROM subkriteria WHERE id_kriteria='$kriteria' ORDER BY bobot DESC");
	
	while ($row = mysqli_fetch_array($query)) {
		echo "<option value='".$row['id_subkriteria']."-".$row['bobot'] ."'>" . $row['nama_subkriteria'] . "</option>";
	}
?>