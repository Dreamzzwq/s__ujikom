<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['simpan'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$user', '$pass')");
    header("Location: users.php");
}
?>

<h2>Tambah User Baru</h2>
<form method="post">
  Username: <input type="text" name="username" required><br><br>
  Password: <input type="password" name="password" required><br><br>
  <input type="submit" name="simpan" value="Simpan">
</form>
<a href="users.php">Kembali ke Daftar Pengguna</a>