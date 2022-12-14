<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbnamae = "mytodo";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if(!$conn){
  die("tidak terkoneksi");
}
$id = "";
$tugas = "";
$deadline =  "";
if (isset($_POST['submit'])){
  $id = $_POST['id'];
  $tugas = $_POST['tugas'];
  $deadline = $_POST['deadline'];


if($id, $tugas, $deadline){
  $sql1 = "insert into mytodo(id,tugas,dedaline) values ('$id', '$tugas', '$deadline')";
  $q1 = musqli_query($conn, $sql1);
  if($q1){
    success = "berhasil";
  }
  else{
    $eror = "gagal";
  }
}
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>A11.2022.14765</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body class="bg-success">
    <!-- newform -->
    <div class="card w-75 container-sm card col-md-6 mt-5">
  <div class="card-body">
  <form action="insert.php" method="POST">
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Tugas</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
    </div>
    <div class="mb-3">
      <label class="form-label">DEADLINE</label>
      <input type="date" class="form-select" placeholder="disable input" >
        
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>
</div>
    <!-- endnewform -->
<!-- GETDATA -->
<?php
include "config.php";
$no = 1;
$rawData = mysqli_query($conn, "SELECT * FROM mytodo");

?>
<div class="container">
<div class="col-8 bg-white m-auto mt-3">
<table class="table">
        <tbody>
            <?php
            while ($row = mysqli_fetch_array($rawData)) {
            ?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row ['tugas'] ?></td>
                <td><?php echo $row ['deadline'] ?></td>
                <td style="width:10%;"><a href="delete.php? ID= <?php echo $row['id']?>" class="btn btn-outline-danger">Delete</a></td>
                <td style="width:10%;"><a href="update.php? ID= <?php echo $row['id']?>" class="btn btn-outline-primary">Update </a></td>
            </tr>
            <?php
            }
            
            ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>