<?php
$con->auth();
$conn = $con->koneksi();
if (isset($_SESSION['login']['status'])) {
    $id = $_SESSION['login']['id'];
    $sql = "SELECT* FROM user where id ='$id' and active = '1'";
    $users = $conn->query($sql)->fetch_array();
    $conn->close();
    $title = "Dashboard";
    $content = "views/beranda/beranda.php";
    include_once 'views/template.php';
} else {
    header('location: http://localhost/uts/admin/');
}