<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <!-- Total Pembayaran -->
            <div class="btn btn-sm btn-success m-2">
                <?php $grand_total = 0; 
                    if($checkout = $this->cart->contents()) {
                        foreach ($checkout as $item){
                            $grand_total += $item['price'];
                        }

                        // echo "<h4>Total yang perlu dibayar: Rp. ".number_format($grand_total, 0,',','.')."</h4>";
                    
                ?>
            </div> <br><br>
            <h3>Input Data Pemesan dan Tanggal</h3>

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
                    <label>Tanggal Rental</label>
                    <input type="date" name="fromDate" class="form-control">
                </div>

                <div class="form-group">
                    <label>Tanggal Kembali</label>
                    <input type="date" name="toDate" class="form-control">
                </div>
            

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