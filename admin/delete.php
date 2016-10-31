<?php 
include "../inc/class.perpus.php";
$obj = new perpus;
if (!empty($_GET['id'])) {
	$obj->delete($_GET['id'],'tbl_buku','id');
	header('location:?page=buku&msg=delete');
}elseif (!empty($_GET['nim'])) {
	$obj->delete($_GET['nim'],'tbl_anggota','nim');
	header('location:?page=anggota&msg=delete');
}
?>