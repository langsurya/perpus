<?php 

class perpus
{
	private $host = "localhost";
	private $user = "root";
	private $db = "db_perpus";
	private $pass = "";
	protected $conn;

	public function __construct()
	{
		$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass);
	}

	public function showData($query){
		// $sql = "SELECT * FROM $table";
		$q = $this->conn->query($query) or die("failed!");
		while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[]=$r;
		}
		return $data;
	}

	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if (isset($_GET["page_no"])) {
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}

	public function paginglink($query,$records_per_page){
		$self = $_SERVER['PHP_SELF'];
		if ($_GET['page']==$_GET['page']) {
			$page = $_GET['page'];
		}

		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		$total_no_of_records = $stmt->rowCount();

		if ($total_no_of_records > 0) {
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;

			if (isset($_GET["page_no"])) {
				$current_page=$_GET["page_no"];
			}

			if ($current_page!=1) {
				$previous = $current_page-1;
				echo "<li><a href='".$self."?page=".$page."&page_no=1'>First</a></li>";
				echo "<li><a href='".$self."?page=".$page."&page_no=".$previous."'>First</a></li>";
			}

			for ($i=1; $i<=$total_no_of_pages; $i++) { 
				if ($i==$current_page) {
					echo "<li><a href='".$self."?page=".$page."&page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}else{
					echo "<li><a href='".$self."?page=".$page."&page_no=".$i."'>".$i."</a></li>";
				}
			}

			if ($current_page!=$total_no_of_pages) {
				$next=$current_page+1;
				echo "<li><a href='".$self."?page=".$page."&page_no=".$next."'>Next</a></li>";
				echo "<li><a href='".$self."?page=".$page."&page_no=".$total_no_of_pages."'>Last</a></li>";
			}
		}

	}

	public function jumlah($table){
		$stmt = $this->conn->prepare("SELECT * FROM $table");
		$stmt->execute();
		$row = $stmt->rowCount();
		print($row);
	}

	public function delete($id,$tabel,$key){
		$stmt = $this->conn->prepare("DELETE FROM $tabel WHERE $key=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}
}

class buku extends perpus{	

	public function create($judul,$pengarang,$penerbit,$thn_terbit,$isbn,$jumlah_buku,$lokasi,$waktu){
		$stmt = $this->conn->prepare('INSERT INTO tbl_buku(judul,pengarang,penerbit,thn_terbit,isbn,jumlah_buku,lokasi,tgl_input) VALUES(?,?,?,?,?,?,?,?)');
		$stmt->bindParam(1,$judul);
		$stmt->bindParam(2,$pengarang);
		$stmt->bindParam(3,$penerbit);
		$stmt->bindParam(4,$thn_terbit);
		$stmt->bindParam(5,$isbn);
		$stmt->bindParam(6,$jumlah_buku);
		$stmt->bindParam(7,$lokasi);
		$stmt->bindParam(8,$waktu);
		$stmt->execute();
	}	
	
}

class anggota extends perpus{
	public function create($nim,$nama,$tempat_lahir,$tgl_lahir,$jk,$prodi,$thn_masuk){
		$stmt = $this->conn->prepare('INSERT INTO tbl_anggota(nim,nama,tempat_lahir,tgl_lahir,jk,prodi,thn_masuk) VALUES(?,?,?,?,?,?,?)');
		$stmt->bindParam(1,$nim);
		$stmt->bindParam(2,$nama);
		$stmt->bindParam(3,$tempat_lahir);
		$stmt->bindParam(4,$tgl_lahir);
		$stmt->bindParam(5,$jk);
		$stmt->bindParam(6,$prodi);
		$stmt->bindParam(7,$thn_masuk);
		$stmt->execute();
		header('location:?page=anggota');
	}	
}
?>