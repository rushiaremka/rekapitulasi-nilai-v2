<?php 
session_start();

include "./config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if (!empty($username) || !empty($password)) {
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $query = mysqli_query($connect, $sql);
        $result = mysqli_num_rows($query);

        if ($result > 0) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['role'] = $data['role'];
            header("location: ../dashboard/dashboard.php");
            exit;
        } elseif ($data['username'] != $username || $data['password'] != $password) {
            $_SESSION['incorrect'] = true;
            header("location: ../login-register/logreg.php?error=(password_salah)");
            exit;
        }
        else {
            $_SESSION['notfound'] = true;
            header("location: ../login-register/logreg.php?error=(username_atau_password_tidak_ditemukan)");
            exit;
        }
    } 
    else {
        $_SESSION['error'] = true;
        header("location: ../login-register/logreg.php?error=username_atau_password_tidak_boleh_kosong");
    }
}
else {
    die("mau apa lu?");
}


?>