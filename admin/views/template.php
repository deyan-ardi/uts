<?php
include_once '../config/Config.php';
$con = new Config();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>UD SUMBER HASIL - <?= $title ?></title>
</head>

<body>
    <section id="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">SIM Penggajian</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" href="<?= $con->site_url() ?>">Home <span
                                class="sr-only">(current)</span></a>
                        <?php if ($users['jabatan'] == "1") { ?>
                        <a class="nav-link " href="<?= $con->site_url() ?>admin/index.php?id=pegawai">Data Pegawai</a>
                        <a class="nav-link " href="<?= $con->site_url() ?>admin/index.php?id=gaji">Data Gaji</a>
                        <?php } else { ?>
                        <a class="nav-link " href="<?= $con->site_url() ?>admin/index.php?id=detail_gaji">Detail
                            Gaji</a>
                        <?php } ?>
                        <li class=" nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= ucfirst($users['nama_user']) ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                    href="<?= $con->site_url() ?>admin/index.php?id=password&user=<?= $users['id'] ?>">Ganti
                                    Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"
                                    href="<?= $con->site_url() ?>admin/controller/logout.php">Logout</a>
                            </div>
                        </li>

                    </div>
                </div>
            </div>
        </nav>
    </section>
    <?php include $content ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>