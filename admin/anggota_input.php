<?php 
include_once '../inc/class.perpus.php';
$anggota = new anggota;

if (isset($_POST['btn-save'])) {
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$jk = $_POST['jk'];
	$prodi = $_POST['prodi'];
	$thn_masuk = $_POST['thn_masuk'];

	if ($anggota->create($nim,$nama,$tempat_lahir,$tgl_lahir,$jk,$prodi,$thn_masuk)) {
		header('location:?page=anggota&msg=success');
	}
}
?>
<div class="col-sm-9">
	<h4>Input Data Anggota</h4>
	<hr>
</div>

<div class="col-md-9">
	
	<form method="post" action="">
		<table class="table table-bordered">
			<tr>
				<td>NIM</td>
				<td><input class="form-control" type="text" name="nim" required></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td><input class="form-control" type="text" name="nama" required></td>
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td><input class="form-control" type="text" name="tempat_lahir" required></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td><input class="form-control" type="date" name="tgl_lahir" placeholder="hh/bb/tttt"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><input class="" type="radio" value="L" name="jk"> Laki-laki
				<input class="" type="radio" value="P" name="jk"> Perempuan
				</td>
			</tr>
			<tr>
				<td>Prodi</td>
				<td>
					<select class="form-control" name="prodi" style="width: 200px">
						<option>Teknik Informatika</option>
						<option>Sistem Informasi</option>
						<option>Managemen</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Tahun Masuk</td>
				<td><input type="text" name="thn_masuk"></td>
			</tr>

			<tr>
				<td colspan="2">
					<button type="submit" class="btn btn-primary" name="btn-save">
						<span class="glyphicon glyphicon-plus"></span> Create New Record
					</button>
					<a href="?page=anggota" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp;Kembali</a>
				</td>
			</tr>
		</table>
	</form>

</div>