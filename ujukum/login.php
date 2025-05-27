<?php
session_start();
include "koneksi.php";

$pesan_error = "";
$pesan_sukses = "";

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
 
    $query = "SELECT * FROM users WHERE username = '$user'";
    $result = mysqli_query($conn, $query);
 
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);

        if ($data['password'] === $pass) {
            $_SESSION['username'] = $user;
            $pesan_sukses = "Login berhasil! Mengarahkan ke beranda...";
            echo "<meta http-equiv='refresh' content='2;url=beranda.php'>";
        } else {
            $pesan_error = "password salah!";
        }
    } else {
        $pesan_error = "username tidak ditemukan atau salah";
    }
}
?>

<form method="post">
  <h2>login</h2>

  <?php if ($pesan_error): ?>
    <p style="color:red;"><?php echo $pesan_error; ?></p>
  <?php endif; ?>

  <?php if ($pesan_sukses): ?>
    <p style="color:green;"><?php echo $pesan_sukses; ?></p>
  <?php endif; ?>

  username: <input type="text" name="username" required><br>
  password: <input type="password" name="password" required><br>
  <input type="submit" name="login" value="Login">
</form>

<a href="register.php">Daftar</a></p>