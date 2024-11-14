<?php 
session_start();
include "../controller/config.php";

$akses = $_SESSION['login'];
$username = $_SESSION['username'];

if($akses != true) {
    header("location: ../login-register/invalidlogin.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Data</title>
    <link rel="stylesheet" href="tambah_data.css">
    <link rel="stylesheet" href="../dashboard/dashboard.css">
</head>
<body>
    <div class="container">
            <form action="../controller/logout.php" class="logout" method="post">
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        <div class="nav">
            <ul>
                <li><a href="../dashboard/dashboard.php" class='li_a'>Home</a></li>
                <li><a href="./tambah_data_mhs.php" class='li_a active'>Tambah Data Mahasiswa</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="content2" style="border-radius: 20px; min-height: 440px;">
                <div class="title">
                    <h1>Tambah Data Mahasiswa</h1>
                </div>
                <form class='formadd' action="../controller/adddata-controller.php" method="post">
                    <div class="nama">
                        <label for="nama">Nama mahasiswa</label>
                        <input type="text" id='nama' name='nama' placeholder='Masukkan nama mahasiswa'>
                    </div>
                    <div class="nim">
                        <label for="nim">Nim mahasiswa</label>
                        <input type="number" id='nim' name='nim' placeholder='Masukkan nim mahasiswa'>
                    </div>
                    <div class="umur">
                        <label for="umur">Umur mahasiswa</label>
                        <input type="number" id='umur' name='umur' placeholder='Masukkan umur mahasiswa'>
                    </div>
                    <div class="alamat">
                        <label for="alamat">Alamat mahasiswa</label>
                        <input type="text" id='alamat' name='alamat' placeholder='Masukkan alamat mahasiswa'>
                    </div>
                   <div class="gender">
                        <div class="lanang">
                            <label for="male">Lanang</label>
                            <input type="radio" id="male" name="gender" value="L">
                        </div>

                        <div class="wedok">
                            <label for="female">Wedok</label>
                            <input type="radio" id="female" name="gender" value="P">
                        </div>
                   </div>


                    <button type='submit'>Tambah</button>

                </form>
            </div>
        </div>
    </div>
    <?php 
                     if (isset($_SESSION['adddata'])) {
                        $added = $_SESSION['adddata']; 
                        if ($added == 'sukses') {
                            echo "<p class='notifberhasil'>*Data Berhasil Ditambahkan</p>";
                        } elseif ($added == 'gagal') {
                            echo "<p class='notifgagal'>*Terjadi kesalahan</p>";
                        } elseif ($added == 'exist') {
                            echo "<p class='notifgagal'>*Data sudah tersedia</p>";
                        } elseif ($added == 'tidak_diisi') {
                            echo "<p class='notifgagal'>*Tidak boleh kosong!</p>";
                        }
        
                        unset($_SESSION['adddata']);  
                    }
                    ?>

    <script src="../dashboard/dashboard.js"></script>
    <script src="https://unpkg.com/cropperjs/dist/cropper.min.js"></script>
</body>
</html>



