<?php
require_once "config.php";

class Mahasiswa extends Database {

    public function insertMahasiswa($nim, $nama, $prodi, $angkatan, $ipk) {
        $stmt = $this->conn->prepare("INSERT INTO user (NIM, Nama, Prodi, Angkatan, IPK) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issid", $nim, $nama, $prodi, $angkatan, $ipk);
        return $stmt->execute();
    }

    public function getAllMahasiswa() {
        $result = $this->conn->query("SELECT * FROM user");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
