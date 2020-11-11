<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=member&page=save" method="POST" enctype="multipart/form-data">
    <div class="col-lg-6">
    <div class="form-group">
        <label for="">Nama Member</label>
        <input type="text" name="nama_member" required value="<?=(isset($_POST['nama_member']))?$_POST['nama_member']:'';?>" class="form-control">
        <input type="hidden" name="id_member"  value="<?=(isset($_POST['id_member']))?$_POST['id_member']:'';?>" class="form-control">
        <input type="hidden" name="photo_old"  value="<?=(isset($_POST['photo']))?$_POST['photo']:'';?>">
        <span class="text-danger"><?=(isset($err['nama_member']))?$err['nama_member']:'';?></span>
    </div>
    <div class="form-group">
        <label for="">No HP</label>
        <input type="number" name="no_hp" value="<?=(isset($_POST['no_hp']))?$_POST['no_hp']:'';?>" class="form-control">
        <span class="text-danger"><?=(isset($err['no_hp']))?$err['no_hp']:'';?></span>
    </div>
    <div class="form-group">
        <label for="">Alamat</label>
        <input type="text" name="alamat" required value="<?=(isset($_POST['alamat']))?$_POST['alamat']:'';?>" class="form-control">
        <span class="text-danger"><?=(isset($err['alamat']))?$err['alamat']:'';?></span>
    </div>
    <div class="form-group">
            <label for="">Photo</label>
            <img src="../media/member/<?=$_POST['photo']?>" style="width:180px">
            <input type="file" name="fileToUpload" class="form-control">
            <span class="text-danger"><?=(isset($err['fileToUpload']))?$err['fileToUpload']:'';?></span>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" onclick="javascript: return confirm('Simpan data?')">Simpan</button>
    </div>
    </div>
</form>