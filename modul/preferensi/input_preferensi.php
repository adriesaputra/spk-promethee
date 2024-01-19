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
				
				$alternatif1		= $_POST['alternatif1'];
				$alternatif2		= $_POST['alternatif2'];
				$kriteria			= $_POST['kriteria'];
				$nilai				= $_POST['nilai'];
				
				$insert = mysqli_query($koneksi, "INSERT INTO preferensi(alternatif1, alternatif2, id_kriteria, nilai)VALUES('$alternatif1', '$alternatif2', '$kriteria','$nilai')") or die(mysqli_error($koneksi));
					if($insert){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Nilai Berhasil Di Simpan.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Nilai Gagal Di simpan ! </div>';
					}	
			}
			
			?>
			
			<div class="card card-secondary">
              	<div class="card-header">
                	<h3 class="card-title">&nbsp;</h3>
              	</div>	
				<form class="form-horizontal" action="" method="post">
					<div class="row">
							<div class="col-sm-3">
							<div class="form-group">
								<label>Alternatif</label>
								
									<select name="alternatif1" class="form-control" required>
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
							<div class="col-sm-3">
							<div class="form-group">
								<label>Alternatif</label>
								
									<select name="alternatif2" class="form-control" required>
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
							<div class="col-sm-3">
							<div class="form-group">
								<label>Kriteria</label>
								
									<select name="kriteria" class="form-control" required>
										<option value="">Pilih</option>
										<?php  
											$sql =  mysqli_query($koneksi, "SELECT * FROM kriteria");

											while($row = mysqli_fetch_assoc($sql)){
											?>
											<option value="<?php echo $row['id_kriteria'] ?>"><?php echo $row['nama_kriteria'] ?></option>
											<?php } ?>
									</select>
									
								</div>
							</div>
							<div class="col-sm-3">
							<div class="form-group">
								<label>Nilai Preferensi</label>
								
									<select name="nilai" class="form-control" required>
										<option value="">Pilih</option>
										<option value="0">0</option>
										<option value="1">1</option>
									</select>
									
								</div>
							</div>			
							<div class="form-group">
								<label class="col-sm-2 control-label">&nbsp;</label>
								<div class="col-sm-2">
									<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan">
								</div>
						</div>
					</div>
				</form>
			</div>	
		</div>
	</div>
	</div>
</section>