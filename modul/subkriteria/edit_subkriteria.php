<?php  
$query = mysqli_query($koneksi, "SELECT * FROM subkriteria, kriteria WHERE subkriteria.id_kriteria=kriteria.id_kriteria AND subkriteria.id_subkriteria='$_GET[id]'");
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
				$id_subkriteria					= $_POST['id_subkriteria'];
				$id_kriteria					= $_POST['id_kriteria'];
				$bobot							= $_POST['bobot'];
				
				$nama_subkriteria					= $_POST['nama_subkriteria'];
				
				
				$update = mysqli_query($koneksi, "UPDATE subkriteria SET   
																				id_kriteria='$id_kriteria', 
																				nama_subkriteria='$nama_subkriteria',
																				bobot='$bobot' 
																				WHERE id_subkriteria='$id_subkriteria'") or die(mysqli_error($koneksi));
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
							<input type="hidden" name="id_subkriteria" value="<?php echo $row['id_subkriteria'];?>">
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Kriteria</label>
								<div class="col-sm-12">
									<select name="id_kriteria" class="form-control" required>
										<option value="<?php echo $row['id_kriteria'] ?>"><?php echo $row['nama_kriteria'] ?></option>
										<?php  
											$sql2 =  mysqli_query($koneksi, "SELECT * FROM kriteria");

											while($row2 = mysqli_fetch_assoc($sql2)){
											?>
											<option value="<?php echo $row2['id_kriteria'] ?>"><?php echo $row2['nama_kriteria'] ?></option>
											<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Subkriteria</label>
								<div class="col-sm-12">
									<input type="text" name="nama_subkriteria" value="<?php echo $row['nama_subkriteria'];?>" class="form-control" placeholder="Nama" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Bobot</label>
								<div class="col-sm-12">
									<input type="text" name="bobot" value="<?php echo $row['bobot'];?>" class="form-control" placeholder="Nilai" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-12">
									<input type="submit" name="add" class="btn btn-sm btn-primary" value="simpan">
									<a href="?module=data_subkriteria" class="btn btn-sm btn-danger">Kembali</a>
								</div>
							</div>
						</div>
						</form>
					</div>	
			</div>
		</div>
	</div>
</section>