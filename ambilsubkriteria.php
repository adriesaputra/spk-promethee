<?php
include "koneksi.php";
$kriteria = $_GET['kriteria'];
$kota = mysql_query("SELECT * FROM subkriteria WHERE id_kriteria='$kriteria' order by id_subkriteria");
echo "<option>-- Pilih Nilai --</option>";
while($k = mysql_fetch_array($kota)){
    echo "<option value=\"".$k['id_subkriteria']."\">".$k['nama_subkriteria']."</option>\n";
}
?>
