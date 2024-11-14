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
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="../dashboard/dashboard.css">
    <link rel="stylesheet" href="data_mhs.css">
</head>
<body>
    <div class="container">
    <form action="../controller/logout.php" class="logout" method="post">
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        <div class="nav">
            <ul>
                <li><a href="../dashboard/dashboard.php" class='li_a'>Home</a></li>
                <li><a href="../dosen/data_mhs.php" class='li_a active'>Data Mahasiswa</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="content2">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>Gender</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                        $sql = "select * from mahasiswa";
                        $query = mysqli_query($connect, $sql);
                        $number = 1;

                        while($mahasiswa = mysqli_fetch_array($query)){
                            echo '<tr>';
                            echo '<td>' . $number . '</td>';
                            echo "<td>" . htmlspecialchars($mahasiswa['nama']) . '</td>';
                            echo "<td>" . htmlspecialchars($mahasiswa['nim']) . '</td>';
                            echo "<td>" . htmlspecialchars($mahasiswa['umur']) . '</td>';
                            echo "<td>" . htmlspecialchars($mahasiswa['alamat']) . '</td>';
                            echo "<td>" . htmlspecialchars($mahasiswa['gender']) . '</td>';
                            echo "<td>" . htmlspecialchars($mahasiswa['nilai']) . '</td>';
                            echo '<td>';

                            echo '<form action="../controller/edit-data-controller.php" method="post" class="edit-form">';
                            echo '<input type="hidden" name="userid" value="' . htmlspecialchars($mahasiswa['userid']) . '">';
                            echo '<button class="edit" type="button" onclick="openEditModal(' . htmlspecialchars($mahasiswa['userid']) . ')">Edit Nilai</button>';
                            echo '</form>';
                            
                            echo '<form action="../controller/hapus-data-controller.php" method="post">';
                            echo '<input type="hidden" name="userid" value="' . htmlspecialchars($mahasiswa['userid']) . '">';
                            echo '<button class="hapus" type="submit">Hapus Nilai</button>';
                            echo '</form>';
                            echo '</td>';
                            echo '</tr>';
                            $number++;
                        }
                    ?>
                </tbody>
            </table>
            <form action="../controller/edit-data-controller.php" method="post" id="tab1" class="modal">
                <span class='closeBtn'>&times;</span>
                <label for="nilai">Nilai</label>
                <input type="number" name="nilai" id="nilai" placeholder="Masukkan nilai mahasiswa">
                <input type="hidden" name="userid" id="editUserId">
                <button type="submit" value="save" name="edit">Edit</button>
            </form>
            </div>
        </div>
        <?php 
                if(isset($_SESSION['edit'])){
                    $edit = $_SESSION['edit'];
                    if($edit == 'berhasil') {
                        echo "<p class='notifberhasil'>*Berhasil mengubah nilai</p>";
                    } elseif($edit == 'gagal'){
                        echo "<p class='notifgagal'>*Gagal mengubah nilai</p>";
                    } elseif($edit == 'empty') {
                        echo "<p class='notifgagal'>*Tidak boleh kosong</p>";
                    }
                }               
                unset($_SESSION['edit']);
                ?>
    </div>

    <script src="data_mhs.js"></script>
    <script src="../dashboard/dashboard.js"></script>
    <script src="https://unpkg.com/cropperjs/dist/cropper.min.js"></script>
</body>
</html>