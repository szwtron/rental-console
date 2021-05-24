<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Detail Console</h1>
        </div>
    </section>

    <?php foreach ($detail as $dt) : ?>
        <div class="card">
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-5">
                        <img src="<?php echo base_url().'assets/upload/'.$dt->gambar ?>">
                    </div>
                    <div class="col-md-7">
                        <table class="table">
                            <tr>
                                <td>Category Console</td>
                                <td>
                                    <?php foreach($console as $cs) : ?>
                                        <?php echo $cs->nama_cat ?>
                                    <?php endforeach ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td><?php echo $dt->nama ?></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td><?php echo $dt->description ?></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><?php echo $dt->harga ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <?php 
                                        if($dt->status_console == "0"){
                                            echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                                        }else {
                                            "<span class='badge badge-primary'>Tersedia</span>";
                                        }
                                    ?>
                                </td>
                            </tr>
                        </table>

                        <a class="btn btn-sm btn-danger ml-4" href="<?php echo base_url('admin/console') ?>">Kembali</a>
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/console/update_console/'.$dt->id_console) ?>">Update</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>