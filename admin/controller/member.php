<?php
$con->auth();
$conn=$con->koneksi();
switch(@$_GET['page']){
    case 'add';
        $sql="SELECT* FROM member";
        $pemasok=$conn->query($sql);
        $content="views/member/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save';
        if($_SERVER['REQUEST_METHOD']=="POST"){
            //validasi
            if(empty($_POST['nama_member'])){
                $err['nama_member']="Wajib ISI Nama Penyedia";
            }
            if(empty($_POST['alamat'])){
                $err['alamat']="Wajib ISI Alamat";
            }
            if(!is_numeric($_POST['no_hp'])){
                $err['no_hp']="No HP Wajib Angka";
            }
            //validasi file input
            if(!empty($_FILES['fileToUpload']['name'])){
                $target_dir = "../media/member/";
                $photo = basename($_FILES["fileToUpload"]["name"]);
                $target_file = $target_dir . $photo;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    $err['fileToUpload']="File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    $err['fileToUpload']= "File is not an image.";
                    $uploadOk = 0;
                }
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                    $err['fileToUpload']= "Sorry, file already exists.";
                $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 2048576) {
                    $err['fileToUpload']= "Sorry, your file is too large.";
                $uploadOk = 0;
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    $err['fileToUpload']= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 1) {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        //$err['fileToUpload']= "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                        $_POST['photo']=$photo;
                        if(isset($_POST['photo_old']) && $_POST['photo_old']!=''){
                            unlink($target_dir.$_POST['photo_old']);
                        }
                    } else {
                        $err['fileToUpload']= "Sorry, there was an error uploading your file.";
                    }
                }
            }
            if(!isset($err)){
                $id_admin=$_SESSION['login']['id'];
                if(!empty($_POST['id_member'])){
                //update
                if(isset($_POST['photo'])){
                    $sql="UPDATE member set nama_member='$_POST[nama_member]', alamat='$_POST[alamat]', no_hp='$_POST[no_hp]', 
                    id_admin=$id_admin, photo='$_POST[photo]' where md5(id_member)='$_POST[id_member]'";
                }else{
                $sql="UPDATE member set nama_member='$_POST[nama_member]',alamat='$_POST[alamat]',no_hp='$_POST[no_hp]', 
                id_admin=$id_admin where md5(id_member)='$_POST[id_member]'";
                }    
                }else{
                //input
                if(isset($_POST['photo'])){
                    $sql = "INSERT INTO member (nama_member, alamat, no_hp,  id_admin, photo)
                VALUES ('$_POST[nama_member]','$_POST[alamat]', '$_POST[no_hp]',
                $id_admin, '$_POST[photo]')";
                }else{
                $sql = "INSERT INTO member (nama_member, alamat, no_hp,  id_admin)
                VALUES ('$_POST[nama_member]','$_POST[alamat]','$_POST[no_hp]',
                $id_admin)";
                }
            }
                    if ($conn->query($sql) === TRUE) {
                    header('location: '.$con->site_url().'/admin/index.php?mod=member');
                    } else {
                        $err['msg']="Error: " . $sql . "<br>" . $conn->error;
                    }
            }
        }else{
            $err['msg']="tidak diijinkan";
        }
        if(isset($err)){
            $sql="SELECT* FROM pemasok";
            $pemasok=$conn->query($sql);
            $content="views/member/tambah.php";
            include_once 'views/template.php';
        }
    break;
    case 'edit';
        $user ="SELECT* FROM member where md5(id_member)='$_GET[id]'";
        $user=$conn->query($user);
        $_POST=$user->fetch_assoc();
        $_POST['nama_member']=$_POST['nama_member'];
        $_POST['id_member']=md5($_POST['id_member']);
        //var_dump($penyedia);
        $sql="SELECT* FROM member";
        $pemasok=$conn->query($sql);
        $content="views/member/tambah.php";
        include_once 'views/template.php';
    break;
    case 'delete';
        $user ="DELETE FROM member where md5(id_member)='$_GET[id]'";
        $user=$conn->query($user);
        header('location: '.$con->site_url().'/admin/index.php?mod=member');
    break;
    default:
        $sql="SELECT* FROM member";
        $user=$conn->query($sql);
        $conn->close();
        $content="views/member/tampil.php";
        include_once 'views/template.php';
}
?>