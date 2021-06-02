<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Update Console</h1>
        </div>

        <div class="card">
            <div class="card-body">

                <?php foreach($console as $cs) : ?>

                <form method="POST" action="<?php echo base_url('admin/console/update_console_action')?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Category Console</label>
                                <input type="hidden" name="id_console" value="<?php echo $cs->id_console?>">
                                <select name="id_category" class="form-control" id="id_category">
                                    <option value="<?php echo $cs->id_category ?>"><?php echo $cs->nama_cat ?></option>
                                    <?php foreach($category as $cat) : ?>
                                        <?php if($cs->id_category !== $cat->id_category) { ?>
                                            <option value="<?php echo $cat->id_category?>">
                                            <?php echo $cat->nama_cat ?></option>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('id_category', '<div class="text-small text-danger">','</div>') ?>
                            </div>

                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama_console" class="form-control" value="<?php echo $cs->nama_console ?>" id="nama_console">
                                <?php echo form_error('nama_console', '<div class="text-small text-danger">','</div>') ?>
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control" ><?php echo $cs->description ?></textarea>
                                <?php echo form_error('description', '<div class="text-small text-danger">','</div>') ?>
                            </div>

                            <div class="form-group">
                                <label for="">Game List</label>
                                <textarea name="game_list" class="form-control" ><?php echo $cs->game_list ?></textarea>
                                <?php echo form_error('game_list', '<div class="text-small text-danger">','</div>') ?>
                            </div>

                            <div class="form-group">
                                <label for="">Jumlah Stock</label>
                                <input type="number" name="stock" class="form-control" min ="0" value="<?php echo $cs->stock ?>">
                                <?php echo form_error('stock', '<div class="text-small text-danger">','</div>') ?>
                            </div>

                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" name="gambar" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" name="harga" class="form-control" value="<?php echo $cs->harga ?>">
                                <?php echo form_error('harga', '<div class="text-small text-danger">','</div>') ?>
                            </div>

                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status_console" class="form-control">
                                    <option
                                        <?php if($cs->status_console == 1){echo
                                        "selected='selected'";}
                                        echo $cs->status_console; ?>
                                        value="1">Tersedia
                                    </option>
                                    <option <?php if ($cs->status_console == 0){echo
                                    "selected='selected'";}
                                    echo $cs->status_console; ?> value="0">Tidak Tersedia</option>
                                </select>
                                <?php echo form_error('status_console', '<div class="text-small text-danger">','</div>') ?>
                            </div>

                            <div class="form-group">
                                <label for="">Storage: </label>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="hidden" name="medium_storage" value="0" />
                                    <input <?php if($cs->small_storage==1){echo "checked='checked'"; }?> class="form-check-input" type="checkbox" name="small_storage" value="1" />
                                    <label <?php if($cs->small_storage==1){echo "class='form-check-label active'"; }?> for="small_storage">250GB
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="hidden" name="medium_storage" value="0" />
                                    <input <?php if($cs->medium_storage==1){echo "checked='checked'"; }?> class="form-check-input" type="checkbox" name="medium_storage" value="1" />
                                    <label <?php if($cs->medium_storage==1){echo "class='form-check-label active'"; }?> for="medium_storage">500GB</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="hidden" name="large_storage" value="0" />
                                    <input <?php if($cs->large_storage==1){echo "checked='checked'"; }?> class="form-check-input" type="checkbox" name="large_storage" value="1" />
                                    <label <?php if($cs->large_storage==1){echo "class='form-check-label active'"; }?> for="large_storage">1000GB</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="hidden" name="multiplayer" value="0" />
                                    <input <?php if($cs->multiplayer==1){echo "checked='checked'"; }?> class="form-check-input" type="checkbox" name="multiplayer" value="1" />
                                    <label <?php if($cs->multiplayer==1){echo "class='form-check-label active'"; }?> for="multiplayer">Multiplayer</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="hidden" name="ad_hoc" value="0" />
                                    <input <?php if($cs->ad_hoc==1){echo "checked='checked'"; }?> class="form-check-input" type="checkbox" name="ad_hoc" value="1" />
                                    <label <?php if($cs->ad_hoc==1){echo "class='form-check-label active'"; }?> for="ad_hoc">Ad-hoc Network</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="hidden" name="online" value="0" />
                                    <input <?php if($cs->online==1){echo "checked='checked'"; }?> class="form-check-input" type="checkbox" name="online" value="1" />
                                    <label <?php if($cs->online==1){echo "class='form-check-label active'"; }?> for="online">Online</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="hidden" name="subscription" value="0" />
                                    <input <?php if($cs->subscription==1){echo "checked='checked'"; }?> class="form-check-input" type="checkbox" name="subscription" value="1" />
                                    <label <?php if($cs->subscription==1){echo "class='form-check-label active'"; }?> for="subscription">Subscription</label>
                                </div>
                            </div>

                            <input type="hidden" name="current_image" value="<?php echo $cs->gambar; ?>">
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