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
					$nama_alternatif						= $_POST['nama_alternatif'];
					$nik						= $_POST['nik'];
					$tmp_lahir						= $_POST['tmp_lahir'];
					$tgl_lahir						= $_POST['tgl_lahir'];
					$gender						= $_POST['gender'];
					$ibu_kandung						= $_POST['ibu_kandung'];


					$insert = mysqli_query($koneksi, "INSERT INTO alternatif(nik,nama_alternatif,tmp_lahir,tgl_lahir,gender,ibu_kandung)VALUES('$nama_alternatif','$nik','$tmp_lahir','$tgl_lahir','$gender','$ibu_kandung')") or die(mysqli_error($koneksi));
					if ($insert) {
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Alternatif Berhasil Di Simpan.</div>';
					} else {
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Alternatif Gagal Di simpan ! </div>';
					}
				}

				?>
				<div class="card card-secondary">
					<div class="card-header">
						<h3 class="card-title">&nbsp;</h3>
					</div>

					<form class="form-horizontal" action="" method="post">
						<div class="form-group">
							<label class="col-sm-3 control-label">NIK</label>
							<div class="col-sm-12">
								<input type="text" name="nik" class="form-control" placeholder="Nik Nasabah" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Nama Nasabah</label>
							<div class="col-sm-12">
								<input type="text" name="nama_alternatif" class="form-control" placeholder="Nama Nasabah" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Gender</label>
							<div class="col-sm-12">
								<select name="gender" class="form-control" required>
									<option value="" disabled>Pilih Gender</option>
									<option value="male">Laki-Laki</option>
									<option value="female">Perempuan</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Tempat Lahir</label>
							<div class="col-sm-12">
								<input type="text" name="tmp_lahir" class="form-control" placeholder="Tempat Lahir" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Tanggal Lahir</label>
							<div class="col-sm-12">
								<!-- Tambahkan class datepicker pada input -->
								<input type="text" name="tgl_lahir" class="form-control datepicker" placeholder="Tanggal Lahir" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Ibu Kandung</label>
							<div class="col-sm-12">
								<input type="text" name="ibu_kandung" class="form-control" placeholder="Ibu Kandung" required>
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-3 control-label">&nbsp;</label>
							<div class="col-sm-12">
								<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan">
								<a href="?module=data_alternatif" class="btn btn-sm btn-danger">Kembali</a>
							</div>
						</div>

					</form>

				</div>
			</div>
		</div>
	</div>
</section>