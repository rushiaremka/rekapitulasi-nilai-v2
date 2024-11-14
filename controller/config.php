<?php 

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'db_php1';

$connect = mysqli_connect($host, $user, $password, $db);

if(!$connect){
    die("TIdak terhubung ke server" . mysqli_connect_error());
}

?>