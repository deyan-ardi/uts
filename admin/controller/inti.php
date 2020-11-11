<?php
$con->auth();
$conn=$con->koneksi();
switch(@$_GET['page']){
    case 'add';
        $sql="SELECT* FROM jenis_barang";
        $barang=$conn->query($sql);
        $sql="SELECT* FROM pemasok";
        $pemasok=$conn->query($sql);
        $content="views/inti/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save';
        if($_SERVER['REQUEST_METHOD']=="POST"){
            //validasi
            if(empty($_POST['nama_barang'])){
                $err['nama_barang']="Wajib ISI Nama Barang";
            }
            if(!is_numeric($_POST['harga'])){
                $err['harga']="Harga Wajib Angka";
            }
            if(!is_numeric($_POST['id_jenis'])){
                $err['id_jenis']="Wajib Pilih JENIS BARANG";
            }
            if(!is_numeric($_POST['id_pemasok'])){
                $err['id_pemasok']="Wajib PILIH PEMASOK";
            }
            //validasi file input
            if(!empty($_FILES['fileToUpload']['name'])){
                $target_dir = "../media/barang/";
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
                if(!empty($_POST['id_barang'])){
                //update
                if(isset($_POST['photo'])){
                    $sql="UPDATE barang set nama_barang='$_POST[nama_barang]',harga='$_POST[harga]', id_jenis='$_POST[id_jenis]',
                    id_pemasok='$_POST[id_pemasok]',id_admin=$id_admin, photo='$_POST[photo]' where md5(id_barang)='$_POST[id_barang]'";
                }else{
                $sql="UPDATE barang set nama_barang='$_POST[nama_barang]',harga='$_POST[harga]', id_jenis='$_POST[id_jenis]',
                id_pemasok='$_POST[id_pemasok]',id_admin=$id_admin where md5(id_barang)='$_POST[id_barang]'";
                }    
                }else{
                //input
                if(isset($_POST['photo'])){
                    $sql = "INSERT INTO barang (nama_barang, harga, id_jenis, id_pemasok, id_admin, photo)
                VALUES ('$_POST[nama_barang]', '$_POST[harga]','$_POST[id_jenis]','$_POST[id_pemasok]',
                $id_admin, '$_POST[photo]')";
                }else{
                $sql = "INSERT INTO barang (nama_barang, harga, id_jenis, id_pemasok, id_admin)
                VALUES ('$_POST[nama_barang]', '$_POST[harga]','$_POST[id_jenis]','$_POST[id_pemasok]',
                $id_admin)";
                }
            }
                    if ($conn->query($sql) === TRUE) {
                    header('location: '.$con->site_url().'/admin/index.php?mod=inti');
                    } else {
                        $err['msg']="Error: " . $sql . "<br>" . $conn->error;
                    }
            }
        }else{
            $err['msg']="tidak diijinkan";
        }
        if(isset($err)){
            $sql="SELECT* FROM `barang` INNER JOIN jenis_barang ON barang.`id_jenis`=jenis_barang.`id_jenis`
            INNER JOIN pemasok ON barang.`id_pemasok`=pemasok.`id_pemasok`;";
            $barang=$conn->query($sql);
            $content="views/inti/tambah.php";
            include_once 'views/template.php';
        }
    break;
    case 'edit';
        $penyedia ="SELECT* FROM barang where md5(id_barang)='$_GET[id]'";
        $penyedia=$conn->query($penyedia);
        $_POST=$penyedia->fetch_assoc();
        $_POST['nama_barang']=$_POST['nama_barang'];
        $_POST['id_barang']=md5($_POST['id_barang']);
        //var_dump($penyedia);
        $sql="SELECT* FROM jenis_barang";
        $barang=$conn->query($sql);
        $sql="SELECT* FROM pemasok";
        $pemasok=$conn->query($sql);
        $content="views/inti/tambah.php";
        include_once 'views/template.php';
    break;
    case 'delete';
        $penyedia ="DELETE FROM barang where md5(id_barang)='$_GET[id]'";
        $penyedia=$conn->query($penyedia);
        header('location: '.$con->site_url().'/admin/index.php?mod=inti');
    break;
    default:
        $sql="SELECT* FROM `barang` INNER JOIN jenis_barang ON barang.`id_jenis`=jenis_barang.`id_jenis`
        INNER JOIN pemasok ON barang.`id_pemasok`=pemasok.`id_pemasok`;";
        $penyedia=$conn->query($sql);
        $conn->close();
        $content="views/inti/tampil.php";
        include_once 'views/template.php';
}
?>