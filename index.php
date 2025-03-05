<?php
require_once "models/MahasiswaModel.php";
$mahasiswa = new Mahasiswa();
$dataMahasiswa = $mahasiswa->getAllMahasiswa();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h2>Data Mahasiswa</h2>
         <!-- Notifikasi Sukses atau Error -->
         <?php if (isset($_GET['status'])): ?>
            <div id="popup" class="popup <?php echo ($_GET['status'] == 'success') ? 'popup-success' : 'popup-error'; ?>">
                <?php echo ($_GET['status'] == 'success') ? "✅ Data berhasil disimpan!" : "❌ Gagal menyimpan data."; ?>
            </div>
            <script>
                setTimeout(() => {
                    document.getElementById('popup').style.display = 'none';
                }, 5000);
            </script>
           <?php endif; ?>

           <table>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Angkatan</th>
                <th>IPK</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($dataMahasiswa as $row): ?>
            <tr>
                <td><?= $row['NIM']; ?></td>
                <td><?= $row['Nama']; ?></td>
                <td><?= $row['Prodi']; ?></td>
                <td><?= $row['Angkatan']; ?></td>
                <td><?= $row['IPK']; ?></td>
                <td>
            <div class="action-buttons">
                <!-- Tombol Edit -->
                <a href="views/edit.php?nim=<?= $row['NIM']; ?>" class="edit-btn">✏ Edit</a>

                <a href="app/controllers/DeleteController.php?nim=<?= $row['NIM']; ?>" class="delete-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">🗑 Hapus</a>

            </div>
        </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <a href="views/form.php">Tambah Data Mahasiswa</a>
    </div>
</body>
</html>
