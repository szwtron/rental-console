<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h4>Keranjang Belanja</h4>
        </div>
        
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th style="width:200px;">Gambar</th>
                    <th>Nama Console</th>
                    <th>Jumlah</th>
                    <th style="width:130px">Harga/hari</th>
                    <th>Fitur</th>
                </tr>

                <?php $transaksi = $this->cart->contents(); ?>

                <?php $no=1; foreach($this->cart->contents() as $tr) :?>
                    <tr class="align-middle">
                        <td><?php echo $no++?></td>
                        <td><img class="card-img-top" style="width:200px;" src="<?php echo base_url('assets/upload/'.$tr['gambar']) ?>"></td>

                        <td><?php echo $tr['name']?></td>
                        <td><?php echo $tr['qty']?></td>

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
                        <?php echo form_error('fromDate', '<div class="text-small text-danger">','</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="toDate" class="form-control">
                        <?php echo form_error('toDate', '<div class="text-small text-danger">','</div>') ?>
                    </div>
                
                    <div align="right">
                        <a href="<?php echo base_url('customer/dashboard/hapus_keranjang') ?>"><div class="btn btn-sm btn-danger">Hapus Keranjang</div></a>
                        <a href="<?php echo base_url('dashboard/index') ?>"><div class="btn btn-sm btn-primary">Back</div></a>
                        <button type="submit" class="btn btn-sm btn-success">Proceed to Checkout</button>
                    </div>
                </form>
            </div>

    </section>
</div>