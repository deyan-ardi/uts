<div class="row">
    <div class="pull-left">
        <h4>Daftar Pemasok</h4>
    </div>
    <div class="pull-right">
        <a href="index.php?mod=user&page=add">
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
                <td>Nama Pemasok</td><td>Alamat</td><td>No HP</td><td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php if($user != NULL){ 
                $no=1;
                foreach($user as $row){?>
                    <tr>
                        <td><?=$no;?></td><td><?=$row['nama_pemasok']?></td><td><?=$row['alamat'];?></td><td><?=$row['no_hp']?></td>                 
                        <td>
                            <a href="index.php?mod=user&page=edit&id=<?=md5($row['id_pemasok'])?>"><i class="fa fa-pencil"></i> </a>
                            <a href="index.php?mod=user&page=delete&id=<?=md5($row['id_pemasok'])?>" onclick="javascript: return confirm('Hapus data?')"><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
               <?php $no++; }
            }?>
        </tbody>
    </table>
</div>