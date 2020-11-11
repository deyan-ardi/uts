    <div class="container mt-3">
        <div class="kotak">
            <?= (isset($msg)) ? $msg : '' ?>
        </div>
        <div class="jumbotron">
            <h1 class="display-5">Ubah Pegawai</h1>
            <hr class="my-4">
            <div class="col-lg-6">
                <form action="index.php?id=pegawai&page=proses_ubah&user=<?= $users_where['id'] ?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="foto">Foto Pegawai</label>
                        <input type="file" class="form-control" id="foto" name="file">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama User</label>
                        <input required type="text" class="form-control" id="name" name="nama"
                            value="<?= $users_where['nama_user'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Asal</label>
                        <input required type="text" class="form-control" id="alamat" name="alamat"
                            value="<?= $users_where['alamat_asal'] ?>">
                    </div>
                    <div class="form-group">
                        <?php

                        $admin = '';
                        $pegawai = '';
                        if ($users_where['jabatan'] == 1) {
                            $admin = "selected";
                        } else {
                            $pegawai = "selected";
                        }
                        ?>
                        <label for="jabatan">Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-control">
                            <option value="1" <?= $admin ?>>Admin</option>
                            <option value="2" <?= $pegawai ?>>Pegawai</option>
                        </select>
                    </div>
                    <input type="hidden" name="file_old" value="<?= $users_where['foto_user'] ?>">
                    <button type="submit" class="btn btn-primary" value="SUBMIT" name="submit">Ubah Data</button>
                </form>
            </div>
        </div>
    </div>