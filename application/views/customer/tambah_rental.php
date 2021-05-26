<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Add Rental</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="<?php echo base_url('admin/console/tambah_console_aksi')?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Category Console</label>
                                <select name="id_category" class="form-control" id="id_category">
                                    <option value="">--Pilih category</option>
                                    <?php foreach($category as $cat) : ?>
                                        <option value="<?php echo $cat->id_category?>">
                                        <?php echo $cat->nama_cat ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('id_category', '<div class="text-small text-danger">','</div>') ?>
                            </div>

                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama">
                                <?php echo form_error('nama', '<div class="text-small text-danger">','</div>') ?>
                            </div>          
                            
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control"></textarea>
                                <?php echo form_error('description', '<div class="text-small text-danger">','</div>') ?>
                            </div>      
                            
                            <div class="form-group">
                                <label for="">Game List</label>
                                <textarea name="game_list" class="form-control"></textarea>
                                <?php echo form_error('game_list', '<div class="text-small text-danger">','</div>') ?>   
                            </div>

                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" name="gambar" class="form-control">
                            </div>   
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" name="harga" class="form-control">
                                <?php echo form_error('harga', '<div class="text-small text-danger">','</div>') ?>
                            </div>  

                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status_console" class="form-control">
                                        <option value="">--Pilih Status--</option>
                                        <option value="1">Tersedia</option>
                                        <option value="0">Tidak Tersedia</option>
                                </select>
                                <?php echo form_error('status_console', '<div class="text-small text-danger">','</div>') ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Storage: </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="hidden" name="small_storage" value="0" />
                                    <input class="form-check-input" type="checkbox" name="small_storage" value="1" />
                                    <label class="form-check-label" for="">250GB</label>
                                </div>      
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="hidden" name="medium_storage" value="0" />
                                    <input class="form-check-input" type="checkbox" name="medium_storage" value="1" />
                                    <label class="form-check-label" for="">500GB</label>
                                </div>         
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="hidden" name="large_storage" value="0" />
                                    <input class="form-check-input" type="checkbox" name="large_storage" value="1" />
                                    <label class="form-check-label" for="">1000GB</label>
                                </div>   
                            </div>

                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="hidden" name="multiplayer" value="0" />
                                    <input class="form-check-input" type="checkbox" name="multiplayer" value="1" />
                                    <label class="form-check-label" for="">Multiplayer</label>
                                </div>      
                            </div>

                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="hidden" name="ad_hoc" value="0" />
                                    <input class="form-check-input" type="checkbox" name="ad_hoc" value="1" />
                                    <label class="form-check-label" for="">Ad-hoc Network</label>
                                </div>      
                            </div>

                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="hidden" name="online" value="0" />
                                    <input class="form-check-input" type="checkbox" name="online" value="1" />
                                    <label class="form-check-label" for="">Online</label>
                                </div>      
                            </div>

                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="hidden" name="subscription" value="0" />
                                    <input class="form-check-input" type="checkbox" name="subscription" value="1" />
                                    <label class="form-check-label" for="">Subscription</label>
                                </div>      
                            </div>



                            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                            <button type="reset" class="btn btn-danger mt-2">Reset</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
</div>