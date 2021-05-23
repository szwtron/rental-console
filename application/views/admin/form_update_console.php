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
                                <input type="text" name="nama" class="form-control" value="<?php echo $cs->nama ?>" id="nama">
                                <?php echo form_error('nama', '<div class="text-small text-danger">','</div>') ?>
                            </div>          
                            
                            <div class="form-group">
                                <label for="">Description</label>
                                <input name="description" class="form-control" value="<?php echo $cs->description ?>"></input>
                                <?php echo form_error('description', '<div class="text-small text-danger">','</div>') ?>
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
                                    <option <?php if($cs->status_console == 1){echo 
                                    "selected='selected'";}
                                    echo $cs->status_console; ?> value="1">Tersedia</option>
                                    <option <?php if ($cs->status_console == 0){echo 
                                    "selected='selected'";}
                                    echo $cs->status_console; ?> value="0">Tidak Tersedia</option>
                                </select>
                                <?php echo form_error('status_console', '<div class="text-small text-danger">','</div>') ?>
                            </div>     

                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" name="gambar" class="form-control">
                            </div>   

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