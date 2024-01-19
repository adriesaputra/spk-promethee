<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Sub Kriteria</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?module=home">Home</a></li>
          <li class="breadcrumb-item active">Sub Kriteria</li>
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
				$id_kriteria		= $_POST['id_kriteria'];
				$bobot				= $_POST['bobot'];
				$subkriteria		= $_POST['subkriteria'];
				
					$insert = mysqli_query($koneksi, "INSERT INTO subkriteria(nama_subkriteria, id_kriteria, bobot)VALUES('$subkriteria', '$id_kriteria', '$bobot')") or die(mysqli_error($koneksi));
					if($insert){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Sub Kriteria Berhasil Di Simpan.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Sub Kriteria Gagal Di simpan ! </div>';
					}	
			}
			
			?>
			<div class="card card-secondary">
              	<div class="card-header">
                	<h3 class="card-title">&nbsp;</h3>
              	</div>
						
						<form class="form-horizontal" action="" method="post">
							<div class="form-group">
								<label class="col-sm-3 control-label">Kriteria</label>
								<div class="col-sm-12">
									<select name="id_kriteria" class="form-control" required>
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
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Subkriteria</label>
								<div class="col-sm-12">
									<input type="text" name="subkriteria" class="form-control" placeholder="" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Bobot</label>
								<div class="col-sm-12">
									<input type="text" name="bobot" class="form-control" placeholder="" required>
								</div>
							</div>							
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-12">
									<input type="submit" name="add" class="btn btn-sm btn-primary" value="simpan">
									<a href="?module=data_subkriteria" class="btn btn-sm btn-danger">Kembali</a>
								</div>
							</div>

						</form>
						
					</div>	
			</div>
		</div>
	</div>
</section>