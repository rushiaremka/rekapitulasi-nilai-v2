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
    <link rel="stylesheet" href="data_diri.css">
</head>
<body>
    <div class="container">
    <form action="../controller/logout.php" class="logout" method="post">
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        <div class="nav">
            <ul>
                <li><a href="../dashboard/dashboard.php" class='li_a'>Home</a></li>
                <li><a href="./data_diri.php" class='li_a active'>Lihat Data Anda</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="content2">
                <?php 
                $sql = "SELECT * FROM mahasiswa WHERE nama = '$username'";
                $query = mysqli_query($connect, $sql);
                $data = mysqli_fetch_assoc($query);
                ?>
               <div class="content3">
               <table>
                    <tbody>
                        <tr>
                            <td>
                                Nama
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo htmlspecialchars($data['nama']) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nim
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo htmlspecialchars($data['nim']) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Umur
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo htmlspecialchars($data['umur']) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Alamat
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo htmlspecialchars($data['alamat']) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Gender
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo htmlspecialchars($data['gender']) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nilai
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?php echo htmlspecialchars($data['nilai']) ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
               </div>
            </div>
        </div>
    </div>

    <script src="../dashboard/dashboard.js"></script>
    <script src="https://unpkg.com/cropperjs/dist/cropper.min.js"></script>
</body>
</html>