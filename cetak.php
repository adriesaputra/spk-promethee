<style>
	table{
		font: normal 13px Arial, sans-serif;
	}
	.zui-table {
		border: solid 1px #333;
		border-collapse: collapse;
		border-spacing: 0;
		font: normal 13px Arial, sans-serif;
	}

	.zui-table thead th {
		background-color: #d6d6d2;
		border: solid 1px #333;
		color: #292928;
		padding: 10px;
		text-align: left;
		text-shadow: 1px 1px 1px #fff;
	}

	.zui-table tbody td {
		border: solid 1px #333;
		color: #333;
		padding: 10px;
		text-shadow: 1px 1px 1px #fff;
	}

	.garistipis {
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #000;
    margin: 1em 0;
    padding: 0;
	}

	.garistebal {
    display: block;
    height: 1px;
    border: 0;
    border-top: 5px solid #000;
    margin: 1em 0;
    margin-top: -15;
    padding: 0;
	}
</style>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table style="width: 100%">
		<tr>
			
			<td style="text-align: center; vertical-align: middle;"><h1>Hasil<br>Metode Promethee</h1></td>
			
		</tr>
	</table>
		<hr class="garistipis">
		<hr class="garistebal">

	<?php 
	include 'config.php';
	include 'function.php';
	?>
	<br>
	<table border="1" style="width: 100%" class="zui-table">
		<thead>
			<th>No</th>
					<th>Alternatif</th>
					<th>Leaving Flow</th>
					<th>Entering Flow</th>
					<th>Net Flow</th>
					<th>Rangking</th>
		</thead>
		<?php  
				$no=1;
					$sql=mysqli_query($koneksi, "SELECT * FROM net_flow, alternatif WHERE net_flow.id_alternatif=alternatif.id_alternatif ORDER BY nilai_nf DESC") or die(mysqli_error($koneksi));
					while($r=mysqli_fetch_array($sql))
					{
						?>
		<tbody>
			<td><?php echo $no ?></td>
							<td><?php echo $r["nama_alternatif"] ?></td>
							<td><?php echo $r["nilai_lf"]; ?></td>
							<td><?php echo $r["nilai_ef"]; ?></td>
							<td><?php echo $r["nilai_nf"]; ?></td>
							<td><?php echo $no ?></td>
		</tbody>
		<?php
		$no++; 
		}
		?>
	</table>
	<br><br>
	
	<script>
		window.print();
	</script>

</body>

</html>