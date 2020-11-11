<?php
$con->auth();
$conn = $con->koneksi();
switch (@$_GET['page']) {
    case 'tambah';
        if (isset($_SESSION['login']['status']) && $_SESSION['login']['aktif'] == '1' && $_SESSION['login']['jabatan'] == '1') {
            $id = $_SESSION['login']['id'];
            $sql = "SELECT* FROM user where id ='$id' and active = '1'";
            $users = $conn->query($sql)->fetch_array();
            $sql_peg = "SELECT * FROM user WHERE jabatan != 1";
            $pegawai = $conn->query($sql_peg);
            $conn->close();
            $title = "Tambah Gaji";
            $content = "views/gaji/tambah.php";
            include_once 'views/template.php';
        } else {
            header('location: http://localhost/uts/admin/');
        }
        break;
    case 'proses_tambah';
        if (isset($_SESSION['login']['status']) && $_SESSION['login']['aktif'] == '1' && $_SESSION['login']['jabatan'] == '1') {
            $id = $_SESSION['login']['id'];
            $sql = "SELECT* FROM user where id ='$id' and active = '1'";
            $users = $conn->query($sql)->fetch_array();
            $sql_peg = "SELECT * FROM user WHERE jabatan != 1";
            $pegawai = $conn->query($sql_peg);
            $title = "Tambah Gaji";
            $bulan = date('F Y');
            $in_karyawan = $_POST['pegawai'];
            $sql_bul = "SELECT * FROM `gaji_user` WHERE id_user='$in_karyawan' AND nama_bulan='$bulan'";
            $user = $conn->query($sql_bul);
            if ($user->num_rows > 0) {
                echo "Gajih bulan ini sudah dibayar";
            } else {
                $besar_gaji = 50000;
                $total_gaji = $_POST['hadir'] * $besar_gaji;
                $create_by = $users['nama_user'];

                $in_hadir = $_POST['hadir'];
                $in_ijin = $_POST['ijin'];
                $in_date = date('Y-m-d H:i:s');
                $sql_inp =
                    "INSERT INTO gaji_user (`id_user`,`nama_bulan`,`jumlah_hadir`,`jumlah_ijin`,`besar_gaji`,`total_gaji`,`status`,`create_at`,`create_by`) VALUES ('$in_karyawan','$bulan','$in_hadir','$in_ijin','$besar_gaji','$total_gaji','0','$in_date','$create_by')";
                if ($conn->query($sql_inp) == true) {
                    header('location: http://localhost/uts/admin/index.php?id=gaji');
                } else {
                    echo "Terdapat error";
                }
                $conn->close();
            }
        } else {
            header('location: http://localhost/uts/admin/');
        }
        break;
    case 'ubah';
        if (isset($_SESSION['login']['status']) && $_SESSION['login']['aktif'] == '1' && $_SESSION['login']['jabatan'] == '1') {
            $id = $_SESSION['login']['id'];
            $sql = "SELECT* FROM user where id ='$id' and active = '1'";
            $users = $conn->query($sql)->fetch_array();
            $sql_user_where = "SELECT gaji_user.*, user.nama_user FROM gaji_user INNER JOIN user ON user.id=gaji_user.id_user WHERE gaji_user.id='$_GET[user]'";
            $user_where = $conn->query($sql_user_where)->fetch_array();;
            $conn->close();
            $title = "Tambah Gaji";
            $content = "views/gaji/ubah.php";
            include_once 'views/template.php';
        } else {
            header('location: http://localhost/uts/admin/');
        }
        break;
    case 'proses_ubah';
        if (isset($_SESSION['login']['status']) && $_SESSION['login']['aktif'] == '1' && $_SESSION['login']['jabatan'] == '1') {
            $id = $_SESSION['login']['id'];
            $sql = "SELECT* FROM user where id ='$id' and active = '1'";
            $users = $conn->query($sql)->fetch_array();
            $title = "Ubah Gaji";
            $besar_gaji = 50000;
            $total_gaji = $_POST['hadir'] * $besar_gaji;
            $in_hadir = $_POST['hadir'];
            $in_ijin = $_POST['ijin'];
            $sql_inp =
                "UPDATE gaji_user SET jumlah_hadir = '$in_hadir',jumlah_ijin = '$in_ijin',besar_gaji = '$besar_gaji',total_gaji = '$total_gaji'";
            if ($conn->query($sql_inp) == true) {
                header('location: http://localhost/uts/admin/index.php?id=gaji');
            } else {
                echo "Terdapat error";
            }
            $conn->close();
        } else {
            header('location: http://localhost/uts/admin/');
        }
        break;
    case 'set_bayar';
        if (isset($_SESSION['login']['status']) && $_SESSION['login']['aktif'] == '1' && $_SESSION['login']['jabatan'] == '1') {
            $sql = "UPDATE gaji_user SET status='1' WHERE id='$_GET[user]'";
            $user = $conn->query($sql);
            if ($user == true) {
                header('location: http://localhost/uts/admin/index.php?id=gaji');
            } else {
                echo "Terdapat error";
            }
        } else {
            header('location: http://localhost/uts/admin/');
        }
        break;
    case 'delete';
        $sql_where = "SELECT * FROM user WHERE id='$_GET[user]'";
        $user_cari = $conn->query($sql_where)->fetch_array();
        if (isset($_SESSION['login']['status']) && $_SESSION['login']['aktif'] == '1' && $_SESSION['login']['jabatan'] == '1') {
            $del_sql = "DELETE FROM gaji_user WHERE id='$_GET[user]'";
            $user = $conn->query($del_sql);
            if ($user == true) {
                header('location: http://localhost/uts/admin/index.php?id=gaji');
            } else {
                echo "Terdapat error";
            }
        } else {
            header('location: http://localhost/uts/admin/');
        }
        break;
    default:
        if (isset($_SESSION['login']['status']) && $_SESSION['login']['aktif'] == '1' && $_SESSION['login']['jabatan'] == '1') {
            $id = $_SESSION['login']['id'];
            $sql = "SELECT* FROM user where id ='$id' and active = '1'";
            $sql_gaj = "SELECT gaji_user.*, user.nama_user FROM gaji_user INNER JOIN user ON user.id=gaji_user.id_user";
            $users = $conn->query($sql)->fetch_array();
            $gaji = $conn->query($sql_gaj);
            $conn->close();
            $title = "Pegawai";
            $content = "views/gaji/beranda.php";
            include_once 'views/template.php';
        } else {
            header('location: http://localhost/uts/admin/');
        }
}