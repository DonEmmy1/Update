<?php require_once("app/db.php")?>
<?php
    $name   ="";
    $Email   ="";
    $Phone   ="";
    $Address   ="";

    $errorMessage = "";
    $SuccessMessage = "";

    if(isset($_POST["submit"])){
            $name = $_POST["name"];
             $Email = $_POST["Email"];
             $Phone = $_POST["Phone"];
            $Address = $_POST["Address"];

        if(!empty($_POST["name"]) && !empty($_POST["Email"]) && !empty($_POST["Phone"]) && !empty($_POST["Address"])){

            $query = $conn->prepare("SELECT * FROM updateuser WHERE Email ='$Email'");
            $query->execute();

            if($query->rowCount()> 1){
                $errorMessage = "Email Already Exist";
            }else{
            try{
             $sql ="INSERT INTO `updateuser`(`Name`, `Email`, `Phone`, `Address`) VALUES ('$name','$Email',  '$Phone', ' $Address')";
             $conn->exec($sql);
                
        
                $SuccessMessage = "Client Added Succesfully";
                echo $SuccessMessage;
                header('Refresh:3; url: /project2/index.php');

            }catch(PDOException $e){
            echo "<span class='text-danger'>".$e->getMessage()."</span>";
            }
        }
            $name   ="";
            $Email   ="";
            $Phone   ="";
            $Address   ="";

        }else{
                $errorMessage = "All Field Are Required";
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
        <?php
            if(!empty($errorMessage)){
                echo"
                <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                <strong>$errorMessage</strong> 
                </div>
                ";
            }
        ?>
        <form action="" method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="Email" value="<?php echo $Email;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="Phone" value="<?php echo $Phone;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="Address" value="<?php echo $Address;?>">
                </div>
            </div>
            <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" name="submit" class="btn btn-success">Submit </button>
                </div>
                    <div class="col-sm-3 d-grid">
                    <a class="btn btn-primary" href="" role="button">Cancel</a>
                </div>
         <?php 
         if(!empty($SuccessMessage)){
            echo"
                <div class='alert alert-success alert-dismissible'>
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                <strong>$SuccessMessage</strong>
                </div>
                ";
         }
        ?>
        </div>
    </form>
    </div>
</body>
</html>