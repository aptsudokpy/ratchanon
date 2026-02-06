<?php
    session_start();
    unset( $_SESSION['a_name']);
    unset($_SESSION['a_id']);
    echo"<script>";
    echo"window.location='index.php';";
    echo"</script>";
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login: รัชชานนท์ พรดีมา (นิวเคลียร์)</title>
</head>
<body>
    <h1>หน้าหลัก : รัชชานนท์ พรดีมา (นิวเคลียร์)</h1>
    <a href = "logout.php"> ออกจากระบบ</a>

</body>
</html>
