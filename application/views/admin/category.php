<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Data Category Console</h1>
        </div>
    </div>

    <a class="btn btn-primary mb-3" href="<?php echo base_url('admin/category/tambah_category')?>">Tambah Category</a>

    <?php echo $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr class="text-center">
                <th width="200px">Id Category</th>
                <th>Nama Category</th>
                <th>Description</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            foreach($category as $cat) : ?>
                <tr class="text-center">
                    <td><?php echo $cat->id_category ?></td>
                    <td><?php echo $cat->nama_cat ?></td>
                    <td><?php echo $cat->description_cat?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>