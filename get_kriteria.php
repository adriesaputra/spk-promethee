<?php
	include 'koneksi.php';
 
	echo "<option value=''>Pilih Kriteria</option>";
 
	$query =mysqli_query($koneksi,  "SELECT * FROM kriteria ORDER BY id_kriteria ASC");

	while ($row = mysqli_fetch_array($query)) {
		echo "<option value='" . $row['id_kriteria'] . "'>" . $row['nama_kriteria'] . "</option>";
	}
?>