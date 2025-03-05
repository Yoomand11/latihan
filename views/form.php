<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Mahasiswa</title>
    <link rel="stylesheet" href="../assets/style.css"> 
</head>

<body>
    <div class="container">
        <h2>Tambah Data Mahasiswa</h2>

        <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
            <p class="success">✅ Data berhasil disimpan!</p>
        <?php elseif (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
            <p class="error">❌ Gagal menyimpan data. Periksa kembali input Anda.</p>
        <?php endif; ?>

        <form action="../controllers/MahasiswaController.php" method="POST">
        <table class="form-table">
                <tr>
                    <td><label for="nim">NIM</label></td>
                    <td><input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required></td>
                </tr>
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td><input type="text" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" required></td>
                </tr>
                <tr>
                    <td><label for="prodi">Program Studi</label></td>
                    <td>
                        <select id="prodi" name="prodi" required>
                            <option value="" disabled selected>Pilih Program Studi</option>
                            <option value="Informatika">Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Teknik Komputer">Teknik Komputer</option>
                            <option value="Manajemen Informatika">Manajemen Informatika</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="angkatan">Angkatan</label></td>
                    <td><input type="number" id="angkatan" name="angkatan" min="2000" max="2030" placeholder="Masukkan Tahun Angkatan" required></td>
                </tr>
                <tr>
                    <td><label for="ipk">IPK</label></td>
                    <td><input type="number" id="ipk" name="ipk" step="0.01" min="0" max="4.00" placeholder="Masukkan IPK (0.00 - 4.00)" required></td>
                </tr>
               
            </table>
            <button type="submit">Simpan Data</button>
        </form>

        <a href="../index.php">⬅ Kembali ke Data Mahasiswa</a>
    </div>
</body>

</html>
