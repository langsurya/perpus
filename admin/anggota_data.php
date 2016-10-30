<div class="col-sm-9">
      <h4>Data Buku</h4>
      <hr>
</div>

<div id="loginbox" style="margin-top: ;" class="mainbox col-md-9">
	<div class="panel panel-info">
		<div class="panel-heading">
			<!-- <div class="panel-title">Input Buku</div> -->
			<!-- <marquee>Welcome to Sistem Informasi Perpustakaan</marquee> -->
		</div>
		<div style="padding-top: 10px" class="panel-body">
			<a href="?page=anggota_input" class="btn btn-large btn-success"><span class="glyphicon glyphicon-plus"></span> Input Anggota</a><br><br>
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
				$obj = new perpus;
				$no=0;
				foreach ($obj->showData("tbl_anggota") as $value) {
					?>
					<tr style="text-align: center;">
					<td><?php echo $no+1; ?></td>
					<td><?php echo $value['nim']; ?></td>
					<td><?=$value['nama']; ?></td>
					<td><?=$value['prodi']?></td>
					<td><?=$value['thn_masuk']?></td>
					<td>
						<a href="" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
					</td>
					<td>
						<a href="" title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
					</tr>
					<?php
					$no++;
				}
				?>
				</tbody>
			</table>
			Jumlah : <b><?php $obj->jumlah("tbl_anggota"); ?> Anggota</b>
		</div>
	</div>
</div>
