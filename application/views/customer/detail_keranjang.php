
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h4>Keranjang Belanja</h4>
        </div>

        <table class=" table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Nama Console</th>
                <th>Jumlah</th>
                <th>Harga/Hari</th>
            </tr>

            <?php 
                $no = 1;
                foreach ($this->cart->contents() as $items) : ?>

                    <tr>
                        <td><?php echo $no++ ?></td>
                        
                        <td><?php echo $items['nama_console']?></td>
                        <td><?php echo $items['qty'] ?></td>
                        <td><?php echo $items['price'] ?></td>
                        
                    </tr>

            <?php endforeach; ?>
        </table>

        <!-- <form action="">
                <input type="hidden">
        </form> -->
        <div align="right">
            <!-- <div class="btn btn-sm btn-danger">Hapus Keranjang</div></a> -->
            <a href="<?php echo base_url('customer/dashboard/hapus_keranjang') ?>"><div class="btn btn-sm btn-danger">Hapus Keranjang</div></a>
            <a href="<?php echo base_url('dashboard/index') ?>"><div class="btn btn-sm btn-primary">Back</div></a>
            <a href="<?php echo base_url('dashboard/hapus_keranjang') ?>"><div class="btn btn-sm btn-success">Proceed to Checkout</div></a>
        </div>
    </section>
</div>