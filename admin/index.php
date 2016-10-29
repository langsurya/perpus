<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: auto}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;}
    }
  </style>
</head>
<body>
<?php 
session_start();
if(!isset($_SESSION['nama'])){
  echo "<script>alert('Silahkan login terlebih dahulu')</script>";
  echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
}
else{

?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>John's Blog</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="?page=buku"><i class="glyphicon glyphicon-book"></i> Buku</a></li>
        <li><a href="?page=anggota"><i class="glyphicon glyphicon-list-alt"></i> Anggota</a></li>
        <li><a href="?page=transaksi"><i class="glyphicon glyphicon-random"></i> Transaksi</a></li>
        <li><a href="?page=laporan"><i class="glyphicon glyphicon-file"></i> Laporan</a></li>
        <li><a href="?page=user"><i class="glyphicon glyphicon-user"></i> User</a></li>
      </ul><br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Blog..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </div>

    <?php 
    error_reporting(0);
    switch ($_GET['page']) {
      // menu buku
      case 'buku':
        include "buku_data.php";
        break;
      
      default:
        include "home.php";
        break;
    }
    ?>
    
  </div>
</div>
<br>
<footer class="container-fluid">
  <p>Footer Text</p>
</footer>
<?php } ?>
</body>
</html>

