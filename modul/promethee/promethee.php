
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h2 class="m-0 text-dark">PROMETHEE</h2>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?module=home">Home</a></li>
          <li class="breadcrumb-item active">Promethee</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
           

            <div class="card-body">
            <h2>Nilai Semua Kriteria</h2>
              <table id="example" class="table table-bordered table-striped">
                <thead>
				<tr>
					<th>No</th>
					<th>Alternatif</th>
					<?php  
						$sql=mysqli_query($koneksi, "SELECT * FROM kriteria");
						while($r=mysqli_fetch_array($sql))
						{
							?>
								<th><?php echo $r["nama_kriteria"] ?></th>
							<?php 
						}
					?>
				</tr>
			</thead>
			<tbody>
			<?php  
			$no=1;
			$sql=mysqli_query($koneksi, "SELECT * FROM alternatif");
			while($r=mysqli_fetch_array($sql))
			{
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $r["nama_alternatif"] ?></td>
					<?php  
						$sql2=mysqli_query($koneksi, "SELECT * FROM kriteria");
						while($k=mysqli_fetch_array($sql2))
						{
							$sql3=mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_alternatif='$r[id_alternatif]' AND id_kriteria='$k[id_kriteria]'");
							while($n=mysqli_fetch_array($sql3))
							{
								?>
									<td><?php echo $n["nilai"] ?></td>
								<?php 
							}
						}
					?>
				</tr>
				<?php 
				$no++;
			}
			?>
			</tbody>
			</table>
			</div>
            <!-- /.card-body -->

             <div class="card-body">
            <h2>Nilai Preferensi Untuk Semua Kriteria</h2>
              <table id="example" class="table table-bordered table-striped">
                <thead>
				<tr>
					<th>No</th>
					<th>Alternatif</th>
					<?php  
						$sql=mysqli_query($koneksi, "SELECT * FROM kriteria");
						while($r=mysqli_fetch_array($sql))
						{
							?>
								<th><?php echo $r["nama_kriteria"] ?></th>
							<?php 
						}
					?>
				</tr>
			</thead>
			<tbody>
			<?php  
			$no=1;
				$sql=mysqli_query($koneksi, "SELECT DISTINCT alternatif1, alternatif2 FROM preferensi");
				while($q=mysqli_fetch_array($sql))
				{
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td>
							<?php  
								$alt1=mysqli_fetch_array(mysqli_query($koneksi, "SELECT nama_alternatif FROM alternatif WHERE id_alternatif='$q[alternatif1]'"));
								$alt2=mysqli_fetch_array(mysqli_query($koneksi, "SELECT nama_alternatif FROM alternatif WHERE id_alternatif='$q[alternatif2]'"));
								echo $alt1["nama_alternatif"]." - ".$alt2["nama_alternatif"];
							?>
						</td>
						<?php  
							$sql2=mysqli_query($koneksi, "SELECT nilai FROM preferensi WHERE alternatif1='$q[alternatif1]' AND alternatif2='$q[alternatif2]'");
							while($data=mysqli_fetch_array($sql2))
							{
								?>
									<td><?php echo $data["nilai"] ?></td>
								<?php 
							}
						?>
					</tr>
					<?php 
					$no++;
				}
			?>
			</tbody>
			</table>
			</div>
            <!-- /.card-body -->

            <div class="card-body">
            <h2>Nilai Index Preferensi</h2>
              <table id="example" class="table table-bordered table-striped">
                <thead>
				<tr>
					<th>No</th>
					<th>Alternatif</th>
					<?php  
						$sql=mysqli_query($koneksi, "SELECT * FROM alternatif");
						while($r=mysqli_fetch_array($sql))
						{
							?>
								<th><?php echo $r["nama_alternatif"] ?></th>
							<?php 
						}
					?>
				</tr>
			</thead>
			<tbody>
			<?php  
			$no=1;
			$nf=0;
			$nilai_nf=0;
			
			//kosongkan tabel lf, nf
			mysqli_query($koneksi, "DELETE FROM index_preferensi");
			mysqli_query($koneksi, "DELETE FROM leaving_flow");
			mysqli_query($koneksi, "DELETE FROM entering_flow");
			mysqli_query($koneksi, "DELETE FROM net_flow");
			$sql=mysqli_query($koneksi, "SELECT * FROM alternatif");
			while($r=mysqli_fetch_array($sql))
			{
			$lf=0;
			$nilai_index_preferensi=0;
			$nilai_lf=0;
			$index=1;
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $r["nama_alternatif"] ?></td>
					<?php  
						$sql2=mysqli_query($koneksi, "SELECT * FROM alternatif");
						while($k=mysqli_fetch_array($sql2))
						{
							$index_preferensi=0;
							
							$sql3=mysqli_query($koneksi, "SELECT * FROM preferensi WHERE alternatif1='$r[id_alternatif]' AND  alternatif2='$k[id_alternatif]'");
							while($n=mysqli_fetch_array($sql3))
							{
								$index_preferensi=$index_preferensi+$n["nilai"];
								
							}
							$jml_kriteria=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kriteria"));
							$nilai_index_preferensi=$index_preferensi/$jml_kriteria;

							//inset index preferensi
							mysqli_query($koneksi, "INSERT INTO index_preferensi (id_alternatif, indek, nilai_ip) VALUES ('$r[id_alternatif]', '$index', '$nilai_index_preferensi')") or die(mysqli_error($koneksi));
							
							?>
								<td><?php echo $nilai_index_preferensi ?></td>
							<?php 
							$lf=$lf+$nilai_index_preferensi;
							$index++;
						}
						
						$nilai_lf=$lf/($jml_kriteria-1);
						//echo $nilai_lf;
						mysqli_query($koneksi, "INSERT INTO leaving_flow (id_alternatif, nilai_lf) VALUES ('$r[id_alternatif]', '$nilai_lf')");

						//$ef=$ef+$nilai_lf;
						//$nilai_ef=$ef/($jml_kriteria-1);
						
					?>
				</tr>
				<?php 
				$no++;
			}
			
			?>
			</tbody>
			</table>
			</div>
            <!-- /.card-body -->

            <div class="card-body">
            <h2>Nilai Leaving Flow</h2>
              <table id="example" class="table table-bordered table-striped">
                <thead>
				<tr>
					<th>No</th>
					<th>Alternatif</th>
					<th>Leaving Flow</th>
				</tr>
			</thead>
			<tbody>
				<?php  
				$no=1;
					$sql=mysqli_query($koneksi, "SELECT * FROM leaving_flow, alternatif WHERE leaving_flow.id_alternatif=alternatif.id_alternatif");
					while($r=mysqli_fetch_array($sql))
					{
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $r["nama_alternatif"] ?></td>
							<td><?php echo $r["nilai_lf"]; ?></td>
						</tr>
						<?php 
						$no++;
					}
				?>
			</tbody>
			</table>
			</div>
            <!-- /.card-body -->

            <?php  
            $no=1;
            $i=1;
            $jumlah_alternatif=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM alternatif"));
            $sql_alt=mysqli_query($koneksi, "SELECT * FROM alternatif");
            while($alt=mysqli_fetch_array($sql_alt))
            {
            	$ef=0;
	            	$sql=mysqli_query($koneksi, "SELECT * FROM index_preferensi WHERE indek='$i'");
	            	while($data=mysqli_fetch_array($sql))
	            	{
	            		$ef=$ef+$data["nilai_ip"];
	            		//echo $data["nilai_ip"]."+";
	            	}
	            	//echo "<br>";
	            	$bagi=$jumlah_alternatif-1;
	            	
	            	$nilai_ef=$ef/$bagi;
	            	mysqli_query($koneksi, "INSERT INTO entering_flow (id_alternatif, indek, nilai_ef) VALUES ('$alt[id_alternatif]', '$i', '$nilai_ef')");
	            	$i++;
            }
            ?>

            <div class="card-body">
            <h2>Nilai Entering Flow</h2>
              <table id="example" class="table table-bordered table-striped">
                <thead>
				<tr>
					<th>No</th>
					<th>Alternatif</th>
					<th>Entering Flow</th>
				</tr>
			</thead>
			<tbody>
				<?php  
				$no=1;
					$sql=mysqli_query($koneksi, "SELECT * FROM entering_flow, alternatif WHERE entering_flow.id_alternatif=alternatif.id_alternatif") or die(mysqli_error($koneksi));
					while($r=mysqli_fetch_array($sql))
					{
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $r["nama_alternatif"] ?></td>
							<td><?php echo $r["nilai_ef"]; ?></td>
						</tr>
						<?php 
						$no++;
					}
				?>
			</tbody>
			</table>
			</div>
            <!-- /.card-body -->

            <?php  
            //input hasil akhir
            $sql=mysqli_query($koneksi, "SELECT * FROM alternatif, leaving_flow, entering_flow WHERE alternatif.id_alternatif=leaving_flow.id_alternatif AND alternatif.id_alternatif=entering_flow.id_alternatif");
            while($data=mysqli_fetch_array($sql))
            {
            	$id_alternatif=$data["id_alternatif"];
            	$nilai_lf=$data["nilai_lf"];
            	$nilai_ef=$data["nilai_ef"];
            	$nilai_nf=$data["nilai_lf"]-$data["nilai_ef"];
            	mysqli_query($koneksi, "INSERT INTO net_flow (id_alternatif, nilai_lf, nilai_ef, nilai_nf) VALUES ('$id_alternatif','$nilai_lf', '$nilai_ef', '$nilai_nf')");
            }
            ?>

            <div class="card-body">
            <h2>Hasil Penilaian</h2>
            <h3 class="card-title"> <a href="cetak.php">Cetak Data</a></h3>
              <table id="example" class="table table-bordered table-striped">
                <thead>
				<tr>
					<th>No</th>
					<th>Alternatif</th>
					<th>Leaving Flow</th>
					<th>Entering Flow</th>
					<th>Net Flow</th>
					<th>Rangking</th>
				</tr>
			</thead>
			<tbody>
				<?php  
				$no=1;
					$sql=mysqli_query($koneksi, "SELECT * FROM net_flow, alternatif WHERE net_flow.id_alternatif=alternatif.id_alternatif ORDER BY nilai_nf DESC") or die(mysqli_error($koneksi));
					while($r=mysqli_fetch_array($sql))
					{
						?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $r["nama_alternatif"] ?></td>
							<td><?php echo $r["nilai_lf"]; ?></td>
							<td><?php echo $r["nilai_ef"]; ?></td>
							<td><?php echo $r["nilai_nf"]; ?></td>
							<td><?php echo $no ?></td>
						</tr>
						<?php 
						$no++;
					}
				?>
			</tbody>
			</table>
			</div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content --

	