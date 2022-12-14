<?php
$id = $_GET["id"];

require_once "config.php";
mysqli_query($conn, "DELETE FROM `mytodo` WHERE id = $id");
header("location: index.php");
