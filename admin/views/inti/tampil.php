<div class="row">
    <div class="pull-left">
        <h4>Daftar Barang</h4>
    </div>
    <div class="pull-right">
        <a href="index.php?mod=inti&page=add">
            <button class="btn btn-primary">Add</button>
        </a>
    </div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <td>
                    #
                </td>
                <td>Nama Barang</td><td>Harga</td><td>Jenis Barang</td><td>Nama Pemasok</td><td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php if($penyedia != NULL){ 
                $no=1;
                foreach($penyedia as $row){?>
                    <tr>
                        <td><?=$no;?></td><td><?=$row['nama_barang']?></td><td><?=$row['harga'];?></td><td><?=$row['jenis_barang']?></td>
                        <td><?=$row['nama_pemasok']?></td>
                        <td>
                            <a href="index.php?mod=inti&page=edit&id=<?=md5($row['id_barang'])?>"><i class="fa fa-pencil"></i> </a>
<<<<<<< HEAD
                            <a href="index.php?mod=inti&page=delete&id=<?=md5($row['id_barang'])?>" onclick="javascript: return confirm('Hapus data?')"><i class="fa fa-trash"></i> </a>
=======
                            <a href="index.php?mod=inti&page=delete&id=<?=md5($row['id_barang'])?>"><i class="fa fa-trash"></i> </a>
>>>>>>> 3a94d7a301e958389c9909830debcf96b3c0ebc6
                        </td>
                    </tr>
               <?php $no++; }
            }?>
        </tbody>
    </table>
</div>