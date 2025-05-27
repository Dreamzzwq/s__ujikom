<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id=$id"));

if (isset($_POST['update'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    mysqli_query($conn, "UPDATE users SET username='$user', password='$pass' WHERE id=$id");
    header("Location: users.php");
}
?>

<h2>Edit User</h2>
<form method="post">
  Username: <input type="text" name="username" value="<?= $data['username'] ?>" required><br><br>
  Password: <input type="text" name="password" value="<?= $data['password'] ?>" required><br><br>
  <input type="submit" name="update" value="Update">
</form>
<a href="users.php">Kembali ke Daftar Pengguna</a>