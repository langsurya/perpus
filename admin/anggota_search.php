<div class="col-sm-9">
      <h4>Data Anggota</h4>
      <hr>
</div>

<div id="loginbox" style="margin-top: ;" class="mainbox col-md-9">
	<div class="panel panel-info">

		<div class="panel-heading">
			<a href="?page=anggota_input" class="btn btn-large btn-success"><span class="glyphicon glyphicon-plus"></span> Input Anggota</a>
			<div class="pull-right col-md-4">
				<form action="?page=anggota_search" method="post">
					<div class="input-group">
						<input type="text" name="cari" class="form-control" placeholder="Cari NIM, Nama ..">
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default" type="button">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
				</form>
			</div>
		</div>

		<div style="padding-top: 10px" class="panel-body"><br>			

			<table class="table table-bordered">
				<thead>
				<tr>
					<th width="5%">No</th>
					<th>Nim</th>
					<th>Nama</th>
					<th>Prodi</th>
					<th>Tahun Masuk</th>
					<th style="text-align: center;" colspan="2">Aksi</th>
				</tr>
				</thead>
				<tbody>
				<?php 
				include_once '../inc/class.perpus.php';
				$anggota = new anggota;
				$records_per_page=5;
				$cari = $_POST['cari'];
				$query = "SELECT * FROM tbl_anggota WHERE nim like '%$cari%' OR nama like '%$cari%' ";
				$newquery = $anggota->paging($query,$records_per_page);
				// penomoran page row
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
				foreach ($anggota->showData($newquery) as $value) {
					?>
					<tr style="text-align: center;">
					<td><?php echo $no; ?></td>
					<td><?php echo $value['nim']; ?></td>
					<td><?=$value['nama']; ?></td>
					<td><?=$value['prodi']?></td>
					<td><?=$value['thn_masuk']?></td>
					<td>
						<a href="?page=anggota_edit&nim=<?=$value['nim']?>" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
					</td>
					<td>
						<a href="?page=delete&nim=<?php print($value['nim']) ?>" onclick="return confirm('Anda yakin ingin menghapus data Anggota <?php echo $value['nama']; ?> ?')" title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
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
			      <?php $anggota->paginglink($query,$records_per_page); ?>
			    </div>
		  	  </td>
		    </tr>
			</table>
			Jumlah : <b><?php $anggota->jumlah($query); ?> Anggota</b>
		</div>
	</div>
</div>
