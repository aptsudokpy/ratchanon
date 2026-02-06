<?php
    include_once("check_login.php");
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

<?php echo $_SESSION['a_name']; ?>
<ul>
    <a href = "index2.php"><li> หน้าหลัก</li></a>
    <a href = 'products.php'><li>จัดการสินค้า</li></a>
    <a href = 'order.php'><li>จัดการออร์เดอร์</li></a>
    <a href = 'customer.php'><li>จัดการลูกค้า</li></a>
    <a href = "logout.php"> <li>ออกจากระบบ</li></a>
    
</ul>
    
</body>
</html>