<?php
session_start();
include 'db.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['status_login'])) {
    header('Location: login.php');
    exit();
}

// Ambil data admin dari sesi
$admin_id = $_SESSION['id'];
$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '$admin_id'");
$admin = mysqli_fetch_assoc($query);

// Proses update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_name = $_POST['admin_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $admin_telp = $_POST['admin_telp'];
    $admin_email = $_POST['admin_email'];
    $admin_address = $_POST['admin_address'];

    $stmt = $conn->prepare("UPDATE tb_admin SET admin_name=?, username=?, password=?, admin_telp=?, admin_email=?, admin_address=? WHERE admin_id=?");
    $stmt->bind_param("ssssssi", $admin_name, $username, $password, $admin_telp, $admin_email, $admin_address, $admin_id);

    if ($stmt->execute()) {
        $_SESSION['a_global']->admin_name = $admin_name;
        $_SESSION['a_global']->username = $username;
        $_SESSION['a_global']->admin_telp = $admin_telp;
        $_SESSION['a_global']->admin_email = $admin_email;
        $_SESSION['a_global']->admin_address = $admin_address;

        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Akun</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-6/assets/css/login-6.css">
</head>

<body>
    <section class="bg-primary p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5">
                                        <h3>Profil Akun</h3>
                                    </div>
                                </div>
                            </div>
                            <form method="post" action="">
                                <div class="row gy-3 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="admin_name" value="<?php echo $admin['admin_name']; ?>" placeholder="Admin Name" required>
                                            <label for="admin_name" class="form-label">Admin Name</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="username" value="<?php echo $admin['username']; ?>" placeholder="Username" required>
                                            <label for="username" class="form-label">Username</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" name="password" value="<?php echo $admin['password']; ?>" placeholder="Password" required>
                                            <label for="password" class="form-label">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="tel" class="form-control" name="admin_telp" value="<?php echo $admin['admin_telp']; ?>" placeholder="Admin Telpon" required>
                                            <label for="admin_telp" class="form-label">Admin Telpon</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" name="admin_email" value="<?php echo $admin['admin_email']; ?>" placeholder="Admin Email" required>
                                            <label for="admin_email" class="form-label">Admin Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="admin_address" value="<?php echo $admin['admin_address']; ?>" placeholder="Admin Address" required>
                                            <label for="admin_address" class="form-label">Admin Address</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn bsb-btn-2xl btn-primary" type="submit">Update Profile</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 mb-4 border-secondary-subtle">
                                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                                        <a href="dashboard.php" class="link-secondary text-decoration-none">Back to Dashboard</a>
                                    </div>
                                </div>
                            </div>