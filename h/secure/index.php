<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login: รัชชานนท์ พรดีมา (นิวเคลียร์)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #4158D0;
            --secondary-color: #C850C0;
        }

        body {
            font-family: 'Kanit', sans-serif;
            background: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            transition: transform 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
        }

        .login-card h1 {
            font-weight: 500;
            color: #333;
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #ddd;
            background: #fdfdfd;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(65, 88, 208, 0.2);
            border-color: var(--primary-color);
        }

        /* ปุ่มสไตล์ Uiverse */
        .btn-login {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border: none;
            color: white;
            padding: 12px;
            border-radius: 10px;
            font-weight: 500;
            width: 100%;
            margin-top: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
        }

        .btn-login:hover {
            filter: brightness(1.1);
            box-shadow: 0 8px 15px rgba(200, 80, 192, 0.4);
            color: white;
        }

        .brand-text {
            font-size: 0.8rem;
            color: #777;
            text-align: center;
            margin-top: 1.5rem;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="login-card">
        <h1>เข้าสู่ระบบ <br> <small class="text-muted" style="font-size: 0.9rem;">Backend System</small></h1>
        
        <form method="post" action="">
            <div class="mb-3">
                <label class="form-label">ชื่อผู้ใช้งาน</label>
                <input type="text" name="auser" class="form-control" placeholder="Username" autofocus required>
            </div>
            
            <div class="mb-4">
                <label class="form-label">รหัสผ่าน</label>
                <input type="password" name="apwd" class="form-control" placeholder="Password" required>
            </div>
            
            <button type="submit" name="submit" class="btn btn-login">เข้าสู่ระบบ</button>
        </form>

        <div class="brand-text">
            พัฒนาโดย รัชชานนท์ (นิวเคลียร์)
        </div>
    </div>
</div>

<?php
    if (isset($_POST['submit'])) {
        include_once("connectDB.php");

        $user = $_POST['auser'];
        $pwd  = $_POST['apwd'];

        $stmt = mysqli_prepare($conn, "SELECT a_id, a_name, a_password FROM admin WHERE a_username = ? LIMIT 1");
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $data = mysqli_fetch_array($result);

        if ($data && password_verify($pwd, $data['a_password'])) {
            $_SESSION['a_id'] = $data['a_id'];
            $_SESSION['a_name'] = $data['a_name'];

            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>"; // แถม SweetAlert2 เพื่อความสวยงาม
            echo "<script>
                setTimeout(function() {
                    window.location='index2.php';
                }, 1000);
            </script>";
            
        } else {
            echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');</script>";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
?>

</body>
</html>