<?php 

class perpus
{
	private $host = "localhost";
	private $user = "root";
	private $db = "db_perpus";
	private $pass = "";
	private $conn;

	public function __construct()
	{
		$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass);
	}

	public function showData($table){
		$sql = "SELECT * FROM $table";
		$q = $this->conn->query($sql) or die("failed!");
		while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[]=$r;
		}
		return $data;
	}

	public function insert_buku($judul,$pengarang,$penerbit,$thn_terbit,$isbn,$jumlah_buku,$lokasi){
		$stmt = $this->conn->prepare('INSERT INTO tbl_buku(judul,pengarang,penerbit,thn_terbit,isbn,jumlah_buku,lokasi) VALUES(?,?,?,?,?,?,?)');
		$stmt->bindParam(1,$judul);
		$stmt->bindParam(2,$pengarang);
		$stmt->bindParam(3,$penerbit);
		$stmt->bindParam(4,$thn_terbit);
		$stmt->bindParam(5,$isbn);
		$stmt->bindParam(6,$jumlah_buku);
		$stmt->bindParam(7,$lokasi);
		$stmt->execute();
	}

	public function jumlah($table){
		$stmt = $this->conn->prepare("SELECT * FROM $table");
		$stmt->execute();
		$row = $stmt->rowCount();
		print($row);
	}

	public function delete($id,$tabel){
		$stmt = $this->conn->prepare("DELETE FROM $tabel WHERE id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}
}
?>