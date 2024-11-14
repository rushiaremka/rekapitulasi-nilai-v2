<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cropped_image"])) {
    $username = $_SESSION['username']; 
    $upload_dir = "../assets/uploads/";

    $cropped_image = $_POST['cropped_image'];
    $cropped_image = str_replace('data:image/png;base64,', '', $cropped_image);
    $cropped_image = str_replace(' ', '+', $cropped_image);
    $image_data = base64_decode($cropped_image);

    $file_name = uniqid() . '.png';
    $upload_file = $upload_dir . $file_name;

    if(file_put_contents($upload_file, $image_data)){
        $sql = "update users set photo_profile = '$upload_file' where username = '$username'";
        if (mysqli_query($connect, $sql)) {
            $_SESSION['uploaded'] = true;
            header("location: ../dashboard/dashboard.php");
            exit;
        } else {
            $_SESSION['uploaded'] = 'Failed to upload image';
            header("location: ../dashboard/dashboard.php");
        }
    } else {
        $_SESSION['uploaded'] = 'Failed to save image file';
        header("location: ../dashboard/dashboard.php");
    }
} else {
    $_SESSION['uploaded'] = 'Invalid type';
    header("location: ../dashboard/dashboard.php");
}
unset($_SESSION['uploaded']);
?>




<!-- // Ambil data Base64 dari cropped image
    $cropped_image = $_POST['cropped_image'];
    $cropped_image = str_replace('data:image/png;base64,', '', $cropped_image);
    $cropped_image = str_replace(' ', '+', $cropped_image);
    $image_data = base64_decode($cropped_image);


    // Tentukan nama file unik
    $file_name = uniqid() . '.png';
    $upload_file = $upload_dir . $file_name;


    // Simpan file di direktori server
    if (file_put_contents($upload_file, $image_data)) {
        // Simpan path file ke database
        $sql = "UPDATE users SET photo_profile = '$upload_file' WHERE username = '$username'"; -->