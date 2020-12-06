<?php
$con->auth();
$conn = $con->koneksi();
switch (@$_GET['page']) {
    case 'tambah';
        if (isset($_SESSION['login']['status']) && $_SESSION['login']['aktif'] == '1' && $_SESSION['login']['jabatan'] == '1') {
            $id = $_SESSION['login']['id'];
            $sql = "SELECT* FROM user where id ='$id' and active = '1'";
            $users = $conn->query($sql)->fetch_array();
            $conn->close();
            $title = "Tambah Data";
            $content = "views/pegawai/tambah.php";
            include_once 'views/template.php';
        } else {
            header('location: http://localhost/uts/admin/');
        }

        break;
    case 'proses_tambah';
        if (isset($_SESSION['login']['status']) && $_SESSION['login']['aktif'] == '1' && $_SESSION['login']['jabatan'] == '1') {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                //validasi
                if (empty($_POST['email']) || empty($_POST['passwd']) || empty($_POST['konf-passwd']) || empty($_POST['nama']) || empty($_POST['alamat'])) {
                    echo "Data Tidak Boleh Kosong";
                } else {
                    if (isset($_POST['submit'])) {
                        $email = $_POST['email'];
                        $sql_cek = "SELECT* FROM user where email ='$email'";
                        $cek_email = $conn->query($sql_cek);
                        if ($cek_email->num_rows > 0) {
                            echo "Email Sudah Digunakan";
                        } else {
                            if ($_POST['passwd'] != $_POST['konf-passwd']) {
                                echo "Password Tidak Sesuai";
                            } else {
                                $new_pass = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
                                if ($_FILES['file']['error'] == 0) {
                                    // Settingan
                                    $eks_foto_boleh = array('png', 'jpg');
                                    $nama_foto = $_FILES['file']['name'];
                                    $foto = explode('.', $nama_foto);
                                    $eksfoto = strtolower(end($foto));
                                    $ukuranfoto = $_FILES['file']['size'];
                                    $tmpfoto = $_FILES['file']['tmp_name'];
                                    if (in_array($eksfoto, $eks_foto_boleh) === true) {
                                        if ($ukuranfoto < 1500000) {
                                            //  Generate Nama Gambar Baru
                                            $new_Foto = uniqid() . "_" . $_POST['nama'];

                                            $new_Foto .= '.';
                                            $new_Foto .= $eksfoto;
                                            // $destination_path = getcwd() . DIRECTORY_SEPARATOR;
                                            $destination_path = $_SERVER['DOCUMENT_ROOT'] . '/uts/';
                                            // Target
                                            $target_foto = $destination_path . 'upload/' . $new_Foto;
                                            $in_email = $_POST['email'];
                                            $in_nama = $_POST['nama'];
                                            $in_alamat = $_POST['alamat'];
                                            $in_date = date('Y-m-d H:i:s');
                                            $in_sql =
                                                "INSERT INTO user (`email`,`password`,`foto_user`,`nama_user`,`jabatan`,`alamat_asal`,`active`,`create_at`) VALUES ('$in_email','$new_pass','$new_Foto','$in_nama',2,'$in_alamat',0,'$in_date')";

                                            if ($conn->query($in_sql) === true) {
                                                move_uploaded_file($tmpfoto, $target_foto);
                                                header('location: http://localhost/uts/admin/index.php?id=pegawai');
                                                exit;
                                            } else {
                                                var_dump($conn->query($in_sql));
                                                echo "Gagal ditambahkan, terjadi kesalahan";
                                            }
                                        } else {
                                            echo "Ukuran Foto Melebihi Ukuran Yang Diperbolehkan";
                                        }
                                    } else {
                                        echo "Ekstensi file tidak diperbolehkan";
                                    }
                                } else {
                                    echo "Gagal ditambahkan, Foto Wajib Diisi";
                                }
                            }
                        }
                    }
                }
            }
        } else {
            header('location: http://localhost/uts/admin/');
        }

        break;
    case 'edit';
        if (isset($_SESSION['login']['status']) && $_SESSION['login']['aktif'] == '1' && $_SESSION['login']['jabatan'] == '1') {
            $id = $_SESSION['login']['id'];
            $sql = "SELECT* FROM user where id ='$id' and active = '1'";
            $sql_where = "SELECT*FROM user WHERE id='$_GET[user]'";
            $users_where = $conn->query($sql_where)->fetch_array();
            $users = $conn->query($sql)->fetch_array();
            $conn->close();
            $title = "Tambah Data";
            $content = "views/pegawai/ubah.php";
            include_once 'views/template.php';
        } else {
            header('location: http://localhost/uts/admin/');
        }
        break;
    case 'proses_ubah';
        $sql_where = "SELECT * FROM user WHERE id='$_GET[user]'";
        $user_cari = $conn->query($sql_where)->fetch_array();
        if (isset($_SESSION['login']['status']) && $_SESSION['login']['aktif'] == '1' && $_SESSION['login']['jabatan'] == '1') {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                //validasi
                if (isset($_POST['submit'])) {
                    if (empty($_POST['nama']) || empty($_POST['alamat'])) {
                        echo "Data Tidak Boleh Kosong";
                    } else {
                        if ($_POST['nama'] == $user_cari['nama_user'] && $_POST['alamat'] == $user_cari['alamat_asal'] && $_POST['jabatan'] == $user_cari['jabatan'] && $_FILES['file']['error'] != 0) {
                            header('location: http://localhost/uts/admin/index.php?id=pegawai');
                        } else {
                            if (unlink($_SERVER['DOCUMENT_ROOT'] . "/uts/upload/" . $_POST['file_old'])) {
                                // Settingan
                                $eks_foto_boleh = array('png', 'jpg');
                                $nama_foto = $_FILES['file']['name'];
                                $foto = explode('.', $nama_foto);
                                $eksfoto = strtolower(end($foto));
                                $ukuranfoto = $_FILES['file']['size'];
                                $tmpfoto = $_FILES['file']['tmp_name'];
                                if (in_array($eksfoto, $eks_foto_boleh) === true) {
                                    if ($ukuranfoto < 1500000) {
                                        //  Generate Nama Gambar Baru
                                        $new_Foto = uniqid() . "_" . $_POST['nama'];
                                        $new_Foto .= '.';
                                        $new_Foto .= $eksfoto;
                                        $destination_path = $_SERVER['DOCUMENT_ROOT'] . '/uts/';
                                        // Target
                                        $target_foto = $destination_path . 'upload/' . $new_Foto;


                                        $in_nama = $_POST['nama'];
                                        $in_alamat = $_POST['alamat'];
                                        $in_jabatan = $_POST['jabatan'];
                                        $in_sql =
                                            "UPDATE user SET foto_user ='$new_Foto', nama_user ='$in_nama',jabatan= '$in_jabatan',alamat_asal= '$in_alamat' WHERE id='$_GET[user]'";
                                        if ($conn->query($in_sql) === true) {
                                            move_uploaded_file($tmpfoto, $target_foto);
                                            header('Location:' . $con->site_url() . 'admin/index.php?id=pegawai');
                                            exit;
                                        } else {
                                            echo "Terjadi Masalah";
                                        }
                                    } else {
                                        echo "Ukuran foto tidak sesuai";
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } else {
            header('location: http://localhost/uts/admin/');
        }

        break;
    case 'aktif';
        if (isset($_SESSION['login']['status']) && $_SESSION['login']['aktif'] == '1' && $_SESSION['login']['jabatan'] == '1') {
            $sql = "UPDATE user SET active='1' WHERE id='$_GET[user]'";
            $user = $conn->query($sql);
            if ($user == true) {
                header('location: http://localhost/uts/admin/index.php?id=pegawai');
            } else {
                echo "Terdapat error";
            }
        } else {
            header('location: http://localhost/uts/admin/');
        }
        break;
    case 'deaktif';
        if (isset($_SESSION['login']['status']) && $_SESSION['login']['aktif'] == '1' && $_SESSION['login']['jabatan'] == '1') {
            $sql = "UPDATE user SET active='0' WHERE id='$_GET[user]'";
            $user = $conn->query($sql);
            if ($user == true) {
                header('location: http://localhost/uts/admin/index.php?id=pegawai');
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
            if (unlink($_SERVER['DOCUMENT_ROOT'] . "/uts/upload/" . $user_cari['foto_user'])) {
                $del_sql = "DELETE FROM user WHERE id='$_GET[user]'";
                $user = $conn->query($del_sql);
                if ($user == true) {
                    header('location: http://localhost/uts/admin/index.php?id=pegawai');
                } else {
                    echo "Terdapat error";
                }
            }
        } else {
            header('location: http://localhost/uts/admin/');
        }
        break;
    default:
        if (isset($_SESSION['login']['status']) && $_SESSION['login']['aktif'] == '1' && $_SESSION['login']['jabatan'] == '1') {
            $id = $_SESSION['login']['id'];
            $sql = "SELECT* FROM user where id ='$id' and active = '1'";
            $sql_peg = "SELECT * FROM user WHERE jabatan != 1";
            $users = $conn->query($sql)->fetch_array();
            $pegawai = $conn->query($sql_peg);
            $conn->close();
            $title = "Pegawai";
            $content = "views/pegawai/beranda.php";
            include_once 'views/template.php';
        } else {
            header('location: http://localhost/uts/admin/');
        }
}