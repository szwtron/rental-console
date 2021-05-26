<style>
.vertical-center {
    vertical-align: middle;

}

.ml-1 {
    margin-left: ($spacer * .25) !important;
}
</style>

<div class="container mt-5 mb-5">
    <div class="card" style="width:0%; float:right;">
        <?php  ?>
        <?php echo anchor('customer/dashboard', '<button class="btn btn-success">X</button>') ?>
    </div>
        <div class="card-body">
            <?php foreach($detail as $det) : ?>
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?php echo base_url('assets/upload/'.$det->gambar)?>" style="width:500px;" alt="">
                    </div>
                    <div class="col-md-6">
                        <table class="table mt-5">
                            <tr>
                                <th>Nama</th>
                                <td><?php echo $det->nama ?></td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td><?php echo $det->description ?></td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td><?php echo $det->harga ?></td>
                            </tr>
                            <tr class="vertical-center">
                                <th style="">Status</th>
                                <td><?php if($det->status_console == "0"){
                                    echo "<span class='btn btn-danger mb-2' style='cursor:not-allowed;'disable> Tidak Tersedia </span>";
                                }else {
                                    echo "<span class='btn btn-warning mb-2' style='cursor:not-allowed;'disable> Tersedia </span>";
                                } ?></td>
                            </tr>
                            <tr>
                                <th>Game List:</th>
                                <td><?php echo $det->game_list ?></td>
                            </tr>
                            <tr class="vertical-center">
                                <th>Aksi</th>
                                <td><?php if($det->status_console == "0"){
                                    echo "<span class='btn btn-danger mb-2' style='cursor:not-allowed;'disable> Sedang dirental </span>";
                                }else {
                                    echo anchor('customer/rental/tambah_rental/'.$det->id_console, '<button class="btn btn-success mb-2">Rental</button>');
                                } ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>