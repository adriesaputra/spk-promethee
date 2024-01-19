<?php  
$query = mysqli_query($koneksi, "SELECT * FROM preferensi WHERE id_preferensi='$_GET[id_preferensi]'");
$row = mysqli_fetch_assoc($query);
?>

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
				$id_preferensi		= $_POST['id_preferensi'];
				$alternatif1		= $_POST['alternatif1'];
				$alternatif2		= $_POST['alternatif2'];
				$id_kriteria		= $_POST['kriteria'];
				$nilai				= $_POST['nilai'];
				
				
				$update = mysqli_query($koneksi, "UPDATE preferensi SET   
														alternatif1='$alternatif1', 
														alternatif2='$alternatif2', 
														id_kriteria='$id_kriteria',
														nilai='$nilai'
														WHERE id_preferensi='$id_preferensi'") or die(mysqli_error($koneksi));
				if($update){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Nilai Berhasil Di Update.</div>';
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Nilai Gagal di update.</div>';
				}	
				
				
			}
			?>

			<div class="card card-secondary">
              	<div class="card-header">
                	<h3 class="card-title">&nbsp;</h3>
              			</div>
						<form class="form-horizontal" action="" method="post">
							<input type="hidden" name="id_preferensi" value="<?php echo $row['id_preferensi'] ?>">
							<div class="row">
									<div class="col-sm-3">
									<div class="form-group">
										<label>Alternatif</label>
										
											<select name="alternatif1" class="form-control" required>
												<?php 
													$alt=mysqli_query($koneksi, "SELECT * FROM alternatif WHERE id_alternatif='$row[alternatif1]'");
													$r1=mysqli_fetch_array($alt);
												 ?>
												<option value="<?php echo $r1['id_alternatif'] ?>"><?php echo $r1['nama_alternatif'] ?></option>
												<?php  
													$sql =  mysqli_query($koneksi, "SELECT * FROM alternatif");

													while($row2 = mysqli_fetch_assoc($sql)){
													?>
													<option value="<?php echo $row2['id_alternatif'] ?>"><?php echo $row2['nama_alternatif'] ?></option>
													<?php } ?>
											</select>
											
										</div>
									</div>
									<div class="col-sm-3">
									<div class="form-group">
										<label>Alternatif</label>
										
											<select name="alternatif2" class="form-control" required>
												<?php 
													$alt2=mysqli_query($koneksi, "SELECT * FROM alternatif WHERE id_alternatif='$row[alternatif2]'");
													$r2=mysqli_fetch_array($alt2);
												 ?>
												<option value="<?php echo $r2['id_alternatif'] ?>"><?php echo $r2['nama_alternatif'] ?></option>
												<?php  
													$sql =  mysqli_query($koneksi, "SELECT * FROM alternatif");

													while($row1 = mysqli_fetch_assoc($sql)){
													?>
													<option value="<?php echo $row1['id_alternatif'] ?>"><?php echo $row1['nama_alternatif'] ?></option>
													<?php } ?>
											</select>
											
										</div>
									</div>
									<div class="col-sm-3">
									<div class="form-group">
										<label>Kriteria</label>
										
											<select name="kriteria" class="form-control" required>
												<?php 
													$krit=mysqli_query($koneksi, "SELECT * FROM kriteria WHERE id_kriteria='$row[id_kriteria]'");
													$r1=mysqli_fetch_array($krit);
												 ?>
												<option value="<?php echo $r1['id_kriteria'] ?>"><?php echo $r1['nama_kriteria'] ?></option>
												<?php  
													$sql =  mysqli_query($koneksi, "SELECT * FROM kriteria");

													while($row3 = mysqli_fetch_assoc($sql)){
													?>
													<option value="<?php echo $row3['id_kriteria'] ?>"><?php echo $row3['nama_kriteria'] ?></option>
													<?php } ?>
											</select>
											
										</div>
									</div>
									<div class="col-sm-3">
									<div class="form-group">
										<label>Nilai Preferensi</label>
										
											<select name="nilai" class="form-control" required>
												<option value="<?php echo $row['nilai'] ?>"><?php echo $row['nilai'] ?></option>
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