<?php
$con->auth();
$conn = $con->koneksi();
switch (@$_GET['page']) {
    case 'proses_ubah';
        $id = $_SESSION['login']['id'];
        $sql = "SELECT* FROM user where id ='$id' and active = '1'";
        $users_online = $conn->query($sql)->fetch_array();
        if (isset($_SESSION['login']['status']) && $_SESSION['login']['aktif'] == '1') {
            if (isset($_POST['submit'])) {
                if ($_POST['passwd'] != $_POST['konf-passwd']) {
                    echo "Password Tidak Sesuai";
                } else {
                    if (password_verify($_POST['old-passwd'], $users_online['password'])) {
                        $new_pass = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
                        $sql_pass = "UPDATE user SET password='$new_pass' WHERE id='$id'";
                        $users = $conn->query($sql);
                        if ($users == true) {
                            header('Location:' . $con->site_url() . 'admin/index.php?');
                            exit;
                        } else {
                            echo "Gagal, password tidak sama dengan password yang terdaftar sebelumnya";
                        }
                    } else {
                        echo "Password tidak sesuai";
                    }
                }
            }
        } else {
            header('location: http://localhost/uts/admin/');
        }
        break;
    default:
        if (isset($_SESSION['login']['status']) && $_SESSION['login']['aktif'] == '1') {
            $id = $_SESSION['login']['id'];
            $sql = "SELECT* FROM user where id ='$id' and active = '1'";
            $users = $conn->query($sql)->fetch_array();
            $conn->close();
            $title = "Ubah Password";
            $content = "views/password/beranda.php";
            include_once 'views/template.php';
        } else {
            header('location: http://localhost/uts/admin/');
        }
}