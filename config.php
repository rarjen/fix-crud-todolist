<?php

$host = "localhost:3306";
$user = "root";
$pass = "";
$dbname = "mytodo";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if(!$conn){
    die("tidak bisa terkondisi");
}
else{
    echo "koneksi berhasil";
}
?>