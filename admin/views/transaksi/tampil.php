<div class="row">
    <div class="pull-left">
        <h4>Daftar Transaksi</h4>
    </div>
    <!-- <div class="pull-right">
<<<<<<< HEAD
        <a href="index.php?mod=trans&page=add">
=======
        <a href="index.php?mod=inti&page=add">
>>>>>>> 3a94d7a301e958389c9909830debcf96b3c0ebc6
            <button class="btn btn-primary">Add</button>
        </a>
    </div> -->
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <td>
                    #
                </td>
                <td>Member</td><td>Nama Barang</td><td>Tanggal</td><th>Total</th><th>Total Biaya</th><td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php if($trans != NULL){ 
                $no=1;
                foreach($trans as $row){?>
                    <tr>
                        <td><?=$no;?></td><td><?=$row['nama_member']?></td><td><?=$row['nama_barang'];?></td><td><?=$row['tgl_trans']?></td>
                        <td><?=$row['banyak']?></td><td><?=$row['total_biaya']?></td>                        
                        <td>
<<<<<<< HEAD
                            <a href="index.php?mod=trans&page=delete&id=<?=md5($row['id_transaksi'])?>" onclick="javascript: return confirm('Hapus data?')"><i class="fa fa-trash"></i> </a>
=======
                            <a href="index.php?mod=trans&page=delete&id=<?=md5($row['id_detail'])?>"><i class="fa fa-trash"></i> </a>
>>>>>>> 3a94d7a301e958389c9909830debcf96b3c0ebc6
                        </td>
                    </tr>
               <?php $no++; }
            }?>
        </tbody>
    </table>
</div>