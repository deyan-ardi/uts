    <div class="container mt-3">
        <div class="kotak">
            <?= (isset($msg)) ? $msg : '' ?>
        </div>
        <div class="jumbotron">
            <h1 class="display-5">Tambah Data Pegawai</h1>
            <hr class="my-4">
            <div class="col-lg-6">
                <form action="index.php?id=pegawai&page=proses_tambah" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="foto">Foto Pegawai</label>
                        <input required type="file" class="form-control" id="foto" name="file">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input required type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input required type="password" class="form-control" id="password" name="passwd">
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Konfirmasi Password</label>
                        <input required type="password" class="form-control" id="password-confirm" name="konf-passwd">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama User</label>
                        <input required type="text" class="form-control" id="name" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Asal</label>
                        <input required type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <button type="submit" class="btn btn-primary" value="SUBMIT" name="submit">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>