<div class="col-sm-9">
  <h4>Data Buku</h4>
  <hr>	
</div>
<div id="loginbox" style="margin-top: ;" class="mainbox col-md-9">
	<div class="panel panel-info">
		<div class="panel-heading">
			<a  class="btn btn-success" href="?page=buku_input"><span class="glyphicon glyphicon-plus"></span> Input Anggota</a>
			<div class="pull-right col-md-4">
				<form action="?page=buku_search" method="post">				
          <div class="input-group">
				  	<input type="text" name="cari" class="form-control" placeholder="Cari Judul, Pengarang..">
				    <span class="input-group-btn">
				    <button type="submit" class="btn btn-default" type="button">
				    	<span class="glyphicon glyphicon-search"></span>
				    </button>
				    </span>
				  </div>
				</form>
      </div>
			<!-- <div class="panel-title">Input Buku</div> -->
		</div>
		<div style="padding-top: 10px" class="panel-body">
		<br>

			<table class="table table-bordered">
				<thead>
				<tr>
					<th width="5%">No</th>
					<th>Judul Buku</th>
					<th>Pengarang</th>
					<th>Penerbit</th>
					<th>jumlah</th>
					<th style="text-align: center;" colspan="2">Aksi</th>
				</tr>
				</thead>
				<tbody>
				<?php 
				include_once '../inc/class.perpus.php';
				$buku = new buku;
				$records_per_page=5;
				$cari = $_POST['cari'];
				$query = "SELECT * FROM tbl_buku WHERE judul like '%$cari%' OR pengarang like '%$cari%' ";
				$newquery = $buku->paging($query,$records_per_page);
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
				foreach ($buku->search($newquery) as $value) {
					?>
					<tr style="text-align: center;">
					<td><?php echo $no; ?></td>
					<td><?=$value['judul']; ?></td>
					<td><?=$value['pengarang']; ?></td>
					<td><?=$value['penerbit']?></td>
					<td><?=$value['jumlah_buku']?></td>
					<td>
						<a href="?page=buku_edit&id=<?=$value['id']?>" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
					</td>
					<td>
						<a href="?page=delete&id=<?php print($value['id']) ?>" onclick="return confirm('Anda yakin ingin menghapus data buku <?php echo $value['judul']; ?> ?')" title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
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
			      <?php $buku->paginglink($query,$records_per_page); ?>
			    </div>
		  	  </td>
		    </tr>
			</table>
			Jumlah : <b><?php $buku->jumlah($query); ?> Buku</b>
		</div>
	</div>
</div>
