<?php require_once("app/db.php")?>
<?php
 $id = $_GET["delid"];

    if(isset($_GET["delid"])){
       
    $row =$conn->prepare("SELECT * FROM updateuser WHERE id='$id'");
    $row->execute();

    if($row->rowCount()> 1){
        echo"User Not FOund";
    }else{  
    $sql ="DELETE FROM updateuser WHERE id='$id'";
    $conn->query($sql);
    header("location: /project2/index.php");
    exit;
    }
    }
  
?>