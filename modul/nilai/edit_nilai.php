<?php  
$query = mysqli_query($koneksi, "SELECT * FROM nilai, alternatif, kriteria WHERE nilai.id_alternatif=alternatif.id_alternatif AND nilai.id_kriteria=kriteria.id_kriteria AND nilai.id_nilai='$_GET[id_nilai]'");
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
				$id_nilai			= $_POST['id_nilai'];
				$id_kriteria		= $_POST['kriteria'];
				$id_alternatif		= $_POST['id_alternatif'];
				$subkriteria		= explode("-", $_POST['subkriteria']);
				$id_subkriteria		= $subkriteria[0];
				$nilai 				= $subkriteria[1];
				
				
				$update = mysqli_query($koneksi, "UPDATE nilai SET   
														id_kriteria='$id_kriteria', 
														id_alternatif='$id_alternatif', 
														nilai='$nilai'
														WHERE id_nilai='$id_nilai'") or die(mysqli_error($koneksi));
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
							<input type="hidden" name="id_nilai" value="<?php echo $row['id_nilai'];?>">
							<div class="form-group">
								<label class="col-sm-3 control-label">Alternatif</label>
								<div class="col-sm-12">
									<select name="id_alternatif" class="form-control" required>
										<option value="<?php echo $row['id_alternatif'] ?>"><?php echo $row['nama_alternatif'] ?></option>
										<?php  
											$sql =  mysqli_query($koneksi, "SELECT * FROM alternatif");

											while($row2 = mysqli_fetch_assoc($sql)){
											?>
											<option value="<?php echo $row2['id_alternatif'] ?>"><?php echo $row2['nama_alternatif'] ?></option>
											<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Kriteria</label>
								<div class="col-sm-12">
									<select class="form-control" name="kriteria" id="kriteria">
										<option value=""> Pilih Kriteria</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nilai</label>
								<div class="col-sm-12">
									<select class="form-control" name="subkriteria" id="subkriteria">
										<option value=""> Pilih Nilai</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-12">
									<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan">
									<a href="?module=data_nilai" class="btn btn-sm btn-danger">Kembali</a>
								</div>
							</div>
						</div>
						</form>
					</div>	
			</div>
		</div>
	</div>
</section>