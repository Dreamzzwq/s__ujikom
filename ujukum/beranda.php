<?php
session_start();
if (!isset($_SESSION['username'])) {
    header ("Location: login.php");
    exit;
}
?>

<h2>Selamat Datang, <?php echo $_SESSION['username']; ?></h2>
<p>ketuk logout untuk keluar</p>
<a href="logout.php">Logout</a>
<p>ketuk edit untuk mengedit username dan password</p>
<a href="users.php">edit</a>