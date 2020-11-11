<?php
class Config{
    function koneksi(){
        $conn=new mysqli('localhost','root','','db_jas');
        if($conn->connect_error){
            $conn = die("Koneksi Gagal : ". $conn->connect_error);
        }
        return $conn;
    }
    function auth(){
        if(isset($_SESSION['login']['email'])){
            return true;
        }else{
            return false;
        }
    }
    function site_url(){
        return "http://localhost/sijas/";
    }
}
?>