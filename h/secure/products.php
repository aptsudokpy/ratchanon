<?php
    include_once("check_login.php");
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการสินค้า: รัชชานนท์ พรดีมา (นิวเคลียร์)</title>
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
            color: #333;
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
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }

        .product-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }

        .product-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 8px;
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
                <span class="badge bg-light text-dark">Administrator</span>
            </div>

            <div class="nav-menu">
                <a href="index2.php" class="menu-item">
                    <i class="fa-solid fa-house"></i> หน้าหลัก
                </a>
                <a href="products.php" class="menu-item active">
                    <i class="fa-solid fa-box"></i> จัดการสินค้า
                </a>
                <a href="order.php" class="menu-item">
                    <i class="fa-solid fa-cart-shopping"></i> จัดการออร์เดอร์
                </a>
                <a href="customer.php" class="menu-item">
                    <i class="fa-solid fa-users"></i> จัดการลูกค้า
                </a>
                <a href="logout.php" class="menu-item logout mt-5 text-danger">
                    <i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ
                </a>
            </div>
        </div>

        <div class="col-md-9 col-lg-10 content-area">
            <div class="page-header">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-1">
                            <li class="breadcrumb-item"><a href="index2.php" class="text-decoration-none">Dashboard</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </nav>
                    <h2 class="mb-0 fw-bold"><i class="fa-solid fa-boxes-stacked me-2 text-primary"></i> จัดการรายการสินค้า</h2>
                </div>
                <button class="btn btn-primary rounded-pill px-4 shadow-sm">
                    <i class="fa-solid fa-plus me-2"></i> เพิ่มสินค้าใหม่
                </button>
            </div>

            <div class="product-card">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>รูปภาพ</th>
                                <th>ชื่อสินค้า</th>
                                <th>หมวดหมู่</th>
                                <th>ราคา</th>
                                <th>สต็อก</th>
                                <th class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="https://via.placeholder.com/50" class="product-img" alt="product"></td>
                                <td><strong>สินค้าตัวอย่าง A</strong></td>
                                <td>Gadgets</td>
                                <td>฿2,500</td>
                                <td><span class="badge bg-success-subtle text-success">45 ชิ้น</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1"><i class="fa-solid fa-pen"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
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