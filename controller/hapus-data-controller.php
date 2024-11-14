<?php
session_start();
include "./config.php";

$userid = $_POST['userid'];

$sql = "update mahasiswa set nilai = NULL WHERE userid = '$userid'";
$query = mysqli_query($connect, $sql);

if($query){
    $_SESSION['delete'] = 'berhasil';
} else{
    $_SESSION['delete'] = 'gagal';
}

header("location: ../dosen/data_mhs.php");
exit;
?>