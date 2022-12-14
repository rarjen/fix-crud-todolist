<?php

include  "config.php";
echo $id = $_GET['ID'];
mysqli_query($con, "DELETE FROM `mytodo` WHERE id = $id");
header("location: index.php");

?>