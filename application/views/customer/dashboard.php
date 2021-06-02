    <style>
        @media (min-width: 768px) {
            .card-img-top {
                width: 50%; /* nav height */
            }
        }

        .game-list{
            margin-top:10rem;
        }
    </style>
    
    <body >
        <script>
            $('.carousel').carousel({
            interval: 2000
            })
        </script>

        <!-- Carousel -->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo base_url('assets/assets_shop/img/ps5-games-background.jpg') ?>" alt="First slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo base_url('assets/assets_shop/img/ps5-games-background.jpg') ?>" alt="Second slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo base_url('assets/assets_shop/img/ps5-games-background.jpg') ?>" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- Header-->
        <header class="py-5 bg-light">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-black">
                    <h1 class="display-4 fw-bolder">Play your dream games</h1>
                    <p class="lead fw-normal text-black-50 mb-0">With less money, more the fun</p>
                </div>
            </div>
        </header>

        <!-- Section Playstation -->
        <section>

        <div class="container px-4 px-lg-5 my-5 pt-5">
            <div class="text-center text-black">
                <img class="text-center" style="width: 6%; 3%;" src="<?php echo base_url('assets/assets_shop/img/playstation-logo.png') ?>" alt="First slide">
                <h1 class="display-4 fw-bolder">Playstation&#8482;</h1> 
            </div>
        </div>

        <div class="row text-center">
            <div class=""> 
                <div class="container px-4 px-lg-5">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                        <?php foreach($console as $cs) : 
                            
                            if($cs->id_category == 1){
                                ?> 
                            <div class="col-md-6" style="margin-top:4rem;">
                                <div class=" h-100 text-center">
                                    <!-- Product image-->
                                    <a href=""> <img class="card-img-top" src="<?php echo base_url('assets/upload/'.$cs->gambar) ?>" alt=""> </a>
                                    <!-- Product details-->
                                    <div class="card-body mb-0 mt-1">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h4 class="fw-bolder"><?php echo $cs->nama_console ?></h4>
                                            <!-- Product price-->
                                            <h3 class="mb-0"><?php echo "Rp. ".$cs->harga . " / hari"?></h3>
                                            
                                        </div>
                                    </div>
                                    <div class="card-body">
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
                                            <?php $keranjangs = $this->cart->total_items() ?>
                                            <?php                          
                                                if($cs->status_console == "0"){
                                                    echo "<span class='btn btn-danger mb-2' style='cursor:not-allowed;'disable> Tidak Tersedia </span>";
                                                } else { 
                                                    if($keranjangs == "0"){
                                                        echo anchor('customer/dashboard/tambah_keranjang/'.$cs->id_console, '<button class="btn btn-success mb-2">Rental</button>');
                                                    }else {
                                                        foreach($this->cart->contents() as $tr) :
                                                        if($tr['id'] == $cs->id_console) { 
                                                            $flag = "1";
                                                            break;
                                                        }else {
                                                            $flag = "0";
                                                        }
                                                        endforeach;  

                                                        if($flag == "0"){
                                                            echo anchor('customer/dashboard/tambah_keranjang/'.$cs->id_console, '<button class="btn btn-success mb-2">Rental</button>');
                                                        }else {
                                                            echo "<span class='btn btn-danger mb-2' style='cursor:not-allowed;'disable> Sudah anda pesan </span>";
                                                        }
                                                    }
                                                        
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

                                    <div class="card-footer pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?php echo base_url('customer/dashboard/detail_console/'.$cs->id_console) ?>">Details</a></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 game-list" style="">
                                <h1><?php echo $cs->nama_console ?> Playable Games:</h1>
                                <p><?php echo $cs->game_list ?></p>               
                            </div>
                                <?php 
                            }



                        ?>

                    <?php endforeach; ?> 
                </div>  
            </div>      

        </section>

        <!-- Section Nintento -->
        <section>
        <div class="container mt-5">
            <div class="text-center text-black">
                <img class="text-center" style="height:50%;!important"  src="<?php echo base_url('assets/assets_shop/img/nintendo-logo.png') ?>" alt="First slide">
                
            </div>
        </div>

        <div class="row text-center">
            <div class=""> 
                <div class="container px-4 px-lg-5">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                        <?php foreach($console as $cs) : 
                            
                            if($cs->id_category == 2){
                                ?> 
                            <div class="col-md-6" style="margin-top:4rem;">
                                <div class=" h-100 text-center">
                                    <!-- Product image-->
                                    <a href=""> <img class="card-img-top" src="<?php echo base_url('assets/upload/'.$cs->gambar) ?>" alt=""> </a>
                                    <!-- Product details-->
                                    <div class="card-body mb-0 mt-1">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder"><?php echo $cs->nama_console ?></h5>
                                            <!-- Product price-->
                                            <?php echo "Rp. ".$cs->harga . " / hari"?>
                                            
                                        </div>
                                    </div>
                                    <div class="card-body pb-0.1 m-0">
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
                                            <?php $keranjangs = $this->cart->total_items() ?>
                                            <?php                          
                                                if($cs->status_console == "0"){
                                                    echo "<span class='btn btn-danger mb-2' style='cursor:not-allowed;'disable> Tidak Tersedia </span>";
                                                } else { 
                                                    if($keranjangs == "0"){
                                                        echo anchor('customer/dashboard/tambah_keranjang/'.$cs->id_console, '<button class="btn btn-success mb-2">Rental</button>');
                                                    }else {
                                                        foreach($this->cart->contents() as $tr) :
                                                        if($tr['id'] == $cs->id_console) { 
                                                            $flag = "1";
                                                            break;
                                                        }else {
                                                            $flag = "0";
                                                        }
                                                        endforeach;  

                                                        if($flag == "0"){
                                                            echo anchor('customer/dashboard/tambah_keranjang/'.$cs->id_console, '<button class="btn btn-success mb-2">Rental</button>');
                                                        }else {
                                                            echo "<span class='btn btn-danger mb-2' style='cursor:not-allowed;'disable> Sudah anda pesan </span>";
                                                        }
                                                    }
                                                        
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

                                    <div class="card-footer pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?php echo base_url('customer/dashboard/detail_console/'.$cs->id_console) ?>">Details</a></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 game-list" style="">
                                <h1><?php echo $cs->nama_console ?> Playable Games:</h1>
                                <p><?php echo $cs->game_list ?></p>               
                            </div>
                                <?php 
                            }



                        ?>

                    <?php endforeach; ?> 
                </div>  
            </div>      


        </section>

        <div class="bg-white w-100 mt-5">
            <div class="text-center text-black">
            <br>
            </div>
        </div>

        <!-- Section All Console-->

        <div class="w-100 mt-5">
            <div class="text-center text-black">
                <h1 class="display-4 fw-bolder">All Console</h1> 
            </div>
        </div>

        <section class="bg-white">
        <!-- <?php echo $this->session->flashdata('pesan') ?> -->
        
            <div class="bg-white px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php foreach($console as $cs) : ?> 
                    <div class="col mb-5">
                        <div class="card h-100 text-center">
                            <!-- Product image-->
                            <a href=""> <img class="card-img-top mt-4" src="<?php echo base_url('assets/upload/'.$cs->gambar) ?>" alt=""> </a>
                            <!-- Product details-->
                            <div class="card-body mb-0 mt-1">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $cs->nama_console ?></h5>
                                    <!-- Product price-->
                                    <?php echo "Rp. ".$cs->harga . " / hari"?>
                                    
                                </div>
                            </div>
                            <div class="card-body pb-0.1 m-0">
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
                                    <?php $keranjangs = $this->cart->total_items() ?>
                                    <?php                          
                                        if($cs->status_console == "0"){
                                            echo "<span class='btn btn-danger mb-2' style='cursor:not-allowed;'disable> Tidak Tersedia </span>";
                                        } else { 
                                            if($keranjangs == "0"){
                                                echo anchor('customer/dashboard/tambah_keranjang/'.$cs->id_console, '<button class="btn btn-success mb-2">Rental</button>');
                                            }else {
                                                foreach($this->cart->contents() as $tr) :
                                                if($tr['id'] == $cs->id_console) { 
                                                    $flag = "1";
                                                    break;
                                                }else {
                                                    $flag = "0";
                                                }
                                                endforeach;  

                                                if($flag == "0"){
                                                    echo anchor('customer/dashboard/tambah_keranjang/'.$cs->id_console, '<button class="btn btn-success mb-2">Rental</button>');
                                                }else {
                                                    echo "<span class='btn btn-danger mb-2' style='cursor:not-allowed;'disable> Sudah anda pesan </span>";
                                                }
                                            }
                                                
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

                            <div class="card-footer pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?php echo base_url('customer/dashboard/detail_console/'.$cs->id_console) ?>">Details</a></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
            </div>
        </section>

