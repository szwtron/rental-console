<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Form Tambah Category Console</h1>
        </div>
    </div>

    <form method="POST" action="<?php echo base_url('admin/category/tambah_category_action') ?>">
        <div class="form-group">
            <label>Nama Category</label>
            <input type="text" name="nama_cat" class="form-control">
            <?php echo form_error('nama_cat', '<div class="text-small text-danger">','</div>') ?>
        </div>

        <div class="form-group">
            <label>Description</label>
            <input type="text" name="description_cat" class="form-control">
            <?php echo form_error('description_cat', '<div class="text-small text-danger">','</div>') ?>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="rest" class="btn btn-danger">Reset</button>
    </form>
</div>