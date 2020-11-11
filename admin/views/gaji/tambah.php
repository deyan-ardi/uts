    <div class="container mt-3">
        <div class="kotak">
            <?= (isset($msg)) ? $msg : '' ?>
        </div>
        <div class="jumbotron">
            <h1 class="display-5">Tambah Data Gaji</h1>
            <hr class="my-4">
            <div class="col-lg-6">
                <form action="index.php?id=gaji&page=proses_tambah" method="POST">
                    <div class="form-group">
                        <label for="pegawai">Nama Karyawan</label>
                        <select name="pegawai" id="pegawai" class="form-control" required>
                            <option value="">Pilih Karyawan</option>
                            <?php foreach ($pegawai as $data) { ?>
                            <option value="<?= $data['id'] ?>"><?= ucfirst($data['nama_user']) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hadir">Jumlah Hadir Perbulan</label>
                        <input required type="number" class="form-control" id="hadir" name="hadir" max="31" min="0">
                    </div>
                    <div class="form-group">
                        <label for="ijin">Jumlah Ijin Perbulan</label>
                        <input required type="number" class="form-control" id="ijin" name="ijin" max="31" min="0">
                    </div>
                    <button type="submit" class="btn btn-primary" value="SUBMIT" name="submit">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>