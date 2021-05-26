    <body>
        <!-- Navigation-->
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav> -->
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop homepage template</p>
                </div>
            </div>
        </header>
        <!-- Section-->

        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                <?php foreach($console as $cs) : ?> 
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <a href="#"> <img class="card-img-top" src="<?php echo base_url('assets/upload/'.$cs->gambar) ?>" alt=""> </a>
                            <!-- Product details-->
                            <div class="card-body pt-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $cs->nama ?></h5>
                                    <!-- Product price-->
                                    <?php echo "Rp. ".$cs->harga . " / hari"?>
                                    
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="text-center">
                                    <!-- Fitur Console -->
                                    <?php 
                                        if($cs->multiplayer == "1"){
                                            echo "<span class='badge alert-success'><span>&#10003;</span> Multiplayer</span>";
                                        } else {
                                            echo "<span class='badge alert-danger'><span>&#10007;</span> Multiplayer</span>";
                                        }
                                    ?>

                                    <?php 
                                        if($cs->ad_hoc == "1")
                                        echo "<span class='badge alert-success'><span>&#10003;</span> Ad-hoc Network</span>"
                                    ?>

                                    <?php 
                                        if($cs->online == "1") {
                                        echo "<span class='badge alert-success'><span>&#10003;</span> Online</span>";
                                        } else {
                                            echo "<span class='badge alert-danger'><span>&#10007;</span> Online</span>";
                                        }
                                    ?>

                                    <?php 
                                        if($cs->subscription == "1") 
                                        echo "<span class='badge alert-success'><span>&#10003;</span> Subscription</span>"
                                    ?>
                                    
                                    <?php 
                                        if($cs->small_storage == "1")
                                        echo "<span class='badge alert-success'><span>&#10003;</span> 250GB</span>"
                                    ?>

                                    <?php 
                                        if($cs->medium_storage == "1")
                                        echo "<span class='badge alert-success'><span>&#10003;</span> 500GB</span>"
                                    ?>         

                                    <?php 
                                        if($cs->large_storage == "1")
                                        echo "<span class='badge alert-success'><span>&#10003;</span> 1000GB</span>"
                                    ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="text-center">

                                <?php if($this->session->userdata('nama')) { ?>
                                    <?php                          
                                        if($cs->status_console == "0"){
                                            echo "<span class='btn btn-danger mb-2' style='cursor:not-allowed;'disable> Tidak Tersedia </span>";
                                        } else {
                                            echo anchor('customer/rental/tambah_rental/'.$cs->id_console, '<button class="btn btn-success mb-2">Rental</button>');
                                        }
                                    ?>
                                    
                                    
                                    <?php } else { ?>

                                    <?php                          
                                        if($cs->status_console == "0"){
                                            echo "<span class='btn btn-danger mb-2' style='cursor:not-allowed;'disable> Tidak Tersedia </span>";
                                        } else {
                                            echo anchor('auth/login', '<button class="btn btn-success mb-2">Rental</button>');
                                        }
                                    ?>   
                                <?php } ?>

                            </div>
                            
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?php echo base_url('customer/dashboard/detail_console/'.$cs->id_console) ?>">Details</a></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
            </div>
        </section>

