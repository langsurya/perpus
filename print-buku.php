<html>
<body onLoad="window.print();">

   <style type="text/css">
body {
	font-size:12px;
	font-family:Arial, Helvetica, sans-serif;
}
.style1{
	font-size:12px;
	font-family:Arial, Helvetica, sans-serif;
}
</style>
<p align="center">LAPORAN DATA BUKU PERPUSTAKAAN</p>
  <table width="100%" cellspacing="0" cellpadding="2" border="1px" class="style1">
   	      
  <tr>
    <td width="4%" height="34" align="center" bgcolor="#CCCCCC">No</td>
    <td width="21%" bgcolor="#CCCCCC" align="center">Judul Buku</td>
    <td width="16%" bgcolor="#CCCCCC" align="center">Pengarang</td>
    <td width="14%" bgcolor="#CCCCCC" align="center">Penerbit</td>
    <td width="15%" bgcolor="#CCCCCC" align="center">Tahun Terbit</td>
    <td width="15%" bgcolor="#CCCCCC" align="center">Kode ISBN</td>
    <td width="7%" bgcolor="#CCCCCC" align="center">Jumlah</td>
    <td width="8%" bgcolor="#CCCCCC" align="center">Lokasi</td>
  </tr>
          
  <?php
  include_once 'inc/class.perpus.php';
  $anggota = new anggota;
	$query = "SELECT * FROM tbl_buku ORDER by judul";  
	$no = 1;
				
	foreach ($anggota->showData($query) as $data) {
	?>
  <tbody>
    <tr>
   	  <td height="27" align="center"><?php echo $no; ?></td>
      <td align="center"><?php echo $data['judul']; ?></a>
      <td align="center"><?php echo $data['pengarang']; ?></td>
      <td align="center"><?php echo $data['penerbit']; ?></td>
      <td align="center"><?php echo $data['thn_terbit']; ?></td>
      <td align="center"><?php echo $data['isbn']; ?></td>
      <td align="center"><?php echo $data['jumlah_buku']; ?></td>
      <td align="center"><?php echo $data['lokasi']; ?></td>
    </tr>
  <?php $no++; } ?>
  </tbody>
</table>
          
</body>
</html>