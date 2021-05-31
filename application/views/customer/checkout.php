<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <!-- Total Pembayaran -->
            
            <div class="section-header">
            <h1>Daftar Belanja</h1>
            <div class="btn btn-sm btn-success mb-2"><h4>Anda meminjam selama <?php echo $date['days'] ?> hari</h4></div>
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga/Hari</th>
                        <th>Harga Rental</th>
                    </tr>
                <?php $no = 1; $grand_total = 0; 
                    if($checkout = $this->cart->contents()) {
                        foreach ($checkout as $item){
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $item['name']?></td>
                                    <td><?php echo $item['price']?></td>
                                    <td><?php echo $item['price'] * $date['days']?></td>
                                </tr>
                            <?php
                            
                            $grand_total += $item['price'] * $date['days'];
                        }

                        //var_dump($grand_total);
                        
 
            ?>
            

                </table>
                
                <div class="btn btn-sm btn-success m-2 float-right"><h4>Total yang perlu dibayar: Rp. <?php echo number_format($grand_total, 0,',','.') ?></h4></div> <br><br>

            </div>

            <h3 class="mt-4">Input Data Pemesan dan Tanggal</h3>

            <form method="post" action="<?php echo base_url('customer/dashboard/proses_checkout') ?>">
            
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama_pemesan" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">No. Telepon</label>
                    <input type="text" name="noTelp" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Catatan</label>
                    <textarea type="text" name="catatan" class="form-control"> </textarea>
                </div>                  

                <!-- <div class="form-group">
                    <label>Tanggal Rental</label>
                    <input type="date" name="fromDate" class="form-control">
                </div> -->

                <input type="hidden" name="fromDate" value="<?php echo $date['fromDate'] ?>">
                <input type="hidden" name="toDate" value="<?php echo $date['toDate'] ?>">
                <input type="hidden" name="total" value ="<?php echo $grand_total ?>">

                <!-- <div class="form-group">
                    <label>Tanggal Kembali</label>
                    <input type="date" name="toDate" class="form-control">
                </div> -->
            

                <div class="">
                    <button type="submit" class="btn btn-primary m-2">Pesan</button>
                    <button type="reset" class="btn btn-danger m-2">Reset</button>
                </div>
            
            </form>
            <div>

                <?php 
                }else {
                    echo "<h4 class='m-1'>Keranjang belanja anda masih kosong</h4>";
                }
                ?>
            </div>            


        </div>

        <div class="col-me-2"></div>
    </div>
</div>