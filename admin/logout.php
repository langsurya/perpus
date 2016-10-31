<?php
// session_start();
echo "<script>alert('Anda berhasil Logout');</script>";
echo "<meta http-equiv='refresh' content='2; url=../index.php'>";
session_destroy();
?>