<div class="main-content">
    <section class="section">
        <div class="section-header"></div>
            <div class="pb-5">
            <div class="container">
            <div class="row">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5 mt-5">

                <!-- Shopping cart table -->
                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col" class="border-0 bg-light">
                            <div class="p-2 px-3 text-uppercase">Keranjang Belanja</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                            <div class="py-2 text-uppercase">Gambar</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                            <div class="py-2 text-uppercase">Harga / Hari</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                            <div class="py-2 text-uppercase">Quantity</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                            <div class="py-2 text-uppercase">Fitur</div>
                        </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $transaksi = $this->cart->contents();?>
                        <?php $no=1; foreach($this->cart->contents() as $tr) :?>
                        <tr>
                        <th scope="row" class="border-0">
                            <div class="p-2">
                            <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-1_zrifhn.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                            <div class="ml-3 d-inline-block align-middle">
                                <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><?php echo $tr['name']?></a></h5><span class="text-muted font-weight-normal font-italic d-block">Category: <?php echo $tr['category_name']?></span>
                            </div>
                            </div>
                        </th>
                        <td class="border-0 align-middle"><img class="card-img-top" style="width:200px;" src="<?php echo base_url('assets/upload/'.$tr['gambar']) ?>"></td>
                        <td class="border-0 align-middle"><strong>Rp. <?php echo number_format($tr['price'], 0,',','.')?></strong></td>
                        <td class="border-0 align-middle"><strong><?php echo $tr['qty']?></strong></td>
                        <td class="border-0 align-middle">

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

                    </tbody>
                    <?php endforeach; ?>
                    </table>
                </div>
                <!-- End -->
                </div>
            </div>

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
                        <a href="<?php echo base_url('customer/dashboard') ?>"><div class="btn btn-sm btn-primary">Back</div></a>
                        <button type="submit" class="btn btn-sm btn-success">Proceed to Checkout</button>
                    </div>
                </form>
            </div>
    </section>
</div>