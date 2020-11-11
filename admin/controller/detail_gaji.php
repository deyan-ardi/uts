<?php
$con->auth();
$conn = $con->koneksi();
if (isset($_SESSION['login']['status']) && $_SESSION['login']['aktif'] == '1') {
    $id = $_SESSION['login']['id'];
    $sql = "SELECT* FROM user where id ='$id' and active = '1'";
    $users = $conn->query($sql)->fetch_array();
    $sql_gaji = "SELECT gaji_user.*, user.nama_user FROM user INNER JOIN gaji_user ON user.id=gaji_user.id_user WHERE user.id='$id'";
    $user_gaji = $conn->query($sql_gaji);
    $conn->close();
    $title = "Ubah Password";
    $content = "views/detail_gaji/beranda.php";
    include_once 'views/template.php';
} else {
    header('location: http://localhost/uts/admin/');
}