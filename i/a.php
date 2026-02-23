<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- กำหนด encoding ภาษาไทย -->
<title>รัชชานนท์ พรดีมา (นิวเคลียร์)</title>
</head>

<body>

    <!-- หัวข้อหน้าเว็บ -->
    <h1>งาน i</h1>
    <h1>รัชชานนท์ พรดีมา (นิวเคลียร์)</h1>

<!-- ฟอร์มรับข้อมูล -->
<form method="post" action="">
    <!-- ช่องกรอกชื่อภาค -->
    ชื่อภาค <input type="text" name="rname" autofocus required>
    
    <!-- ปุ่มส่งข้อมูล -->
    <button type="Submit" name="Submit"> บันทึก </button>
</form>

<br>
<br>

<?php
    // ตรวจว่ามีการกดปุ่ม Submit หรือยัง
    if(isset($_POST['Submit'])){
        
        // เรียกไฟล์เชื่อมต่อฐานข้อมูล
        include_once("connectDB.php");

        // รับค่าจาก input name="rname"
        $rname = $_POST['rname'];

        // คำสั่งเพิ่มข้อมูลลง table regions
        // NULL คือให้ auto increment r_id
        $sql2 = "INSERT INTO `regions` VALUES (NULL, '{$_POST['rname']}')";

        // รันคำสั่ง SQL
        mysqli_query($conn,$sql2) or die ("insert ไม่ได้");
    }
?>

<!-- ตารางแสดงข้อมูล -->
<table border="1">
    <tr>
        <th>รหัสภาค</th>
        <th>ชื่อภาค</th>
    </tr>

<?php
    // เรียกไฟล์เชื่อม DB อีกครั้ง (เพื่อใช้ SELECT)
    include_once("connectDB.php");

    // ดึงข้อมูลทั้งหมดจาก table regions
    $sql = "SELECT * FROM `regions` ORDER BY `r_id` ASC";

    // รันคำสั่ง SQL
    $rs = mysqli_query($conn , $sql); 

    // วนลูปทีละ row
    while($data = mysqli_fetch_array($rs)){
?>
    <tr>
        <!-- แสดงรหัสภาค -->
        <td><?php echo $data['r_id'];?></td>

        <!-- แสดงชื่อภาค -->
        <td><?php echo $data['r_name'];?></td>
    </tr>
<?php } // จบ while ?>
</table>

</body>
</html>
