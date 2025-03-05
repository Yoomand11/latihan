<?php
require_once "../models/MahasiswaModel.php";

$mahasiswa = new Mahasiswa();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $prodi = $_POST["prodi"];
    $angkatan = $_POST["angkatan"];
    $ipk = $_POST["ipk"];

    if (!empty($nim) && !empty($nama) && !empty($prodi) && !empty($angkatan) && !empty($ipk)) {
        $insert = $mahasiswa->insertMahasiswa($nim, $nama, $prodi, $angkatan, $ipk);

        if ($insert) {
            // Redirect ke index.php dengan status sukses
            echo "<script>
                alert('✅ Data berhasil disimpan!');
                window.location.href='../index.php';
            </script>";
        } else {
            // Redirect ke index.php dengan status error
            echo "<script>
                alert('❌ Gagal menyimpan data. Periksa kembali input Anda.');
                window.location.href='../index.php';
            </script>";
        }
    } else {
        // Redirect ke index.php jika ada input yang kosong
        echo "<script>
            alert('⚠ Harap isi semua data sebelum menyimpan!');
            window.location.href='../index.php';
        </script>";
    }
}
?>
