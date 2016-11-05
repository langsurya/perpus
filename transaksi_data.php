<?php 
include_once 'inc/class.perpus.php';
$transaksi = new transaksi;
date_default_timezone_set('Asia/Jakarta');

if (isset($_GET['proses'])) {
	if ($_GET['proses']=="Kembali") {
		$id = $_GET['id'];
		$judul = $_GET['judul'];
		$proses = $_GET['proses'];
		$ut = $transaksi->u_transaksi($id,$proses);
		$utb = $transaksi->ut_buku(1,$judul);
		if ($ut || $utb) {
			echo "<script>alert('Berhasil Dikembalikan')</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
		} else {
			echo "<script>alert('Gagal Dikembalikan')</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
		}
	}elseif ($_GET['proses']=="perpanjang") {
		$id = $_GET['id'];
		$tgl_kembali = $_GET['tgl_kembali'];
		$lambat = $_GET['lambat'];
		if ($lambat > 7) {
			echo "<script>alert('Buku yang dipinjam tidak dapat diperpanjang, karena sudah terlambat lebih dari 7 hari. Kembalikan dahulu, kemudian pinjam kembali !');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
		}else{

			if ($transaksi->perpanjang($tgl_kembali,$id)) {
				echo "<script>alert('Berhasil Diperpanjang');</script>";
				echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
			}else{
				echo "<script>alert('Gagal Diperpanjang');</script>";
				echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
			}

		}
	}
}
?>
<div class="col-sm-9">
  <h4>Data Transaksi</h4>
  <hr>	
</div>
<div id="loginbox" style="margin-top: ;" class="mainbox col-md-9">
	<div class="panel panel-info">
		<div class="panel-heading">
			<a  class="btn btn-success" href="?page=transaksi_input"><span class="glyphicon glyphicon-save-file"></span> Input Transaksi</a>
			<div class="pull-right col-md-4">
				<form action="?page=transaksi_search" method="post">				
          <div class="input-group">
				  	<input type="text" name="cari" class="form-control" placeholder="Cari Nama Buku, uter..">
				    <span class="input-group-btn">
				    <button type="submit" class="btn btn-default" type="button">
				    	<span class="glyphicon glyphicon-search"></span>
				    </button>
				    </span>
				  </div>
				</form>
      </div>
			<!-- <div class="panel-title">Input uter</div> -->
		</div>
		<div style="padding-top: 10px" class="panel-body">
		<br>
    <?php 
		if (isset($_GET['msg'])) {
			if ($_GET['msg']=="success") {
				$msg="
				<div class='alert alert-success'>
    		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    		<strong>Success!</strong> Data berhasil di tambah.
  			</div>
				";
			}elseif ($_GET['msg']=="delete") {
				$msg="
				<div class=\"alert alert-danger\">
    		<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
    		<strong>Success!</strong> Data berhasil di haput.
  			</div>
				";
			}elseif ($_GET['msg']=="edit") {
				$msg="
				<div class=\"alert alert-warning\">
    		<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
    		<strong>Success!</strong> Data berhasil di Edit.
  			</div>
				";
			}
		}

		if (isset($msg)) {
			echo $msg;
		}
		?>

			<table class="table table-bordered">
				<thead>
				<tr>
					<th width="5%">No</th>
					<th>Judul Buku</th>
					<th>Peminjam</th>
					<th>Tgl Pinjam</th>
					<th>Tgl Kembali</th>
					<th>Terlambat</th>
					<th>Kembali</th>
					<th>Perpanjang</th>
				</tr>
				</thead>
				<tbody>
				<?php 
				
				$records_per_page=5;
				$query = "SELECT * FROM tbl_transaksi WHERE status='Pinjam' ORDER BY id";
				$newquery = $transaksi->paging($query,$records_per_page);
				// penomoran halaman data pada halaman
				if (isset($_GET['page_no'])) {
				$page = $_GET['page_no'];
				}
				if (empty($page)) {
					$posisi = 0;
					$halaman = 1;
				}else{
					$posisi = ($page - 1) * $records_per_page;
				}
				$no=1+$posisi;
				foreach ($transaksi->showData($newquery) as $value) {
					?>
					<tr style="text-align: center;">
					<td><?php echo $no; ?></td>
					<td><?=$value['judul']; ?></td>
					<td><?=$value['nama']; ?></td>
					<td><?=$value['tgl_pinjam']?></td>
					<td><?=$value['tgl_kembali']?></td>
					<td>
						<?php 
						$tgl_dateline=$value['tgl_kembali'];
						$tgl_kembali=date('d-m-Y');
						$lambat= $transaksi->terlambat($tgl_dateline,$tgl_kembali);
						$denda1=2000;
						$denda=$lambat*$denda1;
						if ($lambat>0) {
							echo "<font color='red'>$lambat hari<br>(Rp $denda)</font>";
						}else{
							echo $lambat." hari";
						}
						?>
					</td>
					<td>
						<a href="?page=transaksi&proses=Kembali&id=<?=$value['id'];?>&judul=<?=$value['judul'];?>">kembali</a>
					</td>
					<td>
						<a href="?page=transaksi&proses=perpanjang&id=<?=$value['id'];?>&judul=<?=$value['judul'];?>&tgl_kembali=<?=$value['tgl_kembali'];?>&lambat=<?php echo $lambat; ?>">perpanjang</a>
					</td>
					</tr>
					<?php
					$no++;
				}
				?>
				</tbody>
				<tr>
	        <td colspan="7" align="center">
			    <div class="pagination-wrap">
			      <?php $transaksi->paginglink($query,$records_per_page); ?>
			    </div>
		  	  </td>
		    </tr>
			</table>
			Jumlah : <b><?php $transaksi->jumlah($query); ?> transaksi</b>
		</div>
	</div>
</div>
