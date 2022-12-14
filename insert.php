<?php

include "config.php";
$ID = $_POST['id'];
$TUGAS = $_POST['tugas'];
$DEADLINE = $_POST['deadline'];

mysqli_query($con, "INSERT INTO `mytodo`(`id`, `tugas`, `deadline`) VALUES ('$ID]','$TUGAS','$DEADLINE')");
header("location:index.php");
?>