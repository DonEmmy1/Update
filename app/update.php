<?php
    try{
        $sql = "SELECT * FROM `updateuser`";
        $result = $conn->query($sql);
    }catch(PDOException $e){
        echo "<span class='text-danger'>".$e->getMessage()."</span>";
    }
        $sn = 1;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
        echo"
        <tr>
        <td>".$sn++."</td>
        <td>$row[Name]</td>
        <td>$row[Email]</td>
        <td>$row[Phone]</td>
        <td>$row[Address]</td>
        <td>$row[Created_At]</td>
            <td>
             <a href='/project2/edit.php?updateid=$row[id]' class='btn btn-primary btn-sm' role='Button' >Edit</a>
            <a href='/project2/delete.php?delid=$row[id]' class='btn btn-danger btn-sm' role='button'>delete</a>
        </td>
    </tr>
        ";
    }
?>