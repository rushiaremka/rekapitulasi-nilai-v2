<?php 
session_start();
include "./config.php";

$nama = mysqli_real_escape_string($connect, $_POST['nama']);
$nim = mysqli_real_escape_string($connect, $_POST['nim']);
$umur = mysqli_real_escape_string($connect, $_POST['umur']);
$alamat = mysqli_real_escape_string($connect, $_POST['alamat']);
$gender = mysqli_real_escape_string($connect, $_POST['gender']);


$sql_user1 = "select * from  users where username = '$nama'";
$sql_mahasiswa1 = "select * from mahasiswa where nama = '$nama'";
$query_user = mysqli_query($connect, $sql_user1);
$query_mahasiswa = mysqli_query($connect, $sql_mahasiswa1);
$result_user = mysqli_num_rows($query_user);
$result_mahasiswa = mysqli_num_rows($query_mahasiswa);

if(!empty($nama)){
    if($result_user < 1){
        $sql_mahasiswa2 = "insert into mahasiswa(nama, nim, umur, alamat, gender) values ('$nama', '$nim', '$umur', '$alamat', '$gender')";
        // $sql_user2 = "insert into users(username) values('$nama')";
        $query_mahasiswa2 = mysqli_query($connect, $sql_mahasiswa2);
        // $query_user2 = mysqli_query($connect, $sql_user2);
        if($query_mahasiswa2){
            $_SESSION['adddata'] = 'sukses';
        }else{
            $_SESSION['adddata'] = 'gagal';
        }
    } else{
        $_SESSION['adddata'] = 'exist';
    }
} else{
    $_SESSION['adddata'] = 'tidak_diisi';
}

header('location: ../admin/tambah_data_mhs.php');
exit;


?>