<?php 
include_once "../inc/class.perpus.php";
$transaksi = new transaksi;
$pinjam = date('d-m-Y');
$tuju_hari = mktime(0,0,0,date('n'),date("j")+7,date("Y"));
$kembali = date("d-m-Y", $tuju_hari);

$tgl_pinjam 	= isset($_POST['tgl_pinjam']) ? $_POST['tgl_pinjam'] : "";
$tgl_kembali 	= isset($_POST['tgl_kembali']) ? $_POST['tgl_kembali'] : "";

$dapat_buku = isset($_POST['buku']) ? $_POST['buku'] : "";
$pecah_buku = explode(".", $dapat_buku);
$id = $pecah_buku[0];
$buku = $pecah_buku[1];

$dapat_mhs = isset($_POST['peminjam']) ? $_POST['peminjam'] : "";
$pecah_mhs = explode(".", $dapat_mhs);
$id_mhs = $pecah_mhs[0];
$mhs = $pecah_mhs[1];

$ket = isset($_POST['ket']) ? $_POST['ket'] : "";

if (isset($_POST['btn-save'])) {
	$query = "SELECT * FROM tbl_buku WHERE judul ='$buku'";
	foreach ($transaksi->showData($query) as $bukus) {
		$sisa = $bukus['jumlah_buku'];
	}
	if ($sisa == 0) {
		echo "<script>alert('Stok bukunya telah habis, tidak bisa melakukan transaksi, tambahkan stok buku segera');</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
	}else{
		$qt = $transaksi->t_transaksi($buku,$id_mhs,$mhs,$tgl_pinjam,$tgl_kembali,'Pinjam',$ket);
		$qu = $transaksi->u_buku($id,1);
		if ($qt&&$qu) {
			echo "<script>alert('Transaksi Sukses');</script>";
	    echo "<meta http-equiv='refresh' content='1; url=?page=transaksi&msg=success'>";
		}else{
			echo "<script>alert('Transaksi Gagal');</script>";
	    echo "<meta http-equiv='refresh' content='1; url=?page=transaksi&msg=gagal'>";
		}
	}
}

?>

<div class="col-sm-9">
	<h4>Transaksi</h4>
	<hr>
</div>

<div class="col-md-9">
	
	<form method="post" action="">
		<table class="table table-bordered">
			<tr>
				<td>Judul Buku</td>
				<td>
					<select required name="buku" class="form-control">
					<option value="">Pilih Judul Buku</option>
						<?php 
						$query="SELECT * FROM tbl_buku ORDER BY id";
						foreach ($transaksi->showData($query) as $buku) {
							echo "<option value=\"".$buku['id'].".".$buku['judul']."\">".$buku['judul']."</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Nama Peminjam</td>
				<td>
					<select required name="peminjam" class="form-control">
					<option value="">Nama Peminjam</option>
						<?php 
						$query="SELECT * FROM tbl_anggota ORDER BY nim";
						foreach ($transaksi->showData($query) as $anggota) {
							echo "<option value=\"".$anggota['nim'].".".$anggota['nama']."\">".$anggota['nim'].". ".$anggota['nama']."</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Tgl Peminjam</td>
				<td>
				<input class="form-control" type="text" name="tgl_pinjam" value="<?=$pinjam?>">
				</td>
			</tr>
			<tr>
				<td>Tgl Kembali</td>
				<td><input class="form-control" type="text" name="tgl_kembali" value="<?=$kembali?>"></td>
			</tr>
			<tr>
				<td>Keterangan</td>
				<td>
					<input class="form-control" type="text" name="ket"></td>
			</tr>			

			<tr>
				<td colspan="2">
					<button type="submit" class="btn btn-primary" name="btn-save">
						<span class="glyphicon glyphicon-plus"></span> Simpan
					</button>
					<a href="?page=transaksi" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp;Kembali</a>
				</td>
			</tr>
		</table>
	</form>

</div>