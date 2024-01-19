<?php
$query = mysqli_query($koneksi, "SELECT * FROM alternatif WHERE id_alternatif='$_GET[id_alternatif]'");
$row = mysqli_fetch_assoc($query);
?>

<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Alternatif</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="?module=home">Home</a></li>
					<li class="breadcrumb-item active">Alternatif</li>
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
				if (isset($_POST['add'])) {
					$id_alternatif						= $_POST['id_alternatif'];
					$nama_alternatif						= $_POST['nama_alternatif'];
					$nik						= $_POST['nik'];
					$tmp_lahir						= $_POST['tmp_lahir'];
					$tgl_lahir						= $_POST['tgl_lahir'];
					$gender						= $_POST['gender'];
					$ibu_kandung						= $_POST['ibu_kandung'];

					$update = mysqli_query($koneksi, "UPDATE alternatif SET id_alternatif='$id_alternatif',  
																				nik='$nik',
																				nama_alternatif='$nama_alternatif',
																				tmp_lahir='$tmp_lahir',
																				tgl_lahir='$tgl_lahir',
																				gender='$gender',
																				ibu_kandung='$ibu_kandung'
																				WHERE id_alternatif='$id_alternatif'") or die(mysqli_error($koneksi));
					if ($update) {
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Alternatif Berhasil Di Update.</div>';
					} else {
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Pemohon salinan Gagal Di Upadate ! </div>';
					}
				}
				?>

				<div class="card card-secondary">
					<div class="card-header">
						<h3 class="card-title">&nbsp;</h3>
					</div>
					<form class="form-horizontal" action="" method="post">
						<input type="hidden" name="id_alternatif" value="<?php echo $row['id_alternatif']; ?>">
						<div class="card-body">
							<div class="form-group">
								<label class="col-sm-3 control-label">NIK</label>
								<div class="col-sm-12">
									<input type="text" name="nik" value="<?php echo $row['nik']; ?>" class="form-control" placeholder="Nik Nasabah" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Nasabah</label>
								<div class="col-sm-12">
									<input type="text" name="nama_alternatif" value="<?php echo $row['nama_alternatif']; ?>" class="form-control" placeholder="nama Nasabah" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Gender</label>
								<div class="col-sm-12">
									<select name="gender" class="form-control" required>
										<option value="" disabled>Pilih Gender</option>
										<option value="male" <?php echo ($row['gender'] == 'male') ? 'selected' : ''; ?>>Laki-Laki</option>
										<option value="female" <?php echo ($row['gender'] == 'female') ? 'selected' : ''; ?>>Perempuan</option>
									</select>
								</div>
							</div>


							<div class="form-group">
								<label class="col-sm-3 control-label">Tempat Lahir</label>
								<div class="col-sm-12">
									<input type="text" name="tmp_lahir" value="<?php echo $row['tmp_lahir']; ?>" class="form-control" placeholder="Tempat Lahir" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Tanggal Lahir</label>
								<div class="col-sm-12">
									<!-- Tambahkan class datepicker pada input -->
									<input type="text" name="tgl_lahir" value="<?php echo $row['tgl_lahir']; ?>" class="form-control datepicker" placeholder="Tanggal Lahir" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Ibu kandung</label>
								<div class="col-sm-12">
									<input type="text" name="ibu_kandung" value="<?php echo $row['ibu_kandung']; ?>" class="form-control" placeholder="Ibu kandung" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-12">
									<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan">
									<a href="?module=data_alternatif" class="btn btn-sm btn-danger">Kembali</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>