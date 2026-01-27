<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รัชชานนท์ พรดีมา</title>
</head>

<body>
<h1>รัชชานนท์ พรดีมา (นิว)</h1>
<form method="post" action="">
    ค้นหา <input type="text" name="a" required autofocus>
    <button type="submit" name="Submit">OK</button>
</form>
<table border = "1">
<tr>    
    <th>Order ID</th>
    <th>สินค้า</th>
    <th>ประเภทสินค้า</th>
    <th>วันที่</th>
    <th>ประเทศ</th>
    <th>จำนวนเงิน</th>
    <th>รูป</th>
</tr>

<?php
 include_once("connectDB.php");
 @$kw = $_POST['a'];
 //$sql = "SELECT * FROM `popsupermarket` 
 //WHERE p_country = 'Sweden' 
 //AND p_category = 'Vegetables' 
 //ORDER BY p_product_name ASC";

//$sql = "SELECT * FROM `popsupermarket`";
$sql = "SELECT * FROM `popsupermarket` WHERE p_product_name Like '%{$kw}%' OR p_category Like '%{$kw}%' OR p_country Like '%{$kw}%'";
$rs = mysqli_query($conn,$sql);
$total = 0;
while($data = mysqli_fetch_array($rs)) { 
    $total+=$data['p_amout'];
    ?>
        <tr>
            <td><?php echo $data['p_order_id'];?></td>
            <td><?php echo $data['p_product_name'];?></td>
            <td><?php echo $data['p_category'];?></td>
            <td><?php echo $data['p_date'];?></td>
            <td><?php echo $data['p_country'];?></td>
            <td align = "right"><?php echo $data['p_amout'];?></td>
            <td><img src ="<?php echo $data['p_product_name'];?>.jpg" width="55"></td>
        </tr>
    <?php }?> 
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align = "center"><b>Total</b></td>
    <td align = "right"><b><?php echo number_format($total,0);?></b></td>
    <td>&nbsp;</td>
</tr>
    </table>
</table>