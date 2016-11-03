<div class="col-sm-9">
  <h4>Data user</h4>
  <hr>	
</div>
<div id="loginbox" style="margin-top: ;" class="mainbox col-md-9">
	<div class="panel panel-info">
		<div class="panel-heading">
			<a  class="btn btn-success" href="?page=user_input"><span class="glyphicon glyphicon-plus"></span> Input user</a>
			<div class="pull-right col-md-4">
				<form action="?page=user_search" method="post">				
          <div class="input-group">
				  	<input type="text" name="cari" class="form-control" placeholder="Cari Nama User..">
				    <span class="input-group-btn">
				    <button type="submit" class="btn btn-default" type="button">
				    	<span class="glyphicon glyphicon-search"></span>
				    </button>
				    </span>
				  </div>
				</form>
      </div>
			<!-- <div class="panel-title">Input user</div> -->
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
    		<strong>Success!</strong> Data berhasil di hapus.
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
					<th>Nama User</th>
					<th>Email</th>
					<th>Level</th>
					<th style="text-align: center;" colspan="2">Aksi</th>
				</tr>
				</thead>
				<tbody>
				<?php 
				include_once '../inc/class.perpus.php';
				$user = new user;
				$records_per_page=5;
				$query = "SELECT * FROM tbl_user";
				$newquery = $user->paging($query,$records_per_page);
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
				foreach ($user->showData($newquery) as $value) {
					?>
					<tr style="text-align: center;">
					<td><?php echo $no; ?></td>
					<td><a href="?page=detil-user&id=<?=$value['id']?>"><?=$value['nama']; ?></a></td>
					<td><?=$value['email']; ?></td>
					<td><?=$value['level']?></td>
					<td>
						<a href="?page=user_edit&id=<?=$value['id']?>" title="edit"><span class="glyphicon glyphicon-edit"></span></a>
					</td>
					<td>
						<a href="?page=delete&user_id=<?php print($value['id']) ?>" onclick="return confirm('Anda yakin ingin menghapus data user <?php echo $value['nama']; ?> ?')" title="Hapus"><span class="glyphicon glyphicon-remove"></span></a>
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
			      <?php $user->paginglink($query,$records_per_page); ?>
			    </div>
		  	  </td>
		    </tr>
			</table>
			Jumlah : <b><?php $user->jumlah($query); ?> user</b>
		</div>
	</div>
</div>
