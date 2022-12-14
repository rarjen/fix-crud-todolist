<?php
require_once "config.php";

$host = "localhost:3308";
$user = "root";
$pass = "";
$dbname = "mytodo";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
  die("tidak terkoneksi");
}

if (isset($_POST['submit'])) {
  $tugas = $_POST['tugas'];
  $deadline = $_POST['deadline'];


  if ($tugas && $deadline) {
    $sql1 = "INSERT INTO mytodo(tugas,deadline) values ('$tugas', '$deadline')";
    $q1 = mysqli_query($conn, $sql1);
    if ($q1) {
      $success = "berhasil";
    } else {
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-success">
  <!-- newform -->
  <div class="card w-75 container-sm card col-md-6 mt-5">
    <div class="card-body">
      <form action="" method="POST">
        <div class="mb-3">
          <label for="disabledTextInput" class="form-label">Tugas</label>
          <input type="text" id="tugas" class="form-control" placeholder="Input Task" name="tugas">
        </div>
        <div class="mb-3">
          <label class="form-label">DEADLINE</label>
          <input type="date" class="form-select" id="deadline" name="deadline">

        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>
    </div>
  </div>
  <!-- endnewform -->
  <!-- GETDATA -->
  <div class="card w-75 container-sm card col-md-6 mt-5">
    <div class="body-card">
      <table class="table table-striped table-hover">
        <tr>
          <th class="number">No.</th>
          <th>Tugas</th>
          <th>Deadline</th>
          <th>Action</th>
        </tr>
        <?php
        $queryShow = "SELECT * FROM mytodo ORDER BY deadline ASC";
        $show = mysqli_query($conn, $queryShow);

        if (mysqli_num_rows($show) > 0) {
          $number = 1;
          while ($data = mysqli_fetch_assoc($show)) {
        ?>
            <tr>
              <td class="number"><?= $number; ?></td>
              <td><?= $data["tugas"]; ?></td>
              <td><?= $data["deadline"]; ?></td>
              <td class="action">
                <a href="edit.php?id=<?php echo $data["id"] ?>" class="btn btn-success">Edit</a>
                <a href="delete.php?id=<?php echo $data["id"] ?>" class="btn btn-danger">Delete</a>
              </td>
            </tr>
          <?php
            $number++;
          }
        } else {
          ?>
          <tr>
            <td colspan="4">No Data Found</td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>