<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Invoice Rental Console</h1>
        </div>

        <table class="table table-bordered table-striped">
            <tr>
                <th style="width:50px;">ID Invoice</th>
                <th>Nama Pemesan</th>
                <th>No Telepon</th>
                <th>Alamat Pengiriman</th>
                <th>Tanggal Pemesanan</th>
                <th>Batas Pengembalian</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

            <?php foreach($invoice as $inv) :?>
                <tr>
                    <td><?php echo $inv->id_invoice?></td>
                    <td><?php echo $inv->nama_pemesan?></td>
                    <td><?php echo $inv->noTelp?></td>
                    <td><?php echo $inv->alamat?></td>
                    <td><?php echo $inv->fromDate?></td>
                    <td><?php echo $inv->toDate?></td>
                    <td>Rp. <?php echo number_format($inv->total, 0,',','.') ?></td>

                    <!-- <td><?php echo $inv->status?></td> -->

                    <td>
                    <?php if($inv->status == "Sedang Dikirim"){
                        echo "<span class='badge alert-warning'>$inv->status</span>";
                    }else if($inv->status == "Sudah Dikirim"){
                        echo "<span class='badge alert-success'>$inv->status</span>";
                    }else if($inv->status == "Siap di Pick-up"){
                        echo "<span class='badge alert-warning'>$inv->status</span>";
                    }else if($inv->status == "Selesai"){
                        echo "<span class='badge alert-success'>$inv->status</span>";
                    }?>
                    </td>

                    <td>
                        
                        <div class="row">
                        <?php echo anchor('admin/invoice/detail/'.$inv->id_invoice, '<div class="btn btn-sm btn-primary mr-2">Details</div>' ) ?>
                        <?php 
                            
                            if($inv->status == "Sedang Dikirim"){
                                ?>
                                    
                                        <a href="<?php echo base_url('admin/transaction/transaction_selesai')?>" class="btn btn-sm btn-success mr-2"><i class="fas fa-check"></i></a>
                                        <a href="<?php echo base_url('admin/transaction/transaction_batal')?>" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                                    
                                <?php
                            }
                        
                        ?>
                        </div>



                        
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</div>
