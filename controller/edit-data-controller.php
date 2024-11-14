<?php
session_start();
include "./config.php";

if(isset($_POST['edit'])){
    $nilai = $_POST['nilai'];
    $userid = $_POST['userid'];

    if(!empty($nilai)) {
        $sql = "UPDATE mahasiswa SET nilai = '$nilai' WHERE userid = '$userid'";
        $query = mysqli_query($connect, $sql);

        if($query){
            $_SESSION['edit'] = 'berhasil';
        } else {
            $_SESSION['edit'] = 'gagal';
        }
    } else {
        $_SESSION['edit'] = 'empty';
    }
    
    header("location: ../dosen/data_mhs.php");
    exit;
}
?>