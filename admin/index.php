<?php
include_once '../config/Config.php';
$con = new Config();
if ($con->auth()) {
    //panggil fungsi
    switch (@$_GET['id']) {
        case 'pegawai':
            include_once 'controller/pegawai.php';
            break;
        case 'gaji':
            include_once 'controller/gaji.php';
            break;
        case 'password':
            include_once 'controller/password.php';
            break;
        case 'detail_gaji':
            include_once 'controller/detail_gaji.php';
            break;
        default:
            include_once 'controller/beranda.php';
    }
} else {
    include_once 'controller/login.php';
}