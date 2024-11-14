<?php 

session_start();

include "./config.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_POST['username'];
    $pw = $_POST['password'];
    $email = $_POST['email'];
    
    $pass = md5($pw);
    
    if(empty($user) || empty($pw)){
        $_SESSION['error'] = "Username atau password tidak boleh kosong";
        header('location: ../login-register/logreg.php');
    }
    
    $sql = "select * from users where username='$user'";
    $query = mysqli_query($connect, $sql);
    $result = mysqli_num_rows($query);
    
    
    if($result > 0){
        // die("Anda sudah login, silahkan menuju halaman login");
        header("location: ../login-register/logreg.php");
        exit;
    } elseif($result < 1){
        $sql2 = "insert into users(username,email, password) values ('$user', '$email', '$pass')";
        $query2 = mysqli_query($connect, $sql2);
        $_SESSION['register'] = True;
        header("location: ../login-register/logreg.php");
        exit;
    }
}
else{
    die("mau apa lu");
}


?>