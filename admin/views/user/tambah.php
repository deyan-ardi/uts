<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=user&page=save" method="POST" enctype="multipart/form-data">
    <div class="col-lg-6">
    <div class="form-group">
        <label for="">Nama Pemasok</label>
        <input type="text" name="nama_pemasok" required value="<?=(isset($_POST['nama_pemasok']))?$_POST['nama_pemasok']:'';?>" class="form-control">
        <input type="hidden" name="id_pemasok"  value="<?=(isset($_POST['id_pemasok']))?$_POST['id_pemasok']:'';?>" class="form-control">
        <input type="hidden" name="photo_old"  value="<?=(isset($_POST['photo']))?$_POST['photo']:'';?>">
        <span class="text-danger"><?=(isset($err['nama_pemasok']))?$err['nama_pemasok']:'';?></span>
    </div>
    <div class="form-group">
        <label for="">Alamat</label>
        <input type="text" name="alamat" required value="<?=(isset($_POST['alamat']))?$_POST['alamat']:'';?>" class="form-control">
        <span class="text-danger"><?=(isset($err['alamat']))?$err['alamat']:'';?></span>
    </div>
    <div class="form-group">
        <label for="">No HP</label>
        <input type="number" name="no_hp" value="<?=(isset($_POST['no_hp']))?$_POST['no_hp']:'';?>" class="form-control">
        <span class="text-danger"><?=(isset($err['no_hp']))?$err['no_hp']:'';?></span>
    </div>
    <div class="form-group">
            <label for="">Photo</label>
            <img src="../media/user/<?=$_POST['photo']?>" style="width:180px">
            <input type="file" name="fileToUpload" class="form-control">
            <span class="text-danger"><?=(isset($err['fileToUpload']))?$err['fileToUpload']:'';?></span>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" onclick="javascript: return confirm('Simpan data?')">Simpan</button>
    </div>
    </div>
</form>