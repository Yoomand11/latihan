<?php
// Memuat file model MahasiswaModel.php yang berisi class Mahasiswa dan koneksi database
require_once "../models/MahasiswaModel.php";

// Membuat instance/objek dari class Mahasiswa
$mahasiswa = new Mahasiswa();

// Mengecek apakah request yang diterima adalah POST (form disubmit)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data input dari form POST
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $prodi = $_POST["prodi"];
    $angkatan = $_POST["angkatan"];
    $ipk = $_POST["ipk"];

    // Validasi: memastikan semua input tidak kosong
    if (!empty($nim) && !empty($nama) && !empty($prodi) && !empty($angkatan) && !empty($ipk)) {
        
        // Memanggil method insertMahasiswa dari model untuk menyimpan data ke database
        $insert = $mahasiswa->insertMahasiswa($nim, $nama, $prodi, $angkatan, $ipk);

        // Mengecek apakah proses insert berhasil
        if ($insert) {
            // Jika berhasil, tampilkan alert sukses dan redirect ke halaman index.php
            echo "<script>
                alert('✅ Data berhasil disimpan!');
                window.location.href='../index.php';
            </script>";
        } else {
            // Jika gagal insert (mungkin karena kesalahan query), tampilkan alert error dan redirect
            echo "<script>
                alert('❌ Gagal menyimpan data. Periksa kembali input Anda.');
                window.location.href='../index.php';
            </script>";
        }

    } else {
        // Jika ada input yang kosong, tampilkan peringatan dan redirect
        echo "<script>
            alert('⚠ Harap isi semua data sebelum menyimpan!');
            window.location.href='../index.php';
        </script>";
    }
}
?>
