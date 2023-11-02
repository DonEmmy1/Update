<?php require_once("app/db.php") ?>

<?php
$id    = "";
$name   = "";
$Email   = "";
$Phone   = "";
$Address   = "";

$errorMessage = "";
$SuccessMessage = "";

    if (!isset($_GET["updateid"])) {
        header("location: /project2/index.php");
        exit;
    }
    $id = $_GET["updateid"];
    try {
        $sql = "SELECT * FROM updateuser WHERE id ='$id'";
        $result = $conn->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            header("location: /project2/index.php");
        }
        $name = $row["Name"];
        $Email = $row["Email"];
        $Phone = $row["Phone"];
        $Address = $row["Address"];
      
    } catch (PDOException $e) {
        echo "<span class='text-danger'>" . $e->getMessage() . "</span>";
    }
    
if (isset($_POST["submit"])) { 
        $id    = $_POST["id"];
        $name = $_POST["name"];
        $Email = $_POST["Email"];
        $Phone = $_POST["Phone"];
        $Address = $_POST["Address"];

        if (!empty($id)   && !empty($name) && !empty($Email) && !empty($Phone) && !empty($Address)) {
            try {
                $sql = "UPDATE `updateuser` SET `Name`=' $name',`Email`='$Email ',`Phone`=' $Phone',`Address`='$Address' WHERE id = '$id'  ";
                $result = $conn->query($sql);
                $SuccessMessage = "Updated Successfully";
                
            } catch (PDOException $e) {
                echo "<span class='text-danger'>" . $e->getMessage() . "</span>";
            }

        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container my-5">
        <h2>New Client</h2>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Email" value="<?php echo $Email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Phone" value="<?php echo $Phone; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Address" value="<?php echo $Address; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" name="submit" class="btn btn-success">Submit </button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-primary" href="" role="button">Cancel</a>
                </div>
            </div>
        </form>
        <?php
                if (!empty($SuccessMessage)) {
                    echo "
                <div class='alert alert-success alert-dismissible'>
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                <strong>$SuccessMessage</strong>
                </div>
                ";
                }
                ?>
    </div>
</body>

</html>