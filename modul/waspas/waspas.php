<?php  
//kkosongkan tabel hasil terlebih dahulu
mysqli_query($koneksi, "DELETE FROM hasil");
?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Perhitungan Metode WASPAS</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?module=home">Home</a></li>
          <li class="breadcrumb-item active">Perhitungan Metode WASPAS</li>
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
            <!-- /.card-header -->
            <div class="card-body">
            	<b>Matrik Nilai</b>
            	<table id="example" class="table table-bordered table-striped">
                <thead>
					<tr>
						<th width="50">No</th>
						<th>Alternatif</th>
			            <?php
			            $stmt2x = mysqli_query($koneksi, "select * from kriteria");
			            while($row2x = mysqli_fetch_array($stmt2x)){
			            ?>
						<th><?php echo $row2x['nama_kriteria'] ?></th>
			            <?php
			            }
			            ?>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>-</td>
						<td>Bobot</td>
			            <?php
			            $stmt2x1 = mysqli_query($koneksi, "select * from kriteria");
			            while($row2x1 = mysqli_fetch_array($stmt2x1)){
			            ?>
						<td><?php echo $row2x1['bobot_kriteria'] ?> % % ( <?php echo $row2x1['jenis_kriteria'] ?> )</td>
			            <?php
			            }
			            ?>
					</tr>
					<?php
					$stmtx = mysqli_query($koneksi, "select * from alternatif");
					$noxx = 1;
					while($rowx = mysqli_fetch_array($stmtx)){
					?>
					<tr>
						<td><?php echo $noxx++ ?></td>
						<td><?php echo $rowx['nama_alternatif'] ?></td>
			            <?php
			            $stmt3x = mysqli_query($koneksi, "select * from kriteria");
			            
			            while($row3x = mysqli_fetch_array($stmt3x)){
			            ?>
						<td>
			                <?php
			                $stmt4x = mysqli_query($koneksi, "select * from nilai where id_kriteria='".$row3x['id_kriteria']."' and id_alternatif='".$rowx['id_alternatif']."'");
			                while($row4x = mysqli_fetch_array($stmt4x)){
			                	
			                    echo $row4x['nilai'];
			                    
			                }
			                ?>
			            </td>
			            <?php
			            }
			            ?>
					</tr>
					<?php
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="2">Nilai Max</th>
			            <?php
			            $stmt3x = mysqli_query($koneksi, "select * from kriteria"); 
			            while($row3x = mysqli_fetch_array($stmt3x)){
			            	$max=0;
			            	
			            	$sql=mysqli_query($koneksi, "SELECT * FROM kriteria WHERE id_kriteria='$row3x[id_kriteria]'");
			            	while($r=mysqli_fetch_array($sql)){
			            		$sql2=mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_kriteria='$r[id_kriteria]'");
			            		while ($r2=mysqli_fetch_array($sql2)) {
			            			if($max>$r2["nilai"]){
			            				$max=$max;
			            			}else{
			            				$max=$r2["nilai"];
			            			}
			            		}
			            	}
			            ?>
						<th>
			                <?php echo $max; ?>
			            </th>
			            <?php
			            }
			            ?>
					</tr>
					<tr>
						<th colspan="2">Nilai Min</th>
			            <?php
			            $stmt3x = mysqli_query($koneksi, "select * from kriteria"); 
			            while($row3x = mysqli_fetch_array($stmt3x)){
			            	
			            		$min=mysqli_fetch_array(mysqli_query($koneksi, "SELECT nilai FROM nilai ORDER BY id_nilai ASC LIMIT 1"));
			            		$sql2=mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_kriteria='$row3x[id_kriteria]'");
			            		while ($r2=mysqli_fetch_array($sql2)) {
			            			
			            			if($min<$r2["nilai"]){
			            				$min=$min;
			            			}else{
			            				$min=$r2["nilai"];
			            			}
			            		}
			            ?>
						<th>
			                <?php echo $min; ?>
			            </th>
			            <?php
			            }
			            ?>
					</tr>
				</tfoot>
				</table>
				<br>
				<b>Matrik Normalisasi</b>
              <table id="example" class="table table-bordered table-striped">
                <thead>
					<tr>
						<th width="50">No</th>
						<th>Alternatif</th>
			            <?php
			            $stmt2x = mysqli_query($koneksi, "select * from kriteria");
			            while($row2x = mysqli_fetch_array($stmt2x)){
			            ?>
						<th><?php echo $row2x['nama_kriteria'] ?></th>
			            <?php
			            }
			            ?>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>-</td>
						<td>Bobot</td>
			            <?php
			            $stmt2x1 = mysqli_query($koneksi, "select * from kriteria");
			            while($row2x1 = mysqli_fetch_array($stmt2x1)){
			            ?>
						<td><?php echo $row2x1['bobot_kriteria'] ?> % ( <?php echo $row2x1['jenis_kriteria'] ?> )</td>
			            <?php
			            }
			            ?>
					</tr>
					<?php
					$stmtx = mysqli_query($koneksi, "select * from alternatif");
					$noxx = 1;
					while($rowx = mysqli_fetch_array($stmtx)){
					?>
					<tr>
						<td><?php echo $noxx++ ?></td>
						<td><?php echo $rowx['nama_alternatif'] ?></td>
			            <?php
			            $stmt3x = mysqli_query($koneksi, "select * from kriteria"); 
			            while($row3x = mysqli_fetch_array($stmt3x)){
			            	$max=0;
			            	
			            	$sql=mysqli_query($koneksi, "SELECT * FROM kriteria WHERE id_kriteria='$row3x[id_kriteria]'");
			            	while($r=mysqli_fetch_array($sql)){
			            		$sql2=mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_kriteria='$r[id_kriteria]'");
			            		while ($r2=mysqli_fetch_array($sql2)) {
			            			if($max>$r2["nilai"]){
			            				$max=$max;
			            			}else{
			            				$max=$r2["nilai"];
			            			}
			            		}

			            		$min=mysqli_fetch_array(mysqli_query($koneksi, "SELECT nilai FROM nilai ORDER BY id_nilai ASC LIMIT 1"));
			            		$sql2=mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_kriteria='$r[id_kriteria]'");
			            		while ($r2=mysqli_fetch_array($sql2)) {
			            			
			            			if($min<$r2["nilai"]){
			            				$min=$min;
			            			}else{
			            				$min=$r2["nilai"];
			            			}
			            		}
			            	}
			            ?>
						<td>
			                <?php
			                $stmt4x = mysqli_query($koneksi, "select * from nilai where id_kriteria='".$row3x['id_kriteria']."' and id_alternatif='".$rowx['id_alternatif']."'");
			                while($row4x = mysqli_fetch_array($stmt4x)){
			                	
			                	if($row3x["jenis_kriteria"]=="Benefit"){
			                		$nilai=$row4x["nilai"]/$max;
			                	}elseif($row3x["jenis_kriteria"]=="Cost"){
			                		$nilai=$min/$row4x["nilai"];
			                	}
			                    echo $nilai;
			                    
			                }
			                ?>
			            </td>
			            <?php
			            }
			            ?>
					</tr>
					<?php
					}
					?>
				</tbody>
				
				</table>
				<br>
				<b>Matrik Normalisasi Terbobot</b>
              <table id="example" class="table table-bordered table-striped">
                <thead>
					<tr>
						<th width="50">No</th>
						<th>Alternatif</th>
			            <?php
			            $stmt2x = mysqli_query($koneksi, "select * from kriteria");
			            while($row2x = mysqli_fetch_array($stmt2x)){
			            ?>
						<th><?php echo $row2x['nama_kriteria'] ?></th>
			            <?php
			            }
			            ?>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>-</td>
						<td>Bobot</td>
			            <?php
			            $stmt2x1 = mysqli_query($koneksi, "select * from kriteria");
			            while($row2x1 = mysqli_fetch_array($stmt2x1)){
			            ?>
						<td><?php echo $row2x1['bobot_kriteria'] ?> % ( <?php echo $row2x1['jenis_kriteria'] ?> )</td>
			            <?php
			            }
			            ?>
					</tr>
					<?php
					$stmtx = mysqli_query($koneksi, "select * from alternatif");
					$noxx = 1;
					while($rowx = mysqli_fetch_array($stmtx)){
					?>
					<tr>
						<td><?php echo $noxx++ ?></td>
						<td><?php echo $rowx['nama_alternatif'] ?></td>
			            <?php
			            $stmt3x = mysqli_query($koneksi, "select * from kriteria"); 
			            while($row3x = mysqli_fetch_array($stmt3x)){
			            	$max=0;
			            	
			            	$sql=mysqli_query($koneksi, "SELECT * FROM kriteria WHERE id_kriteria='$row3x[id_kriteria]'");
			            	while($r=mysqli_fetch_array($sql)){
			            		$sql2=mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_kriteria='$r[id_kriteria]'");
			            		while ($r2=mysqli_fetch_array($sql2)) {
			            			if($max>$r2["nilai"]){
			            				$max=$max;
			            			}else{
			            				$max=$r2["nilai"];
			            			}
			            		}

			            		$min=mysqli_fetch_array(mysqli_query($koneksi, "SELECT nilai FROM nilai ORDER BY id_nilai ASC LIMIT 1"));
			            		$sql2=mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_kriteria='$r[id_kriteria]'");
			            		while ($r2=mysqli_fetch_array($sql2)) {
			            			
			            			if($min<$r2["nilai"]){
			            				$min=$min;
			            			}else{
			            				$min=$r2["nilai"];
			            			}
			            		}
			            	}
			            ?>
						<td>
			                <?php
			                $stmt4x = mysqli_query($koneksi, "select * from nilai where id_kriteria='".$row3x['id_kriteria']."' and id_alternatif='".$rowx['id_alternatif']."'");
			                while($row4x = mysqli_fetch_array($stmt4x)){
			                	
			                	if($row3x["jenis_kriteria"]=="Benefit"){
			                		$nilai=$row4x["nilai"]/$max;
			                	}elseif($row3x["jenis_kriteria"]=="Cost"){
			                		$nilai=$min/$row4x["nilai"];
			                	}
			                    echo $nilai * ($row3x["bobot_kriteria"]/100);
			                    
			                }
			                ?>
			            </td>
			            <?php
			            }
			            ?>
					</tr>
					<?php
					}
					?>
				</tbody>
				
				</table>
				<br>
				<b>Hasil Akhir</b>
              <table id="example" class="table table-bordered table-striped">
                <thead>
					<tr>
						<th width="50">No</th>
						<th>Alternatif</th>
						<th>Jumlah Kali</th>
						<th>Jumlah Pangkat</th>
			            <th>Hasil</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$stmtx = mysqli_query($koneksi, "select * from alternatif");
					$noxx = 1;
					while($rowx = mysqli_fetch_array($stmtx)){
					?>
					<tr>
						<td><?php echo $noxx++ ?></td>
						<td><?php echo $rowx['nama_alternatif'] ?></td>
						<td>
			                <?php
			                $a=0;
			                $nilaix=0;
			                 $stmt3x = mysqli_query($koneksi, "select * from kriteria"); 
			            	while($row3x = mysqli_fetch_array($stmt3x)){
			                $stmt4x = mysqli_query($koneksi, "select * from nilai where id_kriteria='".$row3x['id_kriteria']."' and id_alternatif='".$rowx['id_alternatif']."'");
			                while($row4x = mysqli_fetch_array($stmt4x)){
			                	
			                	if($row3x["jenis_kriteria"]=="Benefit"){
			                		$nilai=$row4x["nilai"]/$max;
			                	}elseif($row3x["jenis_kriteria"]=="Cost"){
			                		$nilai=$min/$row4x["nilai"];
			                	}
			                   $nilaix = $nilaix + ($nilai*($row3x["bobot_kriteria"]/100));
			                   
			                    
			                }
			            }
			                $hasilx= 0.5*$nilaix;
			              	echo $hasilx;
			              	echo "</td><td>";
			                $nilaiy=0;
			                 $stmt3x = mysqli_query($koneksi, "select * from kriteria"); 
			            while($row3x = mysqli_fetch_array($stmt3x)){
			                $stmt4x = mysqli_query($koneksi, "select * from nilai where id_kriteria='".$row3x['id_kriteria']."' and id_alternatif='".$rowx['id_alternatif']."'");
			                while($row4x = mysqli_fetch_array($stmt4x)){
			                	
			                	if($row3x["jenis_kriteria"]=="Benefit"){
			                		$nilai=$row4x["nilai"]/$max;
			                	}elseif($row3x["jenis_kriteria"]=="Cost"){
			                		$nilai=$min/$row4x["nilai"];
			                	}
			                    $nilaiy = $nilaiy + (pow($nilai, ($row3x["bobot_kriteria"]/100)));
			                   
			                }
			            }
			                $hasily= 0.5 * $nilaiy;
			                echo $hasily;
			                echo "</td><td>";
			                $hasil=$hasilx+$hasily;
			                echo $hasil;
			                echo "</td>"
			                ?>
			            </td>
			            <?php
			            
			            mysqli_query($koneksi, "INSERT INTO hasil (nama_alternatif, hasil) VALUES ('$rowx[nama_alternatif]', '$hasil')");
			            }
			            ?>
					</tr>
				</tbody>
				</table>
				<br>
				<b>Rangking</b>
              <table id="example" class="table table-bordered table-striped">
                <thead>
					<tr>
						<th width="50">No</th>
						<th>Alternatif</th>
			            <th>Hasil</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$stmtx = mysqli_query($koneksi, "SELECT * FROM hasil ORDER BY hasil DESC");
					$noxx = 1;
					while($rowx = mysqli_fetch_array($stmtx)){
					?>
					<tr>
						<td><?php echo $noxx++ ?></td>
						<td><?php echo $rowx['nama_alternatif'] ?></td>
						<td><?php echo $rowx['hasil'] ?></td>
			            
					</tr>
					<?php } ?>
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

	