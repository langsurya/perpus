<?php 
include_once '../inc/class.perpus.php';
$user = new user;

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	extract($user->getData($id,'tbl_user','id'));
}
?>
<div class="col-sm-9">
	<h4>Edit Data User</h4>
	<hr>
</div>

<div class="col-md-9">
	
	<form method="post" enctype="multipart/form-data" action="">
		<table class="table table-bordered">
			<tr>
				<td>Nama Lengkap</td>
				<td><input class="form-control" disabled type="text" name="nama" value="<?=$nama?>"></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input class="form-control" disabled type="text" name="username" value="<?=$username?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
				<input class="form-control" type="text" disabled placeholder="<?=$password?>">
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input class="form-control" disabled type="text" name="email" value="<?=$email?>" placeholder="Email.." required></td>
			</tr>
			<tr>
				<td>Foto</td>
				<td>
					<img src="../images/<?=$foto;?>" width="150" height="170" class="img-rounded"><br>
			</tr>
			<tr>
				<td>Prodi</td>
				<td>
					<select class="form-control" disabled name="level" style="width: 200px">
						<option>Pilih User</option>
						<option value="admin" <?php if($level=='admin'){echo "selected";} ?>>Administrator</option>
						<option value="user" <?php if($level=='user'){echo "selected";} ?>>User</option>
					</select>
				</td>
			</tr>

			<tr>
				<td colspan="2">
					<a href="?page=user" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp;Kembali</a>
				</td>
			</tr>
		</table>
	</form>

</div>