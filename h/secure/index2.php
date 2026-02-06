<?php
    include_once("check_login.php");
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก: รัชชานนท์ พรดีมา (นิวเคลียร์)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
            --glass-bg: rgba(255, 255, 255, 0.8);
        }

        body {
            font-family: 'Kanit', sans-serif;
            background: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
            background-attachment: fixed;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .glass-panel {
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 30px;
            margin: auto;
            width: 95%;
            max-width: 1200px;
            min-height: 85vh;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            display: flex;
            overflow: hidden;
        }

        /* Sidebar สไตล์กระจก */
        .sidebar {
            background: rgba(255, 255, 255, 0.3);
            border-right: 1px solid rgba(255, 255, 255, 0.2);
            padding: 2.5rem 1.5rem;
            width: 260px;
        }

        .menu-item {
            text-decoration: none;
            color: #444;
            display: flex;
            align-items: center;
            padding: 14px 18px;
            margin-bottom: 12px;
            border-radius: 15px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(255, 255, 255, 0.2);
        }

        .menu-item i { margin-right: 12px; font-size: 1.1rem; }

        .menu-item:hover, .menu-item.active {
            background: white;
            color: #4158D0;
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }

        /* Main Content */
        .content-area {
            flex: 1;
            padding: 3rem;
            overflow-y: auto;
        }

        .welcome-hero {
            background: white;
            border-radius: 25px;
            padding: 2.5rem;
            margin-bottom: 2.5rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        }

        .welcome-hero::before {
            content: "";
            position: absolute;
            top: -50%; right: -10%;
            width: 300px; height: 300px;
            background: var(--primary-gradient);
            border-radius: 50%;
            opacity: 0.1;
        }

        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            border: none;
            transition: all 0.3s ease;
            text-align: center;
        }

        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .stat-icon {
            width: 60px; height: 60px;
            background: #f0f2ff;
            color: #4158D0;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 1.5rem;
        }

        .logout-btn {
            background: rgba(255, 77, 77, 0.1);
            color: #ff4d4d;
            border: 1px solid rgba(255, 77, 77, 0.2);
        }

        .logout-btn:hover {
            background: #ff4d4d;
            color: white;
        }
    </style>
</head>
<body>

<div class="glass-panel">
    <aside class="sidebar d-none d-md-block">
        <div class="text-center mb-5">
            <div class="position-relative d-inline-block">
                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['a_name']); ?>&background=4158D0&color=fff&size=80" class="rounded-circle shadow">
                <span class="position-absolute bottom-0 end-0 bg-success border border-white border-2 rounded-circle p-2"></span>
            </div>
            <h5 class="mt-3 fw-bold mb-0"><?php echo $_SESSION['a_name']; ?></h5>
            <small class="text-muted">Administrator</small>
        </div>

        <nav class="nav-menu">
            <a href="index2.php" class="menu-item active">
                <i class="fa-solid fa-house-chimney"></i> หน้าหลัก
            </a>
            <a href="products.php" class="menu-item">
                <i class="fa-solid fa-box-open"></i> จัดการสินค้า
            </a>
            <a href="order.php" class="menu-item">
                <i class="fa-solid fa-cart-flatbed-suitcases"></i> จัดการออร์เดอร์
            </a>
            <a href="customer.php" class="menu-item">
                <i class="fa-solid fa-user-gear"></i> จัดการลูกค้า
            </a>
            <div class="mt-5">
                <a href="logout.php" class="menu-item logout-btn">
                    <i class="fa-solid fa-power-off"></i> ออกจากระบบ
                </a>
            </div>
        </nav>
    </aside>

    <main class="content-area">
        <div class="welcome-hero">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="fw-bold mb-2">ยินดีต้อนรับกลับมา!</h1>
                    <p class="text-muted mb-0">ระบบจัดการหลังบ้าน | พัฒนาโดย รัชชานนท์ พรดีมา (นิวเคลียร์)</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <span class="badge bg-primary px-3 py-2 rounded-pill">Status: Online</span>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                    <h6 class="text-muted">สินค้าในคลัง</h6>
                    <h2 class="fw-bold">1,240</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fa-solid fa-truck-fast"></i></div>
                    <h6 class="text-muted">ออร์เดอร์วันนี้</h6>
                    <h2 class="fw-bold">42</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fa-solid fa-users-viewfinder"></i></div>
                    <h6 class="text-muted">ลูกค้าทั้งหมด</h6>
                    <h2 class="fw-bold">856</h2>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>