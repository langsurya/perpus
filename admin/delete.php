<?php 
include "perpus.php";
$obj = new perpus;
if ($_GET['page'] == 'delete') {
	$obj->delete($_GET['id'],'tbl_buku');
	header('location:?page=buku');
}
?>