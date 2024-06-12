<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['admin_name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['admin_telp']) && isset($_POST['admin_email']) && isset($_POST['admin_address'])) {
        $admin_name = $_POST['admin_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $admin_telp = $_POST['admin_telp'];
        $admin_email = $_POST['admin_email'];
        $admin_address = $_POST['admin_address'];

        // Menggunakan prepared statement untuk menghindari SQL Injection
        $stmt = $conn->prepare("INSERT INTO tb_admin (admin_name, username, password, admin_telp, admin_email, admin_address) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $admin_name, $username, $password, $admin_telp, $admin_email, $admin_address);

        if ($stmt->execute()) {
            // Redirect ke halaman login setelah berhasil registrasi
            header("Location: login.php");
            exit(); // Pastikan script berhenti setelah redirect
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "All fields are required.";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Menu-Makan/styles.css" />
    <title>Register</title>
</head>

<body>

    <body>
        <div class="login">
            <img src="../Menu-Makan/img/login-bg.png" alt="image" class="login__bg">
            <form action="" method="post" class="login__form">
                <h1 class="login__title">Register</h1>
                <div class="login__inputs">
                    <div class="login__box">
                        <input type="text" placeholder="Admin Name" name="admin_name" required class="login__input">
                        <i class="ri-mail-fill"></i>
                    </div>
                    <div class="login__box">
                        <input type="text" placeholder="Username" name="username" required class="login__input">
                        <i class="ri-mail-fill"></i>
                    </div>
                    <div class="login__box">
                        <input type="password" placeholder="Password" name="password" required class="login__input">
                        <i class="ri-lock-2-fill"></i>
                    </div>
                    <div class="login__box">
                        <input type="tel" placeholder="Admin Telpon" name="admin_telp" required class="login__input">
                        <i class="ri-mail-fill"></i>
                    </div>
                    <div class="login__box">
                        <input type="email" placeholder="Admin Email" name="admin_email" required class="login__input">
                        <i class="ri-mail-fill"></i>
                    </div>
                    <div class="login__box">
                        <input type="text" placeholder="Admin address" name="admin_address" required class="login__input">
                        <i class="ri-mail-fill"></i>
                    </div>

                </div>
                <div class="login__check">
                    <div class="login__check-box">
                    </div>

                </div>
                <button type="submit" name="login" class="login__button">Register</button>
                <div class="login__register">
                    have an account? <a href="login.php">Login</a>
                </div>
        </div>
        </form>
        </div>


        <script>
            function togglePassword() {
                const passwordInput = document.getElementById('passwordInput');
                passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
                const eyeIcon = document.querySelector('.eye-icon');
                eyeIcon.classList.toggle('hide-password');
            }
        </script>
    </body>

</html>