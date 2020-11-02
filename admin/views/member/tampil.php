<div class="row">
    <div class="pull-left">
        <h4>Daftar Member</h4>
    </div>
    <div class="pull-right">
        <a href="index.php?mod=member&page=add">
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
                <td>Nama Member</td><td>No HP</td><td>Alamat</td><td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php if($user != NULL){ 
                $no=1;
                foreach($user as $row){?>
                    <tr>
                        <td><?=$no;?></td><td><?=$row['nama_member']?></td><td><?=$row['no_hp'];?></td><td><?=$row['alamat']?></td>                 
                        <td>
                            <a href="index.php?mod=member&page=edit&id=<?=md5($row['id_member'])?>"><i class="fa fa-pencil"></i> </a>
                            <a href="index.php?mod=member&page=delete&id=<?=md5($row['id_member'])?>" onclick="javascript: return confirm('Hapus data?')"><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
               <?php $no++; }
            }?>
        </tbody>
    </table>
</div>