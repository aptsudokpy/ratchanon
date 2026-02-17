<meta charset = "utf-8" >
<?php 
    include_once("connectDB.php")
    $id = $GET['id'];
    $sql= "DELETE FROM `regions` WHERE r_id = '{$id}'";
    mysqli_query($conn,$sql) or die ("ลบไม่่ได้")
    
    echo"<script>"
    echo "window.location = 'a.php';";
    echo "</script>"
    ?>
