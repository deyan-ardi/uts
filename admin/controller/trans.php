<?php
$con->auth();
$conn=$con->koneksi();
switch(@$_GET['page']){
    case 'delete';
        $trans ="DELETE FROM transaksi where md5(id_transaksi)='$_GET[id]'";
        $trans=$conn->query($trans);
        header('location: '.$con->site_url().'/admin/index.php?mod=trans');
    break;
    default:
        $sql="SELECT* FROM transaksi INNER JOIN member ON transaksi.`id_member`=member.`id_member`
        INNER JOIN barang ON transaksi.`id_barang`=barang.`id_barang`;";
        $trans=$conn->query($sql);
        $conn->close();
        $content="views/transaksi/tampil.php";
        include_once 'views/template.php';
}
?>