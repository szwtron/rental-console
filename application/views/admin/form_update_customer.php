<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Add Customer</h1>
        </div>
    </section>

    <?php foreach($customer as $cst) :?>

    <form method="POST" action="<?php echo base_url('admin/customer/update_customer_action')?>">

        <div class="form-group">
            <label>Nama</label>
            <input type="hidden" name="id" value="<?php echo $cst->id ?>">
            <input type="text" name="nama" class="form-control" value="<?php echo $cst->nama ?>">
            <?php echo form_error('nama', '<span class="text-small text-danger">','</span>')?>
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $cst->username ?>">
            <?php echo form_error('username', '<span class="text-small text-danger">','</span>')?>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <?php echo form_error('password', '<span class="text-small text-danger">','</span>')?>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="<?php echo $cst->email ?>">
            <?php echo form_error('email', '<span class="text-small text-danger">','</span>')?>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $cst->alamat ?>">
            <?php echo form_error('alamat', '<span class="text-small text-danger">','</span>')?>
        </div>

        <div class="form-group">
            <label>Gender</label>
            <select name="gender" class="form-control">
                <option value="<?php echo $cst->gender ?>"><?php echo $cst->gender?></option>
                <?php 
                    if ($cst->gender == 'Laki-laki') {
                        echo '<option value="Perempuan">Perempuan</option>';
                    } else {
                        echo '<option value="Laki-laki">Laki-laki</option>';
                    }
                ?>
            </select>
            <?php echo form_error('gender', '<span class="text-small text-danger">','</span>')?>
        </div>

        <div class="form-group">
            <label>Nomor Telepon</label>
            <input type="text" name="no_telepon" class="form-control" value="<?php echo $cst->no_telepon ?>">
            <?php echo form_error('no_telepon', '<span class="text-small text-danger">','</span>')?>
        </div>

        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        <button type="reset" class="btn btn-sm btn-danger">Reset</button>

    </form>

    <?php endforeach; ?>
</div>