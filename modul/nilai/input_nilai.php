<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Nilai</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?module=home">Home</a></li>
          <li class="breadcrumb-item active">Nilai</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-12">
			
			<?php
			if(isset($_POST['add'])){
				
				
				for($i=1;$i<=$_POST["no"]-1;$i++)
				{
					$id_alternatif		= $_POST['id_alternatif'];
					$id_kriteria		= $_POST["id_kriteria".$i];
					$nilai				= $_POST['subkriteria'.$i];
				
					$insert = mysqli_query($koneksi, "INSERT INTO nilai(id_alternatif, id_kriteria, nilai)VALUES('$id_alternatif', '$id_kriteria', '$nilai')") or die(mysqli_error($koneksi));
				}
					
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Nilai Berhasil Di Simpan.</div>';
						
			}
			
			?>
			<div class="card card-secondary">
              	<div class="card-header">
                	<h3 class="card-title">&nbsp;</h3>
              	</div>
						
						<form class="form-horizontal" action="" method="post">
							<div class="form-group">
								<label class="col-sm-3 control-label">Alternatif</label>
								<div class="col-sm-12">
									<select name="id_alternatif" class="form-control" required>
										<option value="">Pilih</option>
										<?php  
											$sql =  mysqli_query($koneksi, "SELECT * FROM alternatif");

											while($row = mysqli_fetch_assoc($sql)){
											?>
											<option value="<?php echo $row['id_alternatif'] ?>"><?php echo $row['nama_alternatif'] ?></option>
											<?php } ?>
									</select>
								</div>
							</div>
							<?php  
							$no=1;
							$sql=mysqli_query($koneksi, "SELECT * FROM kriteria");
							while($r=mysqli_fetch_array($sql))
							{
								?>
								<div class="form-group">
									<input type="hidden" name="id_kriteria<?php echo $no; ?>" value="<?php echo $r["id_kriteria"] ?>">
								<label class="col-sm-3 control-label"><?php echo $r["nama_kriteria"] ?></label>
								<div class="col-sm-12">
									<select class="form-control" name="subkriteria<?php echo $no; ?>">
										<option value=""> Pilih Nilai</option>
										<?php  
											$sql2=mysqli_query($koneksi, "SELECT * FROM subkriteria WHERE id_kriteria='$r[id_kriteria]'");
											while($q=mysqli_fetch_array($sql2))
											{
												?>
													<option value="<?php echo $q['bobot'] ?>"><?php echo $q['nama_subkriteria'] ?> </option>
												<?php 
											}
										?>
									</select>
								</div>
							</div>
							<?php 
							$no++;
							}
							
							?>
							<input type="hidden" name="no" value="<?php echo $no; ?>">
														
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-12">
									<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan">
									<a href="?module=data_nilai" class="btn btn-sm btn-danger">Kembali</a>
								</div>
							</div>

						</form>
						
					</div>	
			</div>
		</div>
	</div>
</section>