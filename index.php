<?php
// Memuat file model MahasiswaModel.php yang berisi class Mahasiswa dan fungsi-fungsinya
require_once "models/MahasiswaModel.php";

// Membuat objek baru dari class Mahasiswa
$mahasiswa = new Mahasiswa();

// Memanggil fungsi getAllMahasiswa untuk mengambil seluruh data mahasiswa dari database
$dataMahasiswa = $mahasiswa->getAllMahasiswa();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <!-- Menentukan karakter encoding dan viewport untuk responsive layout -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa Sistem Informasi versi insert</title>

    <!-- Memuat file CSS eksternal untuk styling -->
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h2>Data Mahasiswa</h2>

        <!-- Menampilkan notifikasi jika parameter 'status' dikirim melalui URL -->
        <?php if (isset($_GET['status'])): ?>
            <div id="popup" class="popup <?php echo ($_GET['status'] == 'success') ? 'popup-success' : 'popup-error'; ?>">
                <!-- Pesan yang ditampilkan bergantung pada nilai status: success atau error -->
                <?php echo ($_GET['status'] == 'success') ? "✅ Data berhasil disimpan!" : "❌ Gagal menyimpan data."; ?>
            </div>
            <script>
                // Script untuk menyembunyikan notifikasi setelah 5 detik
                setTimeout(() => {
                    document.getElementById('popup').style.display = 'none';
                }, 5000);
            </script>
        <?php endif; ?>

        <!-- Tabel untuk menampilkan data mahasiswa -->
        <table>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Angkatan</th>
                <th>IPK</th>
                <th>Aksi</th>
            </tr>

            <!-- Looping data mahasiswa yang diambil dari database -->
            <?php foreach ($dataMahasiswa as $row): ?>
            <tr>
                <td><?= $row['NIM']; ?></td>         <!-- Menampilkan NIM -->
                <td><?= $row['Nama']; ?></td>       <!-- Menampilkan Nama -->
                <td><?= $row['Prodi']; ?></td>      <!-- Menampilkan Program Studi -->
                <td><?= $row['Angkatan']; ?></td>   <!-- Menampilkan Tahun Angkatan -->
                <td><?= $row['IPK']; ?></td>        <!-- Menampilkan IPK -->
                <td>
                    <div class="action-buttons">
                        <!-- Tombol untuk mengedit data mahasiswa (mengarah ke form edit.php dengan parameter NIM) -->
                        <a href="views/edit.php?nim=<?= $row['NIM']; ?>" class="edit-btn">✏ Edit</a>

                        <!-- Tombol untuk menghapus data mahasiswa (mengarah ke DeleteController.php dengan parameter NIM) -->
                        <!-- Terdapat konfirmasi sebelum penghapusan -->
                        <a href="app/controllers/DeleteController.php?nim=<?= $row['NIM']; ?>" class="delete-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">🗑 Hapus</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <!-- Tombol/Link untuk menuju halaman form tambah data mahasiswa -->
        <br>
        <a href="views/form.php">Tambah Data Mahasiswa</a>
    </div>
</body>
</html>
