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
		
			<div class="row">
        <div class="col-md-12">
        <div class="pull-left">
          <a  class="btn btn-success" href="?page=buku_input"><span class="glyphicon glyphicon-plus"></span> Add New Record</a>
         </div>
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Add New Record</button>
            </div>
        </div>
    	</div><br>

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
				$obj = new perpus;
				$no=0;
				foreach ($obj->showData("tbl_buku") as $value) {
					?>
					<tr style="text-align: center;">
					<td><?php echo $no+1; ?></td>
					<td><?php echo $value['judul']; ?></td>
					<td><?=$value['pengarang']; ?></td>
					<td><?=$value['penerbit']?></td>
					<td><?=$value['jumlah_buku']?></td>
					<td>
						<a href="" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
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
			</table>
			Jumlah : <b><?php $obj->jumlah("tbl_buku"); ?> Buku</b>
		</div>
	</div>
</div>
