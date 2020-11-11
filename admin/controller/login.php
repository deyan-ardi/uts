<?php
if (isset($_POST['email'])) {
    //action
    $conn = $con->koneksi();
    $email = $_POST['email'];
    $pswd = $_POST['passwd'];
    $sql = "SELECT* FROM user where email ='$email' and active = '1'";
    $user = $conn->query($sql);
    if ($user->num_rows > 0) {
        $users = $user->fetch_array();
        if (password_verify($pswd, $users['password'])) {
            $_SESSION['login']['status'] = true;
            $_SESSION['login']['email'] = $users['email'];
            $_SESSION['login']['id'] = $users['id'];
            $_SESSION['login']['aktif'] = $users['active'];
            $_SESSION['login']['jabatan'] = $users['jabatan'];
            header('location: http://localhost/uts/admin/index.php');
            exit;
        } else {
            $msg = "Password Salah";
            include_once 'views/vlogin.php';
        }
    } else {
        $msg = "Email Tidak Ditemukan";
        include_once 'views/vlogin.php';
    }
} else {
    include_once 'views/vlogin.php';
}