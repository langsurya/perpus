<div class="col-sm-9">
	<h4>Input Data Anggota</h4>
	<hr>
</div>

<div class="col-md-9">
	
	<form method="post">
		<table class="table table-bordered">
			<tr>
				<td>NIM</td>
				<td><input class="form-control" type="text" name="nim"></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td><input class="form-control" type="text" name="nim"></td>
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td><input class="form-control" type="text" name="nim"></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td><input class="form-control" type="date" name="nim" placeholder="hh/bb/tttt"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><input class="" type="radio" value="L" name="kelamin"> Laki-laki
				<input class="" type="radio" value="P" name="kelamin"> Perempuan
				</td>
			</tr>
			<tr>
				<td>Prodi</td>
				<td>
					<select class="form-control" style="width: 200px">
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