<?php 
if(isset($_POST['email'])){
    //action
    $conn=$con->koneksi();
    $email=$_POST['email'];$psw=md5($_POST['password']);
    $sql = "SELECT* FROM data_login where email ='$email' and psw ='$psw'and active = 'Y'";
    $user = $conn->query($sql);
    if($user->num_rows > 0){
        $sess=$user->fetch_array();
        $_SESSION['login']['email']=$sess['email'];
        $_SESSION['login']['id']=$sess['id'];
        header('Location:'.'http://localhost/sijas/admin/index.php?mod=inti');
    }else{
        $msg="Email dan Password tidak cocok";
        include_once 'views/vlogin.php';
    }
}else{
    include_once 'views/vlogin.php';
}
?>