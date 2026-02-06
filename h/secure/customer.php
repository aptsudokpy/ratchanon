<?php
    include_once("check_login.php");
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการลูกค้า: รัชชานนท์ พรดีมา (นิวเคลียร์)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
            --glass-bg: rgba(255, 255, 255, 0.85);
        }

        body {
            font-family: 'Kanit', sans-serif;
            background: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
            background-attachment: fixed;
            min-height: 100vh;
            margin: 0;
        }

        .glass-panel {
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 25px;
            margin: 20px;
            min-height: calc(100vh - 40px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Sidebar */
        .sidebar {
            background: rgba(255, 255, 255, 0.5);
            border-right: 1px solid rgba(0, 0, 0, 0.05);
            padding: 2rem 1rem;
        }

        .menu-item {
            text-decoration: none;
            color: #555;
            display: flex;
            align-items: center;
            padding: 12px 20px;
            margin-bottom: 10px;
            border-radius: 12px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.4);
        }

        .menu-item i { margin-right: 15px; font-size: 1.2rem; }

        .menu-item:hover, .menu-item.active {
            background: white;
            color: #4158D0;
            transform: translateX(10px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* Content Area */
        .content-area { padding: 3rem; }
        
        .page-header {
            background: white;
            border-radius: 20px;
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .customer-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }

        .avatar-circle {
            width: 40px;
            height: 40px;
            background: var(--primary-gradient);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="glass-panel row g-0">
        <div class="col-md-3 col-lg-2 sidebar">
            <div class="text-center mb-5">
                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['a_name']); ?>&background=4158D0&color=fff&rounded=true" width="80">
                <h5 class="mt-3"><?php echo $_SESSION['a_name']; ?></h5>
            </div>

            <div class="nav-menu">
                <a href="index2.php" class="menu-item">
                    <i class="fa-solid fa-house"></i> หน้าหลัก
                </a>
                <a href="products.php" class="menu-item">
                    <i class="fa-solid fa-box"></i> จัดการสินค้า
                </a>
                <a href="order.php" class="menu-item">
                    <i class="fa-solid fa-cart-shopping"></i> จัดการออร์เดอร์
                </a>
                <a href="customer.php" class="menu-item active">
                    <i class="fa-solid fa-users"></i> จัดการลูกค้า
                </a>
                <a href="logout.php" class="menu-item text-danger mt-5">
                    <i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ
                </a>
            </div>
        </div>

        <div class="col-md-9 col-lg-10 content-area">
            <div class="page-header border-0 shadow-sm">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-1">
                            <li class="breadcrumb-item"><a href="index2.php" class="text-decoration-none">Dashboard</a></li>
                            <li class="breadcrumb-item active">Customers</li>
                        </ol>
                    </nav>
                    <h2 class="mb-0 fw-bold"><i class="fa-solid fa-user-group me-2 text-primary"></i> จัดการข้อมูลลูกค้า</h2>
                </div>
                <button class="btn btn-primary rounded-pill px-4 shadow-sm">
                    <i class="fa-solid fa-user-plus me-2"></i> เพิ่มลูกค้าใหม่
                </button>
            </div>

            <div class="customer-card">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>โปรไฟล์</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>อีเมล</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>สถานะ</th>
                                <th class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><div class="avatar-circle">นค</div></td>
                                <td>นิวเคลียร์ รัชชานนท์</td>
                                <td>nuclear@example.com</td>
                                <td>098-XXX-XXXX</td>
                                <td><span class="badge rounded-pill bg-success">ใช้งานปกติ</span></td>
                                <td class="text-center">
                                    <div class="btn-group border rounded-pill overflow-hidden">
                                        <button class="btn btn-sm btn-white border-0"><i class="fa-solid fa-pen-to-square text-primary"></i></button>
                                        <button class="btn btn-sm btn-white border-0"><i class="fa-solid fa-trash text-danger"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>