<?php 
include_once '../config/Config.php';
$con = new Config();
if($con->auth()){
    //panggil fungsi
    switch (@$_GET['mod']){
        case 'inti':
            include_once 'controller/inti.php';
            break;
        case 'user':
            include_once 'controller/user.php';
            break;
        case 'member':
            include_once 'controller/member.php';
            break;
        case 'trans':
            include_once 'controller/trans.php';
            break;
        default:
        include_once 'controller/beranda.php';
    }
}else{
    //panggil cont login
    include_once 'controller/login.php';
}
?>