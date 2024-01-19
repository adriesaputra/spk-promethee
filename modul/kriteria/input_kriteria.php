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
				$id_kriteria		= $_POST['nama_kriteria'];
				$nama_kriteria		= $_POST['nama_kriteria'];
				$jenis_kriteria		= $_POST['jenis_kriteria'];
				$bobot_kriteria		= $_POST['bobot_kriteria'];
				
					$insert = mysqli_query($koneksi, "INSERT INTO kriteria(id_kriteria, nama_kriteria, jenis_kriteria, bobot_kriteria)VALUES('$id_kriteria', '$nama_kriteria','$jenis_kriteria', '$bobot_kriteria')") or die(mysqli_error($koneksi));
					if($insert){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Kriteria Berhasil Di Simpan.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Kriteria Gagal Di simpan ! </div>';
					}	
			}
			
			?>
			<div class="card card-secondary">
              	<div class="card-header">
                	<h3 class="card-title">&nbsp;</h3>
              	</div>
						
						<form class="form-horizontal" action="" method="post">
							<div class="form-group">
								<label class="col-sm-3 control-label">Id kriteria</label>
								<div class="col-sm-12">
									<input type="text" name="Id_kriteria" class="form-control" placeholder="Id Kriteria" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama kriteria</label>
								<div class="col-sm-12">
									<input type="text" name="nama_kriteria" class="form-control" placeholder="Nama Kriteria" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Kriteria</label>
								<div class="col-sm-12">
									<select name="jenis_kriteria" class="form-control" required>
										<option value="">Pilih</option>
										<option value="Benefit">Benefit</option>
										<option value="Cost">Cost</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Bobot kriteria</label>
								<div class="col-sm-12">
									<input type="text" name="bobot_kriteria" class="form-control" placeholder="" required>
								</div>
							</div>							
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-12">
									<input type="submit" name="add" class="btn btn-sm btn-primary" value="simpan">
									<a href="?module=data_kriteria" class="btn btn-sm btn-danger">Kembali</a>
								</div>
							</div>

						</form>
						
					</div>	
			</div>
		</div>
	</div>
</section>