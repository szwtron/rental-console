      <!-- Main Content -->
      <div class="main-content">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Customer</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $user[0]->total_user?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>All Transactions</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $invoice[0]->total_transaksi?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Done Transactions</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $done_invoice[0]->total_transaksi_selesai?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Gross Revenue</h4>
                </div>
                <div class="card-body">
                  <canvas id="myChart" height="182"></canvas>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
     