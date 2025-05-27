<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

 
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM users WHERE id=$id");
    header("Location: users.php");
}
?>

<h2>Daftar Pengguna</h2>
<a href="add_user.php">Tambah User Baru</a> | 
<a href="beranda.php">Kembali ke Beranda</a><br><br>

<table border ="1" cellpadding="10">
<tr>
  <th>id</th>
  <th>username</th>
  <th>pasword</th>
  <th>di sini</th>
</tr>

<?php
$data = mysqli_query($conn, "SELECT * FROM users");
while ($d = mysqli_fetch_assoc($data)) {
    echo "<tr>
            <td>{$d['id']}</td>
            <td>{$d['username']}</td>
            <td>{$d['password']}</td>
            <td>
                <a href='edit_user.php?id={$d['id']}'>Edit</a> | 
                <a href='users.php?delete={$d['id']}' onclick='return confirm(\"Yakin ingin hapus?\")'>Hapus</a>
            </td>
          </tr>";
}
?>
</table>