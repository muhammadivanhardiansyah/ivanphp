<?php
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        header {
            background: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        header h1 a {
            color: #fff;
            text-decoration: none;
        }
        header ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        header ul li {
            display: inline;
            margin: 0 10px;
        }
        header ul li a {
            color: #fff;
            text-decoration: none;
        }
        header ul li a:hover {
            text-decoration: underline;
        }
        .content {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <header>
        <h1><a href="dashboard.php">MyCOOKS</a></h1>
        <ul>
            <li><a href="profil.php">Profil Akun</a></li>
            <li><a href="datafoto.php">Data Foto</a></li>
            <li><a href="keluar.php">Logout</a></li>
        </ul>
    </header>    
    <div class="content">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['a_global']->username); ?>!</h1>
        <p>You are now on the dashboard.</p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
