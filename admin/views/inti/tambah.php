<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=inti&page=save" method="POST" enctype="multipart/form-data">
    <div class="col-lg-6">
    <div class="form-group">
        <label for="">Nama Barang</label>
        <input type="text" name="nama_barang" required value="<?=(isset($_POST['nama_barang']))?$_POST['nama_barang']:'';?>" class="form-control">
        <input type="hidden" name="id_barang"  value="<?=(isset($_POST['id_barang']))?$_POST['id_barang']:'';?>" class="form-control">
        <input type="hidden" name="photo_old"  value="<?=(isset($_POST['photo']))?$_POST['photo']:'';?>">
        <span class="text-danger"><?=(isset($err['nama_barang']))?$err['nama_barang']:'';?></span>
    </div>
    <div class="form-group">
        <label for="">Harga</label>
        <input type="number" name="harga" value="<?=(isset($_POST['harga']))?$_POST['harga']:'';?>" class="form-control">
        <span class="text-danger"><?=(isset($err['harga']))?$err['harga']:'';?></span>
    </div>
    <div class="form-group">
        <label for="">Jenis Barang</label>
        <select name="id_jenis" class="form-control" required id="">
            <option value="">Pilih Jenis Barang</option>
            <?php if($barang != NULL){
                foreach($barang as $row){?>
                    <option <?=(isset($_POST['id_jenis']) && $_POST['id_jenis']==$row['id_jenis'])?"selected":'';?> value="<?=$row['id_jenis'];?>"> <?=$row['jenis_barang'];?></option>
                <?php }
            }?>
        </select>
        <span class="text-danger"><?=(isset($err['id_jenis']))?$err['id_jenis']:'';?></span>
    </div>
    <div class="form-group">
        <label for="">Pemasok</label>
        <select name="id_pemasok" class="form-control" required id="">
            <option value="">Pilih Pemasok</option>
            <?php if($barang != NULL){
                foreach($barang as $row){?>
                    <option <?=(isset($_POST['id_pemasok']) && $_POST['id_pemasok']==$row['id_pemasok'])?"selected":'';?> value="<?=$row['id_pemasok'];?>"> <?=$row['nama_pemasok'];?></option>
                <?php }
            }?>
        </select>
        <span class="text-danger"><?=(isset($err['id_pemasok']))?$err['id_pemasok']:'';?></span>
    </div>
    <div class="form-group">
            <label for="">Photo</label>
            <img src="../media/barang/<?=$_POST['photo']?>" style="width:180px">
            <input type="file" name="fileToUpload" class="form-control">
            <span class="text-danger"><?=(isset($err['fileToUpload']))?$err['fileToUpload']:'';?></span>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </div>
</form>