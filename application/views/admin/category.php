<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Data Category Console</h1>
        </div>
    </div>

    <a class="btn btn-primary mb-3" href="<?php echo base_url('admin/category/tambah_category')?>"><i class="fas fa-plus mr-1"></i>Tambah Category</a>

    <?php echo $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr class="text-center">
                <th width="200px">Id Category</th>
                <th>Nama Category</th>
                <th>Description</th>
                <th width="150px">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            foreach($category as $cat) : ?>
                <tr class="text-center">
                    <td><?php echo $cat->id_category ?></td>
                    <td><?php echo $cat->nama_cat ?></td>
                    <td><?php echo $cat->description_cat?></td>
                    <td>
                        <a href="<?php echo base_url('admin/category/update_category/').$cat->id_category ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo base_url('admin/category/delete_category/').$cat->id_category ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>