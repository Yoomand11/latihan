<?php
// Memanggil file config.php yang berisi class Database untuk koneksi database
require_once "config.php";

// Membuat class Mahasiswa yang merupakan turunan dari class Database
class Mahasiswa extends Database {

    // Fungsi untuk menyisipkan (insert) data mahasiswa ke dalam tabel 'user'
    public function insertMahasiswa($nim, $nama, $prodi, $angkatan, $ipk) {
        // Menyiapkan query SQL dengan placeholder (prepared statement) untuk mencegah SQL Injection
        $stmt = $this->conn->prepare("INSERT INTO user (NIM, Nama, Prodi, Angkatan, IPK) VALUES (?, ?, ?, ?, ?)");

        /*
         * bind_param digunakan untuk mengikat nilai variabel ke placeholder (?)
         * "issid" artinya:
         * - i = integer (NIM)
         * - s = string (Nama)
         * - s = string (Prodi)
         * - i = integer (Angkatan)
         * - d = double (IPK)
         */
        $stmt->bind_param("issid", $nim, $nama, $prodi, $angkatan, $ipk);

        // Menjalankan query dan mengembalikan hasil true/false
        return $stmt->execute();
    }

    // Fungsi untuk mengambil semua data mahasiswa dari tabel 'user'
    public function getAllMahasiswa() {
        // Menjalankan query SELECT semua kolom dari tabel user
        $result = $this->conn->query("SELECT * FROM user");

        // Mengembalikan semua data hasil query dalam bentuk array asosiatif
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
