<?php 
include '../controller/config.php';
session_start();

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
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://unpkg.com/cropperjs/dist/cropper.min.css">
</head>
<body>
    <?php 
    $sql = "SELECT * FROM users WHERE username='$username'";
    $query = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($query);

    if($data['role'] == "admin" || $data['role'] == "dosen" || $data['role'] == "mahasiswa"){
        ?>
        <div class="container">
            <form action="../controller/logout.php" class="logout" method="post">
                <button type="submit" class="logout-btn">Logout</button>
            </form>
            <div class="nav">
                <ul>
                    <li><a href="dashboard.php" class='li_a active'>Home</a></li>
                    <?php
                    if($data['role'] == "admin") {
                        echo "<li><a href='../admin/tambah_data_mhs.php' class='li_a'>Tambah Data Mahasiswa</a></li>";
                    } elseif($data['role'] == "dosen") {
                        echo "<li><a href='../dosen/data_mhs.php' class='li_a'>Data Mahasiswa</a></li>";
                    } elseif($data['role'] == "mahasiswa") {
                        echo "<li><a href='../mahasiswa/data_diri.php' class='li_a'>Lihat Data Anda</a></li>";
                    }
                    ?>
                </ul>
            </div>

            <div class="content">
                <div class="profile">
                    <?php
                    $sql = "SELECT username, photo_profile FROM users WHERE username = '$username'";
                    $query = mysqli_query($connect, $sql);
                    $data = mysqli_fetch_assoc($query);

                    if ($data['photo_profile']) {
                        echo '<img onClick="openTab()" id="profile-image" src="' . $data['photo_profile'] . '" alt="Profile Picture" class="profile-img">';
                    } else {
                        echo '<img src="../assets/person.png" class="profile-img" onClick="openTab()" id="profile-image">';
                    }
                    ?>
                    <div class="nama"><?php echo $data['username']; ?></div>
                </div>

                <form style="display: none;" id='editProfile' action="../controller/upload-controller.php" method='post' enctype='multipart/form-data' >
                    <span class='closeBtn'>&times;</span>
                    <label for="profile-img" class='custom-file-upload'>Choose Profile Picture</label>
                    <input type="file" id='profile-img' name='profile-img' accept='image/*' style='display: none;'>
                    <input type="hidden" id="cropped_image" name="cropped_image">
                    <span id='file-name'>No File Chosen</span>
                    <button type='submit'>Upload</button>
                </form>


                <div id='cropModal' style='display: none;'>
                    <div class="modal-content">
                        <img id='imageToCrop' src="" alt="Image To Crop">
                        <button id='cropButton'>Crop</button>
                        <button id='cancelButton'>Cancel</button>
                    </div>
                </div>

                <div class="content2">
                    <div class="sapa">
                        <?php 
                        $sql = "select * from users where username = '$username'";
                        $query = mysqli_query($connect, $sql);
                        $data = mysqli_fetch_assoc($query); 
                        echo "<p>Selamat datang " . $data['username'] . "</p>";
                        echo "<p>Role kamu adalah " . $data['role'] . "</p>";
                        ?>
                    </div>
                    <div class="kosong">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi, vitae sit? Excepturi harum enim quisquam vitae repellat dolor quas magnam, exercitationem dicta similique voluptatibus voluptatum facilis mollitia saepe debitis quam?</p>
                    </div>
                    <div class="kosong">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi, vitae sit? Excepturi harum enim quisquam vitae repellat dolor quas magnam, exercitationem dicta similique voluptatibus voluptatum facilis mollitia saepe debitis quam?</p>
                    </div>
                    <div class="kosong">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi, vitae sit? Excepturi harum enim quisquam vitae repellat dolor quas magnam, exercitationem dicta similique voluptatibus voluptatum facilis mollitia saepe debitis quam?</p>
                    </div>
                    <div class="kosong">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi, vitae sit? Excepturi harum enim quisquam vitae repellat dolor quas magnam, exercitationem dicta similique voluptatibus voluptatum facilis mollitia saepe debitis quam?</p>
                    </div>
                    <div class="kosong">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi, vitae sit? Excepturi harum enim quisquam vitae repellat dolor quas magnam, exercitationem dicta similique voluptatibus voluptatum facilis mollitia saepe debitis quam?</p>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
    }
    ?>
    <?php
    $uploaded = isset($_SESSION['uploaded']);
    if($uploaded == true){
        echo "<p class='notifberhasil'>Upload Photo Profile berhasil</p>";
    } elseif($uploaded == 'Failed to upload image'){
        echo "<p class='notifgagal'>Upload Photo Profile Tidak Berhasil</p>";
    } elseif($uploaded == 'Invalid type'){
        echo "<p class='notifgagal'>Invalid type</p>";
    }
    unset($_SESSION['uploaded']);
    ?>

<script src="dashboard.js"></script>
<script src="https://unpkg.com/cropperjs/dist/cropper.min.js"></script>
</body>
</html>
