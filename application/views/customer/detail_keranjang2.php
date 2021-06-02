<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h4>Keranjang Belanja</h4>
        </div>
        
            <table class="table table-responsive table-bordered">
                <tr>
                    <th>No</th>
                    <th style="width:200px;">Gambar</th>
                    <th>Nama Console</th>
                    <th>Jumlah</th>
                    <!-- <th>Tanggal Rental</th>
                    <th>Tanggal Pengembalian</th> -->
                    <!-- <th>Harga/Hari</th> -->
                    <th style="width:130px">Harga/hari</th>
                    <th>Fitur</th>
                    <!-- <th>Tanggal Dikembalikan</th> -->
                    <!-- <th>Status Rental</th> -->
                    <!-- <th>Action</th> -->
                </tr>

                <?php $transaksi = $this->cart->contents(); ?>

                <?php $no=1; foreach($this->cart->contents() as $tr) :?>
                    <tr class="align-middle">
                        <td><?php echo $no++?></td>
                        <td><img class="card-img-top" style="width:200px;" src="<?php echo base_url('assets/upload/'.$tr['gambar']) ?>"></td>

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
            <div class="section justify-content-center">
                <div class="section-header">
                    <h1 class="m-2">Pilih Tanggal Sewa</h1>
                </div>
                <form class="m-2" method="post" action="<?php echo base_url('customer/dashboard/checkout') ?>">
                    <div class="form-group">
                        <label>Tanggal Rental</label>
                        <input type="date" name="fromDate" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="toDate" class="form-control">
                    </div>
                
                    <div align="right">
                        <!-- <div class="btn btn-sm btn-danger">Hapus Keranjang</div></a> -->
                        <a href="<?php echo base_url('customer/dashboard/hapus_keranjang') ?>"><div class="btn btn-sm btn-danger">Hapus Keranjang</div></a>
                        <a href="<?php echo base_url('dashboard/index') ?>"><div class="btn btn-sm btn-primary">Back</div></a>
                        <button type="submit" class="btn btn-sm btn-success">Proceed to Checkout</button>
                        <!-- <a href="<?php echo base_url('customer/dashboard/checkout') ?>"> </a>-->
                    </div>
                </form>
            </div>

    </section>
</div>