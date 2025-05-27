<?php
session_start();
include "koneksi.php";

if (isset($_POST['register'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$user'");
    if (mysqli_num_rows($check) > 0) {
        echo "Akun sudah terdaftar";
    }else {
        mysqli_query($conn, "INSERT INTO users (username, password) VALUE ('$user', '$pass')");
        echo "REgistrasi Berhasil <a href='login.php'>Login di sini</a>";
    }
}
?>

<form method="post">
    <h2>REGISTER</h2>
    Username <input type="text" name="username"><br>
    Password <input type="passoword" name="password"><br>
    <input type="submit" name="register" value="Register">
</form>

<p>Sudah punya akun?? <a href="login.php">Login di sini</a></p>