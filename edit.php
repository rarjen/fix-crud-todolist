<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>A11.2022.14765</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-success">
    <?php
    // CREATE Todo-List
    try {
        require_once("config.php");
        $id = $_GET['id'];
        // print_r($_GET["id"]);
        if (isset($_POST["update"])) {
            $tugas = $_POST["tugas"];
            $deadline = $_POST["deadline"];
            $idGet = $_POST["id"];

            $queryUpdate = "UPDATE mytodo SET tugas = '" . $tugas . "', deadline = '" . $deadline . "' WHERE id = '" . $idGet . "'";
            $updated = mysqli_query($conn, $queryUpdate);

            if ($updated) {
                header('Location: index.php');
            }
        }
    } catch (Exception $error) {
        // Jika Ada Error maka akan di handle (ditangkap) disini
        echo "Error", $error->getMessage(), "\n";
    }
    ?>

    <?php
    try {
        $id = $_GET["id"];
        $querySelect = "SELECT * FROM mytodo WHERE id = $id";
        $selected = mysqli_query($conn, $querySelect);
        $tugasEdit = "";
        $dateEdit = "";


        $data = mysqli_fetch_assoc($selected);
        $tugasEdit = $data["tugas"];
        $dateEdit = $data["deadline"];
    } catch (Exception $error) {
        // Jika Ada Error maka akan di handle (ditangkap) disini
        echo "Error", $error->getMessage(), "\n";
    }
    ?>
    <div class="card w-75 container-sm card col-md-6 mt-5">
        <div class="card-body">
            <form action="edit.php" method="POST">
                <input type="hidden" name="id" value="<?= $_GET["id"]; ?>">
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Tugas</label>
                    <input type="text" id="tugas" class="form-control" placeholder="Input Task" name="tugas" value="<?= $tugasEdit; ?>">
                </div>
                <div class=" mb-3">
                    <label class="form-label">DEADLINE</label>
                    <input type="date" class="form-select" id="deadline" name="deadline" value="<?= $dateEdit; ?>">

                </div>
                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>