<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>รายงานยอดขาย - รัชชานนท์ พรดีมา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f8f9fa; }
        .card { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .table-thead { background-color: #0d6efd; color: white; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">รัชชานนท์ พรดีมา (นิว)</h1>
        <p class="text-muted">ระบบสรุปยอดขายรายประเทศจากฐานข้อมูล</p>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <div class="card p-4">
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-5">
            <div class="card p-3 h-100">
                <h5 class="mb-3 fw-bold">ตารางสรุปข้อมูล</h5>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-thead">
                            <tr>
                                <th>ประเทศ</th>
                                <th class="text-end">ยอดขาย</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include_once("connectDB.php");
                            
                            // คำสั่ง SQL สรุปผลรวมยอดขายรายประเทศ
                            $sql = "SELECT p_country, SUM(p_amout) AS total 
                                    FROM popsupermarket 
                                    GROUP BY p_country";
                            
                            $rs = mysqli_query($conn, $sql);
                            
                            $labels = [];
                            $dataset = [];
                            $grand_total = 0;

                            while ($data = mysqli_fetch_array($rs)) {
                                $country = $data['p_country'];
                                $total = $data['total'];      
                                
                                // เก็บข้อมูลไว้ทำกราฟ
                                $labels[] = $country;
                                $dataset[] = $total;
                                $grand_total += $total;
                                ?>
                                <tr>
                                    <td><?php echo $country; ?></td>
                                    <td class="text-end fw-bold text-success">
                                        <?php echo number_format($total, 0); ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot class="table-light fw-bold">
                            <tr>
                                <td>ยอดรวมทั้งหมด</td>
                                <td class="text-end text-primary">
                                    <?php echo number_format($grand_total, 0); ?>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card p-3 h-100">
                <h5 class="mb-3 fw-bold">กราฟยอดขายรายประเทศ</h5>
                <canvas id="salesChart" height="250"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    
    // ตั้งค่ากราฟ
    new Chart(ctx, {
        type: 'bar', // กราฟแท่งที่นิยมที่สุด
        data: {
            labels: <?php echo json_encode($labels); ?>, // ข้อมูลแกน X
            datasets: [{
                label: 'ยอดขายรวม ($)',
                data: <?php echo json_encode($dataset); ?>, // ข้อมูลแกน Y
                backgroundColor: [
                    'rgba(13, 110, 253, 0.7)',
                    'rgba(25, 135, 84, 0.7)',
                    'rgba(255, 193, 7, 0.7)',
                    'rgba(220, 53, 69, 0.7)',
                    'rgba(13, 202, 240, 0.7)',
                    'rgba(102, 16, 242, 0.7)'
                ],
                borderColor: '#ffffff',
                borderWidth: 2,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(0,0,0,0.05)' }
                },
                x: {
                    grid: { display: false }
                }
            }
        }
    });
</script>

</body>
</html>