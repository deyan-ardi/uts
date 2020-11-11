    <div class="container mt-3">
        <div class="kotak">
            <?= (isset($msg)) ? $msg : '' ?>
        </div>
        <div class="jumbotron">
            <h1 class="display-5">Ubah Password</h1>
            <hr class="my-4">
            <div class="col-lg-6">
                <form action="index.php?id=password&page=proses_ubah" method="POST">
                    <div class="form-group">
                        <label for="password">Password Lama</label>
                        <input required type="password" class="form-control" id="password" name="old-passwd">
                    </div>
                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input required type="password" class="form-control" id="password" name="passwd">
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Konfirmasi Password</label>
                        <input required type="password" class="form-control" id="password-confirm" name="konf-passwd">
                    </div>
                    <button type="submit" class="btn btn-primary" value="SUBMIT" name="submit">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>