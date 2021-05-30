<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h4>Keranjang Belanja</h4>
        </div>
        <form method="POST" action="">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>Nama Console</th>
                    <th>Jumlah</th>
                    <!-- <th>Tanggal Rental</th>
                    <th>Tanggal Pengembalian</th> -->
                    <!-- <th>Harga/Hari</th> -->
                    <th style="width:130px">Harga/hari</th>
                    <th>Fitur yang diinginkan</th>
                    <!-- <th>Tanggal Dikembalikan</th> -->
                    <!-- <th>Status Rental</th> -->
                    <!-- <th>Action</th> -->
                </tr>

                <?php $transaksi = $this->cart->contents(); ?>

                <?php $no=1; foreach($this->cart->contents() as $tr) :?>
                    <tr class="align-middle">
                        <td><?php echo $no++?></td>

                        <!-- Row ID Automatically generated -->
                        <!-- <td><?php echo $tr['rowid']?></td> -->
                        <!-- <td><?php echo $tr['id']?></td>
                        <td><?php echo $tr['storage']?></td> -->
                        <!-- <td><?php echo $tr['id']?></td>
                        <td><?php echo $tr['id_user']?></td> -->

                        <td><?php echo $tr['name']?></td>
                        <td><?php echo $tr['qty']?></td>

                        <!-- Tanggal -->
                        <!-- <td><?php echo date('d/m/Y', strtotime($tr['fromDate']));?></td>
                        <td><?php echo date('d/m/Y', strtotime($tr['toDate']));?></td> -->
                        <!-- <td><?php echo "Rp. $tr->harga"?></td> -->

                        <td><?php echo $tr['price']?></td>
                        <td> 
                        
                        <?php if($tr['multiplayer_tr'] == "1") {
                            echo "<span class='badge alert-success m-1'>Multiplayer</span>";
                        }?>
                        <?php if($tr['ad_hoc_tr'] == "1") {
                            echo "<span class='badge alert-success m-1'>Ad-Hoc Network</span>";
                        }?>
                        <?php if($tr['online_tr'] == "1") {
                        echo "<span class='badge alert-success m-1'>Online</span>";
                        }?>
                        <?php if($tr['subscription_tr'] == "1") {
                        echo "<span class='badge alert-success m-1'>Subcsription</span>";
                        }?>
                        
                        </td>

                        <!-- Pengembalian -->
                        <!-- <td class="text-center"><?php if($tr['returnDate'] == 0){
                            echo "<span class='badge alert-warning'>Belum dikembalikan</span>";
                        }else if($tr->returnDate != 0 && $tr['denda'] == 0){
                            echo "<span class='badge alert-success'>".date('d/m/Y', strtotime($tr->returnDate))."</span>";
                        }else if($tr->returnDate != 0 && $tr['denda'] != 0){
                            echo "<span class='badge alert-danger'>".date('d/m/Y', strtotime($tr->returnDate))."</span>";
                        }?></td> -->

                        <!-- Status -->
                        <!-- <td>
                        <?php if($tr['status'] == "Sedang Dikirim"){
                            echo "<span class='badge alert-warning'>".$tr['status']."</span>";
                        }else if($tr['status'] == "Sudah Dikirim"){
                            echo "<span class='badge alert-success'>".$tr['status']."</span>";
                        }else if($tr['status'] == "Siap di Pick-up"){
                            echo "<span class='badge alert-warning'>".$tr['status']."</span>";
                        }else if($tr['status'] == "Selesai"){
                            echo "<span class='badge alert-success'>".$tr['status']."</span>";
                        }?>
                        </td> -->


                        <!-- Action -->
                        <!-- <td>
                            <?php 
                                
                                
                                if($tr['status'] == "Siap di Pick-up"){
                                    ?>
                                        <div class="row">
                                            <a href="<?php echo base_url('admin/transaction/transaction_selesai')?>" ><button class="btn btn-sm btn-success m-2"><i class="bi bi-check"></i></button></a>
                                            
                                        </div>
                                    <?php
                                }
                            
                            ?>
                            <a href="<?php echo base_url('admin/transaction/transaction_batal')?>" ><button class="btn btn-sm btn-danger m-2"><i class="bi bi-x"></i></button></a>
                        </td> -->
                        
                    </tr>

                <?php endforeach; ?>
            </table>
            <div align="right">
                <!-- <div class="btn btn-sm btn-danger">Hapus Keranjang</div></a> -->
                <a href="<?php echo base_url('customer/dashboard/hapus_keranjang') ?>"><div class="btn btn-sm btn-danger">Hapus Keranjang</div></a>
                <a href="<?php echo base_url('dashboard/index') ?>"><div class="btn btn-sm btn-primary">Back</div></a>
                <a href="<?php echo base_url('customer/dashboard/checkout') ?>"><div class="btn btn-sm btn-success">Proceed to Checkout</div></a>
            </div>

        </form>
    </section>
</div>