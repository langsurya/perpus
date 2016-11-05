<?php 
include_once '../inc/class.perpus.php';
$buku = new buku;

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	extract($buku->getData($id,'tbl_buku','id'));
}
?>
<div class="col-sm-9">
<h4>Detil Buku</h4>
  <hr>
</div>

<div class="col-md-9">

<?php 
if (isset($msg)) {
	echo $msg;
}
?>
	
	<form method="post">
		<table class="table table-bordered">
			<tr>
				<td>Judul Buku</td>
				<td><input type="text" disabled name="judul" class="form-control" value="<?=$judul;?>"></td>
			</tr>
			<tr>
				<td>Pengarang</td>
				<td><input type="text" disabled name="pengarang" class="form-control" value="<?=$pengarang;?>" required></td>
			</tr>
			<tr>
				<td>Penerbit</td>
				<td><input type="text" disabled name="penerbit" class="form-control" value="<?=$penerbit;?>" required></td>
			</tr>
			<tr>
				<td>Tahun Terbit</td>
				<td>
					<select disabled name="thn_terbit" class="form-control" style="width: 200px">
						<option>- Pilih Tahun -</option>
					<?php 
					for ($i=date(Y); $i >= 2000; $i--) { 
						if ($thn_terbit==$i) {
							echo "<option selected>$i</option>";
						}else{
						echo "<option>".$i."</option>";
						}
					}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Kode ISBN</td>
				<td><input type="text" disabled name="isbn" class="form-control" value="<?=$isbn;?>"></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="text" disabled name="jumlah_buku" class="form-control" value="<?=$jumlah_buku;?>"></td>
			</tr>
			<tr>
				<td>Lokasi</td>
				<td>
					<select disabled name="lokasi" class="form-control" style="width: 200px">
						<option>Pilih Lokasi</option>
						<?php 
						for ($i=1; $i <= 3; $i++) { 
							if ($lokasi=='rak'.$i) {
							echo "<option selected value=rak$i>Rak $i</option>";
							}else{
								echo "<option value=rak$i>Rak $i</option>";
							}
						}
						?>
					</select>
				</td>
			</tr>

			<tr>
				<td colspan="2">
					<a href="?page=buku" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp;Kembali</a>
				</td>
			</tr>
		</table>
	</form>

</div>