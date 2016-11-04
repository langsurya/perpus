<html>
<body onLoad="window.print();">

<p align="center">LAPORAN DATA TRANSAKSI PERPUSTAKAAN</p>
  <table width="100%" cellspacing="0" cellpadding="2" border="1px" class="style1">
   	      
  <tr>
    <th width="5%" align="center" class="style1" bgcolor="#CCCCCC">No</th>
    <th width="24%" align="center" class="style1" bgcolor="#CCCCCC">Judul Buku</th>
    <th width="25%" align="center" class="style1" bgcolor="#CCCCCC">Peminjam</th>
    <th width="18%" align="center" class="style1" bgcolor="#CCCCCC">Tgl Pinjam</th>
    <th width="18%" align="center" class="style1" bgcolor="#CCCCCC">Tgl Kembali</th>
    <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Status</th>
  </tr>
          
  <?php
  include_once 'inc/class.perpus.php';
  $anggota = new anggota;
	$query = "SELECT * FROM tbl_transaksi ORDER by status";  
	$no = 1;
				
				foreach ($anggota->showData($query) as $data) {
			?>
   	        <tbody>
   	          <tr>
   	            <td align="center"><?php echo $no; ?></td>
                <td><?php echo $data['judul']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td align="center"><?php echo $data['tgl_pinjam']; ?></td>
                <td align="center"><?php echo $data['tgl_kembali']; ?></td>  
                <td align="center"><?php echo $data['status']; ?></td>
              </tr>
              
      <?php $no++; } ?>
           
    </tbody>
</table>
          
</body>
</html>