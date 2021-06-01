<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Transaksi</h1>
        </div>

        

        <table class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>ID Invoice</th>
                <th>Nama Pemesan</th>
                <th>Tanggal Rental</th>
                <th>Tanggal Pengembalian</th>
                <!-- <th>Harga/Hari</th> -->
                <th style="width:130px">Harga</th>
                <th>Alamat</th>
                <th>Tanggal Dikembalikan</th>
                <th>Status Rental</th>

                <th>Action</th>
            </tr>

            <?php $no=1; if($invoice != NULL) foreach($invoice as $tr) :?>
                <tr class="align-middle">
                    <td><?php echo $no++?></td>
                    <td><?php echo $tr->id_invoice?></td>
                    <td><?php echo $tr->nama_pemesan?></td>
                    <td><?php echo date('d/m/Y', strtotime($tr->fromDate));?></td>
                    <td><?php echo date('d/m/Y', strtotime($tr->toDate));?></td>
                    <td>Rp. <?php echo number_format($tr->total, 0,',','.') ?></td>
                    <td><?php echo $tr->alamat ?></td>

                    <!-- <td> 
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
                    </td> -->

                    <td class="text-center"><?php if($tr->returnDate == 0){
                        echo "<span class='badge alert-warning'>Belum dikembalikan</span>";
                    }else if($tr->returnDate != 0){
                        echo "<span class='badge alert-success'>".date('d/m/Y', strtotime($tr->returnDate))."</span>";
                    }?></td>

                    <td>
                    <?php if($tr->status_invoice == "Sedang Dikirim"){
                        echo "<span class='badge alert-warning'>$tr->status_invoice</span>";
                    }else if($tr->status_invoice == "Sudah Dikirim"){
                        echo "<span class='badge alert-success'>$tr->status_invoice</span>";
                    }else if($tr->status_invoice == "Siap di Pick-up"){
                        echo "<span class='badge alert-warning'>$tr->status_invoice</span>";
                    }else if($tr->status_invoice == "Selesai"){
                        echo "<span class='badge alert-success'>$tr->status_invoice</span>";
                    }?>
                    </td>

                    <!-- Status -->
                    <td>
                        <a href="<?php echo base_url('customer/invoice_customer/detail_invoice/').$tr->id_invoice?>" ><button class="btn btn-sm btn-primary m-2">Details</button></a>
                        <?php 
                        
                            if($tr->status_invoice == "Sudah Dikirim"){
                                ?>
                                    <div class="row">
                                        <a href="<?php echo base_url('customer/invoice_customer/transaction_diterima/').$tr->id_invoice?>" ><button class="btn btn-sm btn-success m-2"><i class="bi bi-check"></i></button></a>
                                        
                                    </div>
                                <?php
                            }
                        
                        ?>
                        <a href="<?php echo base_url('customer/invoice_customer/transaction_batal/').$tr->id_invoice?>" ><button class="btn btn-sm btn-danger m-2"><i class="bi bi-x"></i></button></a>
                    </td>
                    
                </tr>

            <?php endforeach; ?>
        </table>
    </section>
</div>