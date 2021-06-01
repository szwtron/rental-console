<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Semua console yang sedang dipinjam</h1>
        </div>

        <table class="table table-bordered table-striped">
            <tr>
                <th>ID</th>
                <th>Nama Customer</th>
                <th>Gambar</th>
                <th>Nama Console</th>
                <!-- <th>Tanggal Rental</th>
                <th>Tanggal Pengembalian</th> -->
                <!-- <th>Harga/Hari</th> -->
                <th style="width:130px">Harga/Hari</th>
                <th>Fitur yang diinginkan</th>
                <th>Tanggal Dikembalikan</th>
                <!-- <th>Denda</th> -->
            </tr>

            <?php $no=1; foreach($transaksi as $tr) :?>
                <tr>
                    <td><?php echo $tr->id_rental?></td>
                    <td><?php echo $tr->nama?></td>
                    <td><img class="card-img-top" style="width:100px;" src="<?php echo base_url('assets/upload/'.$tr->gambar) ?>"></td>
                    <td><?php echo $tr->nama_console?></td>
                    <!-- <td><?php echo date('d/m/Y', strtotime($tr->fromDate));?></td>
                    <td><?php echo date('d/m/Y', strtotime($tr->toDate));?></td> -->
                    <td>Rp. <?php echo number_format($tr->harga, 0,',','.') ?></td>
                    <!-- <td><?php echo "Rp. $tr->harga_transaksi"?></td> -->
                    <td> 
                    
                    <?php if($tr->multiplayer_tr == "1") {
                        echo "<span class='badge alert-success m-1'>Multiplayer</span>";
                    }?>
                    <?php if($tr->ad_hoc_tr == "1") {
                        echo "<span class='badge alert-success m-1'>Ad-Hoc Network</span>";
                    }?>
                    <?php if($tr->online_tr == "1") {
                    echo "<span class='badge alert-success m-1'>Online</span>";
                    }?>
                    <?php if($tr->subscription_tr == "1") {
                    echo "<span class='badge alert-success m-1'>Subcsription</span>";
                    }?>
                    
                    </td>

                    <td class="text-center"><?php if($tr->returnDate == 0){
                        echo "<span class='badge alert-warning'>Belum dikembalikan</span>";
                    }else {
                        echo "<span class='badge alert-success'>".date('d/m/Y', strtotime($tr->returnDate))."</span>";
                    }?></td>

                    <!-- <td class="text-center"><?php if($tr->returnDate == 0){
                        echo "<span class='badge alert-warning'>Belum dikembalikan</span>";
                    }else if($tr->returnDate != 0 && $tr->denda == 0){
                        echo "<span class='badge alert-success'>".date('d/m/Y', strtotime($tr->returnDate))."</span>";
                    }else if($tr->returnDate != 0 && $tr->denda != 0){
                        echo "<span class='badge alert-success'>".date('d/m/Y', strtotime($tr->returnDate))."</span>";
                    }?></td> -->

                    <!-- <td class="text-center"><?php if($tr->denda == 0){
                        echo "-";
                    }else {
                        echo "<span class='badge alert-danger'>Rp. $tr->denda</span>";
                    }?></td> -->
                    
                </tr>

            <?php endforeach; ?>
        </table>
    </section>
</div>