<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Customer</h1>
        </div>

        <a href="<?php echo base_url('admin/customer/tambah_customer')?>" class="btn btn-primary mb-3"><i class="fas fa-plus mr-1"></i>Tambah Customer</a>
        
        <?php echo $this->session->flashdata('pesan') ?>

        <table class="table table-striped table-responsive table-bordered">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Gender</th>
                <th>No. Telepon</th>
                <th>Action</th>
            </tr>

            <?php
                $no = 1;
                foreach($customer as $cst) :
            ?>
            
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $cst->nama?></td>
                <td><?php echo $cst->username?></td>
                <td><?php echo $cst->email?></td>
                <td><?php echo $cst->alamat?></td>
                <td><?php echo $cst->gender?></td>
                <td><?php echo $cst->no_telepon?></td>
                <td>
                    <a href="<?php echo base_url('admin/customer/hapus_customer/').$cst->id?>" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </a>
                    <a href="<?php echo base_url('admin/customer/update_customer/').$cst->id?>" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>

            <?php endforeach; ?>
        </table>