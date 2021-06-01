<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="m-2" style="float:right;">
                <?php echo anchor('customer/dashboard/daftar_transaksi/'.$this->session->userdata('id'), '<button class="btn btn-success">X</button>') ?>
            </div>
            <h4>Detail Pesanan <div class="btn btn-sm btn-success">No. Invoice: <?php echo $transaksi[0]->id_invoice?></div></h4>

        </div>



        <table class="table table-bordered table-striped">
            <tr>
                <th style="width:50px;">ID Console</th>
                <th style="width:200px;">Gambar</th>
                <th>Nama Console</th>
                <!-- <th>Tanggal Rental</th>
                <th>Tanggal Pengembalian</th> -->
                <!-- <th>Harga/Hari</th> -->
                <th style="width:130px">Harga/Hari</th>
                <th>Fitur yang diinginkan</th>
                <!-- <th>Denda</th> -->
            </tr>

            <?php $no=1; foreach($transaksi as $tr) :?>
                <tr>
                    <td><?php echo $tr->id_rental?></td>
                    <td><img class="card-img-top" style="width:200px;" src="<?php echo base_url('assets/upload/'.$tr->gambar) ?>"></td>
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
                </tr>

            <?php endforeach; ?>
        </table>
    </section>
</div>