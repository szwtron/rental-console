<style>
.responsive {
  width: 100%;
  max-width: 400px;
  height: auto;
}
</style>

<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Add Rental</h1>
        </div>



        <div class="card">
            <div class="card-body">
            <?php foreach($detail as $dt) : ?>


                <div class="card-body text-center">
                    <a href=""> <img class="card-img responsive" src="<?php echo base_url('assets/upload/'.$dt->gambar) ?>" alt="" > </a>
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder mt-4 mb-0"><?php echo $dt->nama_console ?></h5>
                    </div>
                </div>

                <form method="POST" action="<?php echo base_url('customer/order/tambah_rental_aksi')?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Harga Sewa/Hari</label>
                                <input type="hidden" name="id_console" value="<?php echo $dt->id_console ?>">
                                <input type="text" name="harga" class="form-control" value="<?php echo $dt->harga ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Rental</label>
                                <input type="date" name="fromDate" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Tanggal Kembali</label>
                                <input type="date" name="toDate" class="form-control">
                            </div>
                        </div>
                
                        <div class="col-md-6">
                            <!-- <div class="form-group">
                                <label for="">Storage: </label>
                                <div class="form-check form-check-inline">
                                    <select name="storage">

                                    </select>
                                </div>
                            </div> -->

                            <div class="form-group">
                                <label for="">Storage</label>
                                <select name="storage" class="form-control" id="storage">
                                    <option value="">--Pilih storage</option>
                                    <?php foreach($console as $cs) : ?>
                                        <?php if($cs->small_storage == '1') { ?>
                                            <option value="250GB">250GB</option>
                                        <?php } if($cs->medium_storage == '1') { ?>
                                            <option value="500GB">500GB</option>
                                        <?php } if($cs->large_storage == '1') { ?>
                                        <option value="1000GB">1000GB</option>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('id_category', '<div class="text-small text-danger">','</div>') ?>
                            </div>

                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="hidden" name="multiplayer_tr" value="0" />
                                    <input class="form-check-input" type="checkbox" name="multiplayer_tr" value="1" />
                                    <label class="form-check-label" for="">Multiplayer</label>
                                </div>      
                            </div>

                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="hidden" name="ad_hoc_tr" value="0" />
                                    <input class="form-check-input" type="checkbox" name="ad_hoc_tr" value="1" />
                                    <label class="form-check-label" for="">Ad-hoc Network</label>
                                </div>      
                            </div>

                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="hidden" name="online_tr" value="0" />
                                    <input class="form-check-input" type="checkbox" name="online_tr" value="1" />
                                    <label class="form-check-label" for="">Online</label>
                                </div>      
                            </div>

                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="hidden" name="subscription_tr" value="0" />
                                    <input class="form-check-input" type="checkbox" name="subscription_tr" value="1" />
                                    <label class="form-check-label" for="">Subscription</label>
                                </div>      
                            </div>
                        </div>


                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                            <button type="reset" class="btn btn-danger mt-2">Reset</button>
                        </div>
                    </div>
                </form>
                <?php endforeach; ?>
            </div>
        </div>

    </section>
</div>