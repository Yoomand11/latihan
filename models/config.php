<?php
// Membuat kelas Database untuk mengatur koneksi ke database MySQL
class Database {
    // Properti private untuk menyimpan konfigurasi koneksi
    private $host = "localhost"; // Alamat server database (biasanya localhost saat pengembangan lokal)
    private $user = "root";      // Username untuk login ke database
    private $pass = "";          // Password user database (kosong jika default XAMPP/LAMP/WAMP)
    private $dbname = "mahasiswa"; // Nama database yang akan digunakan

    // Properti public untuk menyimpan objek koneksi yang bisa diakses dari luar class
    public $conn;

    // Constructor akan otomatis dijalankan saat objek dibuat dari class ini
    public function __construct() {
        // Membuat koneksi baru ke database menggunakan ekstensi MySQLi
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        // Mengecek apakah terjadi error saat koneksi
        if ($this->conn->connect_error) {
            // Jika gagal, hentikan eksekusi dan tampilkan pesan error
            die("Koneksi Gagal: " . $this->conn->connect_error);
        }
    }
}
?>
