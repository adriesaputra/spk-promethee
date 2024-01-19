<?php  
$query = mysqli_query($koneksi, "SELECT * FROM kriteria WHERE id_kriteria='$_GET[id_kriteria]'");
$row = mysqli_fetch_assoc($query);
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Kriteria</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?module=home">Home</a></li>
          <li class="breadcrumb-item active">Kriteria</li>
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
				$id_kriteria						= $_POST['id_kriteria'];
				$nama_kriteria						= $_POST['nama_kriteria'];
				$bobot_kriteria						= $_POST['bobot_kriteria'];
				
				$jenis_kriteria						= $_POST['jenis_kriteria'];
				
				
				$update = mysqli_query($koneksi, "UPDATE kriteria SET id_kriteria='$id_kriteria',  
																				nama_kriteria='$nama_kriteria', 
																				bobot_kriteria='$bobot_kriteria', 
																				jenis_kriteria='$jenis_kriteria'
																				WHERE id_kriteria='$id_kriteria'") or die(mysqli_error($koneksi));
				if($update){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Kriteria Berhasil Di Update.</div>';
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Pemohon salinan Gagal Di Upadate ! </div>';
				}	
				
				
			}
			?>

			<div class="card card-secondary">
              	<div class="card-header">
                	<h3 class="card-title">&nbsp;</h3>
              			</div>
						<form class="form-horizontal" action="" method="post">
							
							<div class="card-body">
							<div class="form-group">
								<label class="col-sm-3 control-label">id kriteria</label>
								<div class="col-sm-12">
									<input type="text" name="id_kriteria" value="<?php echo $row['id_kriteria'];?>" class="form-control" placeholder="id kriteria" required readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama kriteria</label>
								<div class="col-sm-12">
									<input type="text" name="nama_kriteria" value="<?php echo $row['nama_kriteria'];?>" class="form-control" placeholder="nama kriteria" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Jenis Kriteria</label>
								<div class="col-sm-12">
									<select name="jenis_kriteria" class="form-control" required>
										<option value="<?php echo $row['jenis_kriteria'];?>"><?php echo $row['jenis_kriteria'];?></option>
										<option value="Benefit">Benefit</option>
										<option value="Cost">Cost</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Bobot kriteria</label>
								<div class="col-sm-12">
									<input type="text" name="bobot_kriteria" value="<?php echo $row['bobot_kriteria'];?>" class="form-control" placeholder="bobot" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-12">
									<input type="submit" name="add" class="btn btn-sm btn-primary" value="simpan">
									<a href="?module=data_kriteria" class="btn btn-sm btn-danger">Kembali</a>
								</div>
							</div>
						</div>
						</form>
					</div>	
			</div>
		</div>
	</div>
</section>