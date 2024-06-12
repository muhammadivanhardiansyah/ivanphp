<?php
include 'db.php';

// Initialize variables
$title = "";
$description = "";
$filepath = "";
$id = 0;
$update = false;

// Handle form submission for creating and updating records
if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $filepath = 'uploads/' . basename($_FILES['file']['name']);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $filepath)) {
        $conn->query("INSERT INTO fotos (title, description, filepath) VALUES ('$title', '$description', '$filepath')");
        header('location: datafoto.php');
    }
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $conn->query("SELECT * FROM fotos WHERE id=$id");

    if ($result->num_rows) {
        $row = $result->fetch_array();
        $title = $row['title'];
        $description = $row['description'];
        $filepath = $row['filepath'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $filepath = 'uploads/' . basename($_FILES['file']['name']);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $filepath)) {
        $conn->query("UPDATE fotos SET title='$title', description='$description', filepath='$filepath' WHERE id=$id");
        header('location: datafoto.php');
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM fotos WHERE id=$id");
    header('location: datafoto.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Foto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            text-align: left;
        }
        tr {
            border-bottom: 1px solid #cbcbcb;
        }
        th, td {
            border: none;
            height: 30px;
            padding: 2px;
        }
        tr:hover {
            background: #f5f5f5;
        }
        form {
            width: 45%;
            margin: 50px auto;
            text-align: left;
            padding: 20px;
            border: 1px solid #bbbbbb;
            border-radius: 5px;
        }
        .input-group {
            margin: 10px 0;
            padding: 10px 0;
        }
        .input-group label {
            display: block;
            text-align: left;
            margin: 3px;
        }
        .input-group input, .input-group textarea {
            height: 30px;
            width: 93%;
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid gray;
        }
        .btn {
            padding: 10px;
            font-size: 15px;
            color: white;
            background: #5F9EA0;
            border: none;
            border-radius: 5px;
        }
        .edit_btn {
            text-decoration: none;
            padding: 2px 5px;
            background: #2E8B57;
            color: white;
            border-radius: 3px;
        }
        .del_btn {
            text-decoration: none;
            padding: 2px 5px;
            background: #800000;
            color: white;
            border-radius: 3px;
        }
    </style>
</head>
<body>

<?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>

<form method="post" action="datafoto.php" enctype="multipart/form-data">
    <div class="input-group">
        <label>Title</label>
        <input type="text" name="title" value="<?php echo $title; ?>">
    </div>
    <div class="input-group">
        <label>Description</label>
        <textarea name="description"><?php echo $description; ?></textarea>
    </div>
    <div class="input-group">
        <label>File</label>
        <input type="file" name="file">
    </div>
    <div class="input-group">
        <?php if ($update): ?>
            <button class="btn" type="submit" name="update">Update</button>
        <?php else: ?>
            <button class="btn" type="submit" name="save">Save</button>
        <?php endif ?>
    </div>
    <?php if ($update): ?>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
    <?php endif ?>
</form>

<?php $results = $conn->query("SELECT * FROM fotos"); ?>

<table>
    <thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>File</th>
        <th>Actions</th>
    </tr>
    </thead>

    <?php while ($row = $results->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><img src="<?php echo $row['filepath']; ?>" width="100px"></td>
            <td>
                <a href="datafoto.php?edit=<?php echo $row['id']; ?>" class="edit_btn">Edit</a>
                <a href="datafoto.php?delete=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
