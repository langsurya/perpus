<?php 
include_once '../inc/class.perpus.php';
$user = new user;

if (isset($_POST['btn-save'])) {
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = md5($password);
	$email = $_POST['email'];
	$level = $_POST['level'];

	// Ambil data gambar dari form
	$nama_file = $_FILES['foto']['name'];
	$ukuran_file = $_FILES['foto']['size'];
	$tipe_file = $_FILES['foto']['type'];
	$tmp_file = $_FILES['foto']['tmp_name'];

	// set path folder tempat menyimpan gambar
	$imgExt = strtolower(pathinfo($nama_file,PATHINFO_EXTENSION));
	$userpic = rand(1000,1000000).".".$imgExt;
	$path = "../images/".$userpic;
	// Cek apakah tipe file yg di upload adalah JPG/JPEG/PNG
	if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
		# jika tipe file JPG/JPEG/PNG, maka lakukan:
		// Cek apakah ukuran file sama atau lebih kecil dari 1MB
		if ($ukuran_file <= 1000000) {
			# jika ukuran file kurang dari sama dengan 1MB, lakukan :
			// proses upload
			if (move_uploaded_file($tmp_file, $path)) { // cek apakah gambar berhasil di upload
				# jika gambar berhasil di upload, lakukan :
				//  proses simpan ke database
				if ($user->create($nama,$username,$password,$email,$userpic,$level)) {
					header('location:?page=user&msg=success');
				}			
			}else{
				// jika gambar gagal di upload
				echo "<script> alert('Data Gagal Di Upload') </script>";
				echo "<meta http-equiv='refresh' content='0; url=?page=user'>";
			}
		}else{
			// jika ukuran lebih dari 1MB
			echo "<script> alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB') </script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=user'>";
		}
	}else{
		//jika tipe file yg diupload bukan JPG/JPEG.PNG, lakukan :
		echo "<script> alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.') </script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=user'>";
	}

}
?>
<div class="col-sm-9">
	<h4>Input Data User</h4>
	<hr>
</div>

<div class="col-md-9">
	
	<form method="post" enctype="multipart/form-data" action="">
		<table class="table table-bordered">
			<tr>
				<td>Nama Lengkap</td>
				<td><input class="form-control" type="text" name="nama" placeholder="Nama Lengkap.." required></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input class="form-control" type="text" name="username" placeholder="Username.." required></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input class="form-control" type="password" name="password" placeholder="Password.." required></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input class="form-control" type="text" name="email" placeholder="Email.." required></td>
			</tr>
			<tr>
				<td>Foto</td>
				<td><input type="file" name="foto"></td>
			</tr>
			<tr>
				<td>Prodi</td>
				<td>
					<select class="form-control" name="level" style="width: 200px">
						<option>Pilih User</option>
						<option value="admin">Administrator</option>
						<option value="user">User</option>
					</select>
				</td>
			</tr>

			<tr>
				<td colspan="2">
					<button type="submit" class="btn btn-primary" name="btn-save">
						<span class="glyphicon glyphicon-plus"></span> Simpan
					</button>
					<a href="?page=user" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp;Kembali</a>
				</td>
			</tr>
		</table>
	</form>

</div>