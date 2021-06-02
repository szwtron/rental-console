<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?php echo base_url('assets/')?>rentol-logo.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                    <form method="POST" action="<?php echo base_url('register') ?>">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" autofocus>
                                <?php echo form_error('nama', '<div class="text-small text-danger">', '</div>')?>
                            </div>

                            <div class="form-group col-6">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username">
                                <?php echo form_error('username', '<div class="text-small text-danger">', '</div>')?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat">
                            <?php echo form_error('alamat', '<div class="text-small text-danger">', '</div>')?>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="gender" class="d-block">Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="">--Pilih Gender--</option>
                                        <option>Laki-laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                <?php echo form_error('gender', '<div class="text-small text-danger">', '</div>')?>
                            </div>

                            <div class="form-group col-6">
                                <label for="no_telepon">No. Telepon</label>
                                <input type="text" class="form-control" name="no_telepon">
                                <?php echo form_error('no_telepon', '<div class="text-small text-danger">', '</div>')?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email">
                                <div class="invalid-feedback"></div>
                                <?php echo form_error('email', '<div class="text-small text-danger">', '</div>')?>
                            </div>

                            <div class="form-group col-6">
                                <label for="password" class="d-block">Password</label>
                                <input type="password" class="form-control" name="password">
                                <?php echo form_error('password', '<div class="text-small text-danger">', '</div>')?>
                            </div>
                        </div>

                        <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Register
                        </button>

                    </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; 2021
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>