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

	public function getData($id,$table,$key)
	{
		$stmt = $this->conn->prepare("SELECT * FROM $table WHERE $key=:key");
		$stmt->execute(array(":key"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
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

	public function jumlah($query){
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$row = $stmt->rowCount();
		print($row);
	}

	public function search($query){
		// $sql = "SELECT * FROM $table";
		$q = $this->conn->query($query) or die("failed!");
		while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[]=$r;
		}
		return $data;
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
		try {
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

		return true;			
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}	

	public function update($id,$judul,$pengarang,$penerbit,$thn_terbit,$isbn,$jumlah_buku,$lokasi){
		try {
		  $stmt = $this->conn->prepare("UPDATE tbl_buku SET judul=:judul, pengarang=:pengarang, penerbit=:penerbit, thn_terbit=:thn_terbit, isbn=:isbn, jumlah_buku=:jumlah_buku, lokasi=:lokasi WHERE id=:id ");
	    $stmt->bindparam(":judul",$judul);
	    $stmt->bindparam(":pengarang",$pengarang);
	    $stmt->bindparam(":penerbit",$penerbit);
	    $stmt->bindparam(":thn_terbit",$thn_terbit);
	    $stmt->bindparam(":isbn",$isbn);
	    $stmt->bindparam(":jumlah_buku",$jumlah_buku);
	    $stmt->bindparam(":lokasi",$lokasi);
	    $stmt->bindparam(":id",$id);
	    $stmt->execute();

    	return true;
	  } catch (PDOException $e) {
	    echo $e->getMessage();
		  return false;
	  }
	}
	
}

class anggota extends perpus{
	public function create($nim,$nama,$tempat_lahir,$tgl_lahir,$jk,$prodi,$thn_masuk){
		try {
		$stmt = $this->conn->prepare('INSERT INTO tbl_anggota(nim,nama,tempat_lahir,tgl_lahir,jk,prodi,thn_masuk) VALUES(?,?,?,?,?,?,?)');
		$stmt->bindParam(1,$nim);
		$stmt->bindParam(2,$nama);
		$stmt->bindParam(3,$tempat_lahir);
		$stmt->bindParam(4,$tgl_lahir);
		$stmt->bindParam(5,$jk);
		$stmt->bindParam(6,$prodi);
		$stmt->bindParam(7,$thn_masuk);
		$stmt->execute();
		
		return true;	
		} catch (PDOException $e) {
			return false;
		}
	}	

	public function update($nim,$nim1,$nama,$tempat_lahir,$tgl_lahir,$jk,$prodi,$thn_masuk){
		try {
		  $stmt = $this->conn->prepare("UPDATE tbl_anggota SET nim=:nim1, nama=:nama, tempat_lahir=:tempat_lahir, tgl_lahir=:tgl_lahir, jk=:jk, prodi=:prodi, thn_masuk=:thn_masuk WHERE nim=:nim");
	    $stmt->bindparam(":nim1",$nim1);
	    $stmt->bindparam(":nama",$nama);
	    $stmt->bindparam(":tempat_lahir",$tempat_lahir);
	    $stmt->bindparam(":tgl_lahir",$tgl_lahir);
	    $stmt->bindparam(":jk",$jk);
	    $stmt->bindparam(":prodi",$prodi);
	    $stmt->bindparam(":thn_masuk",$thn_masuk);
	    $stmt->bindparam(":nim",$nim);
	    $stmt->execute();

    	return true;
	  } catch (PDOException $e) {
	    echo $e->getMessage();
		  return false;
	  }
	}

}

class user extends perpus{
	public function create($nama,$username,$password,$email,$userpic,$level){
		try {
		$stmt = $this->conn->prepare('INSERT INTO tbl_user(nama,username,password,email,foto,level) VALUES(?,?,?,?,?,?)');
		$stmt->bindParam(1,$nama);
		$stmt->bindParam(2,$username);
		$stmt->bindParam(3,$password);
		$stmt->bindParam(4,$email);
		$stmt->bindParam(5,$userpic);
		$stmt->bindParam(6,$level);
		$stmt->execute();
		
		return true;	
		} catch (PDOException $e) {
			return false;
		}
	}

	public function update($id,$nama,$username,$password,$email,$level,$foto){
		try {
			if (empty($foto)) {
		  $stmt = $this->conn->prepare("UPDATE tbl_user SET nama=:nama, username=:username, password=:password, email=:email, level=:level WHERE id=:id ");
			}else{
				$stmt = $this->conn->prepare("UPDATE tbl_user SET nama=:nama, username=:username, password=:password, email=:email, level=:level, foto=:foto WHERE id=:id ");
	    $stmt->bindparam(":foto",$foto);
			}
	    $stmt->bindparam(":nama",$nama);
	    $stmt->bindparam(":username",$username);
	    $stmt->bindparam(":password",$password);
	    $stmt->bindparam(":email",$email);
	    $stmt->bindparam(":level",$level);
	    $stmt->bindparam(":id",$id);
	    $stmt->execute();

    	return true;
	  } catch (PDOException $e) {
	    echo $e->getMessage();
		  return false;
	  }
	}
}

class transaksi extends perpus{
	public function terlambat($tgl_dateline, $tgl_kembali) {

		$tgl_dateline_pcs = explode("-", $tgl_dateline);
		$tgl_dateline_pcs = $tgl_dateline_pcs[2]."-".$tgl_dateline_pcs[1]."-".$tgl_dateline_pcs[0];

		$tgl_kembali_pcs = explode("-", $tgl_kembali);
		$tgl_kembali_pcs = $tgl_kembali_pcs[2]."-".$tgl_kembali_pcs[1]."-".$tgl_kembali_pcs[0];

		$selisih = strtotime($tgl_kembali_pcs) - strtotime($tgl_dateline_pcs);

			$selisih = $selisih / 86400;
			if ($selisih>=1) {
				$hasil_tgl = floor($selisih);
			}else{
				$hasil_tgl = 0;
			}
			return $hasil_tgl;
	}
}

?>