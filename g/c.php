<?php include_once("connectDB.php"); ?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>รัชชานนท์ พรดีมา</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
            min-height: 100vh;
            padding-bottom: 50px;
        }
        .main-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .card-header {
            background-color: #4a90e2;
            color: white;
            padding: 20px;
        }
        .img-product {
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ddd;
            transition: transform 0.2s;
        }
        .img-product:hover {
            transform: scale(1.5);
        }
        
        /* --- จุดที่แก้ไข: บังคับหัวตารางและตัวหนังสือให้เป็นสีดำ --- */
        table.dataTable thead th {
            background-color: #f8f9fa;
            color: #000000 !important; /* สีดำ */
            font-weight: bold;
        }
        table.dataTable tbody td {
            color: #000000 !important; /* สีดำ */
            vertical-align: middle;
        }
        /* ----------------------------------------------------- */
    </style>
</head>

<body>

<div class="container mt-5">
    <div class="card main-card">
        <div class="card-header">
            <h2 class="m-0"><i class="bi bi-shop"></i> รัชชานนท์ พรดีมา (นิว)</h2>
            <small>ระบบจัดการรายการสินค้า Pop Supermarket</small>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table id="productTable" class="table table-hover table-striped table-bordered" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th>Order ID</th>
                            <th>สินค้า</th>
                            <th>ประเภทสินค้า</th>
                            <th>วันที่</th>
                            <th>ประเทศ</th>
                            <th class="text-end">จำนวนเงิน</th>
                            <th class="text-center">รูปภาพ</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM `popsupermarket` ORDER BY p_product_name ASC";
                        $rs = mysqli_query($conn, $sql);
                        $total = 0;

                        while($data = mysqli_fetch_array($rs)) { 
                            $total += $data['p_amout']; 
                    ?>
                        <tr>
                            <td><?php echo $data['p_order_id']; ?></td>
                            <td><b><?php echo $data['p_product_name']; ?></b></td>
                            <td><span class="badge bg-info text-dark"><?php echo $data['p_category']; ?></span></td>
                            <td><?php echo date('d/m/Y', strtotime($data['p_date'])); ?></td>
                            <td><?php echo $data['p_country']; ?></td>
                            <td class="text-end"><?php echo number_format($data['p_amout'], 0); ?></td>
                            <td class="text-center">
                                <img src="<?php echo $data['p_product_name'];?>.jpg" 
                                     class="img-product" 
                                     width="50" 
                                     height="50"
                                     alt="<?php echo $data['p_product_name'];?>"
                                     onerror="this.src='https://placehold.co/50x50?text=No+Img';"> 
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot class="table-secondary">
                        <tr>
                            <td colspan="5" class="text-center fw-bold" style="color:#000;">Total (ยอดรวมทั้งหมด)</td>
                            <td class="text-end fw-bold text-success" style="font-size: 1.1em;">
                                <?php echo number_format($total, 0); ?>
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#productTable').DataTable({
            "language": {
                "search": "ค้นหา:",
                "lengthMenu": "แสดง _MENU_ รายการ",
                "info": "แสดง _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ",
                "paginate": {
                    "first": "หน้าแรก",
                    "last": "หน้าสุดท้าย",
                    "next": "ถัดไป",
                    "previous": "ก่อนหน้า"
                },
                "zeroRecords": "ไม่พบข้อมูลที่ค้นหา"
            },
            "order": [[ 0, "asc" ]]
        });
    });
</script>

</body>
</html>