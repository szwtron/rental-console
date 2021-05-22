<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Consoles</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="POST" action="<?php echo base_url('admin/console/tambah_console_aksi')?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Category Console</label>
                                <select name="id_category" class="form-control" id="id_category">
                                    <option value="">--Pilih category</option>
                                    <?php foreach($category as $cat) : ?>
                                        <option value="<?php echo $cat->id_category?>">
                                        <?php echo $cat->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('id_category', '<div class="text-small text-danger">','</div>') ?>
                            </div>

                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama">
                            </div>          
                            
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>       
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" name="nama" class="form-control">
                            </div>  

                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control">
                                        <option value="">--Pilih Status--</option>
                                        <option value="1">Tersedia</option>
                                        <option value="0">Tidak Tersedia</option>
                                </select>
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
            </div>
        </div>

    </section>
</div>