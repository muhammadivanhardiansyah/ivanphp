<?php
session_start();
require 'db.php';

if (isset($_POST["login"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Debug: Cek data user yang ditemukan
        error_log("User found: " . print_r($row, true));

        // cek password
        if (password_verify($password, $row["password"])) {
            $_SESSION['success_message'] = 'Anda Berhasil Login';
            $_SESSION['user_id'] = $row['id']; // Pastikan Anda menyimpan user_id
            $_SESSION['username'] = $row['username'];

            error_log("Login successful, redirecting to dashboard.");
            header("Location: /Menu-Makan/dashboard.php"); // Gunakan URL absolut
            exit();
        } else {
            $_SESSION['error_message'] = 'Password Salah';
            error_log("Password verification failed.");
        }
    } else {
        $_SESSION['error_message'] = 'Username tidak ditemukan!';
        error_log("Username not found.");
    }

    header("Location: /Menu-Makan/dashboard.php"); // Gunakan URL absolut
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Sertakan SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="../Menu-Makan/styles.css">
    <title>Login</title>
</head>

<body>
    <div class="login">
        <img src="../Menu-Makan/img/login-bg.png" alt="image" class="login__bg">
        <form action="" method="post" class="login__form">
            <h1 class="login__title">Login</h1>
            <div class="login__inputs">
                <div class="login__box">
                    <input type="text" placeholder="Username" name="username" required class="login__input">
                    <i class="ri-mail-fill"></i>
                </div>
                <div class="login__box">
                    <input type="password" placeholder="Password" name="password" required class="login__input">
                    <i class="ri-lock-2-fill"></i>
                </div>
            </div>
            <div class="login__check">
                <div class="login__check-box">
                    <input type="checkbox" class="login__check-input" id="user-check">
                    <label for="user-check" class="login__check-label">Remember me</label>
                </div>
                <a href="#" class="login__forgot">Forgot Password?</a>
            </div>
            <button type="submit" name="login" class="login__button">Login</button>
            <div class="login__register">
                Don't have an account? <a href="register.php">Register</a>
            </div>
        </form>
    </div>

    <?php 
if (isset($_POST['submit'])) {
    session_start();
    include 'db.php';

    // Corrected the usage of mysqli_real_escape_string
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    
    // Corrected the SQL query syntax
    $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$user' AND password = '$pass'");
    
    if (mysqli_num_rows($cek) > 0) {
        $d = mysqli_fetch_object($cek);
        $_SESSION['status_login'] = true;
        $_SESSION['a_global'] = $d;
        $_SESSION['id'] = $d->admin_id;
        echo '<script>window.location="dashboard.php"</script>';
    } else {
        echo '<script>alert("Username atau password anda salah")</script>';
    }
}
?>

</body>

</html>