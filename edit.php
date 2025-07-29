<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $conn->query("UPDATE users SET name='$name', email='$email' WHERE id=$id");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit User</title></head>
<body>
    <h2>Edit User</h2>
    <form method="post">
        Name: <input type="text" name="name" value="<?= $row['name']; ?>" required><br><br>
        Email: <input type="email" name="email" value="<?= $row['email']; ?>" required><br><br>
        <button type="submit">Update</button>
    </form>
    <br><a href="index.php">Back</a>
</body>
</html>
