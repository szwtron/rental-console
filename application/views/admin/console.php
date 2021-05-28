<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Consoles</h1>
        </div>

        <a href="<?php echo base_url('admin/console/tambah_console')?>" class="btn btn-primary mb-3"><i class="fas fa-plus mr-1"></i>Tambah Data</a>
        
        <?php echo $this->session->flashdata('pesan') ?>

        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 1;
                    foreach($console as $cs) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td>
                            <img width="200px" src="<?php echo base_url().'assets/upload/'.$cs->gambar ?>" alt="">
                        </td>
                        <td><?php echo $cs->nama_console ?></td>
                        <td><?php echo $cs->description ?></td>
                        <td><?php echo $cs->id_category ?></td>
                        <td><?php echo $cs->harga ?></td>
                        <td> 
                            <?php            
                                if($cs->status_console == "0"){
                                echo "<span class='badge badge-danger'> Tidak Tersedia </span>";
                                } else {
                                echo "<span class='badge badge-success'> Tersedia </span>";
                                }
                            ?>    
                        </td>
                        <td>
                            <a href="<?php echo base_url('admin/console/detail_console/').$cs->id_console ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                            <a href="<?php echo base_url('admin/console/update_console/').$cs->id_console ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="<?php echo base_url('admin/console/delete_console/').$cs->id_console ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>

    </section>
</div>