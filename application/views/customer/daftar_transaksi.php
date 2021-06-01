<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Transaksi</h1>
        </div>

        <table class="table-responsive table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Nama Console</th>
                <th>Tanggal Rental</th>
                <th>Tanggal Pengembalian</th>
                <!-- <th>Harga/Hari</th> -->
                <th style="width:130px">Harga</th>
                <th>Fitur yang diinginkan</th>
                <th>Tanggal Dikembalikan</th>
                <th>Status Rental</th>
                <th>Denda</th>
                <th>Action</th>
            </tr>

            <?php $no=1; foreach($transaksi as $tr) :?>
                <tr class="align-middle">
                    <td><?php echo $no++?></td>
                    <td><?php echo $tr->nama_console?></td>
                    <td><?php echo date('d/m/Y', strtotime($tr->fromDate));?></td>
                    <td><?php echo date('d/m/Y', strtotime($tr->toDate));?></td>
                    <!-- <td><?php echo "Rp. $tr->harga"?></td> -->
                    <td><?php echo "Rp. $tr->harga_transaksi"?></td>
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
                    }else if($tr->returnDate != 0 && $tr->denda == 0){
                        echo "<span class='badge alert-success'>".date('d/m/Y', strtotime($tr->returnDate))."</span>";
                    }else if($tr->returnDate != 0 && $tr->denda != 0){
                        echo "<span class='badge alert-danger'>".date('d/m/Y', strtotime($tr->returnDate))."</span>";
                    }?></td>

                    <td>
                    <?php if($tr->status == "Sedang Dikirim"){
                        echo "<span class='badge alert-warning'>$tr->status</span>";
                    }else if($tr->status == "Sudah Dikirim"){
                        echo "<span class='badge alert-success'>$tr->status</span>";
                    }else if($tr->status == "Siap di Pick-up"){
                        echo "<span class='badge alert-warning'>$tr->status</span>";
                    }else if($tr->status == "Selesai"){
                        echo "<span class='badge alert-success'>$tr->status</span>";
                    }?>
                    </td>

                    <td class="text-center"><?php if($tr->denda == 0){
                        echo "-";
                    }else {
                        echo "<span class='badge alert-danger'>Rp. $tr->denda</span>";
                    }?></td>

                    <!-- Status -->
                    <td>
                        <?php 
                        
                            if($tr->status == "Siap di Pick-up"){
                                ?>
                                    <div class="row">
                                        <a href="<?php echo base_url('admin/transaction/transaction_selesai')?>" ><button class="btn btn-sm btn-success m-2"><i class="bi bi-check"></i></button></a>
                                        
                                    </div>
                                <?php
                            }
                        
                        ?>
                        <a href="<?php echo base_url('admin/transaction/transaction_batal')?>" ><button class="btn btn-sm btn-danger m-2"><i class="bi bi-x"></i></button></a>
                    </td>
                    
                </tr>

            <?php endforeach; ?>
        </table>
    </section>
</div>