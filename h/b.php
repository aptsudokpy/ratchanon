<?php
    session_start();
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รัชชานนท์ พรดีมา (นิวเคลียร์)</title>
</head>
<body>
    <h1>b.php</h1>

<?php
 echo @$_SESSION['name']."<br>";
 echo @$_SESSION['nickname']."<br>";


?>

</body>
</html>