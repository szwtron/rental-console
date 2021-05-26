<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/assets_shop/') ?>assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url('assets/assets_shop/') ?>css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#!">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#!">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('register') ?>">Register</a>
                        </li>
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

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        
                            <?php if($this->session->userdata('nama')) { ?>
                                <li class="nav-item" style="margin-right: 0.5rem; margin-top: 0.8rem;">
                                    Welcome, <?php echo $this->session->userdata('nama')?>
                                </li>
                                <li class="nav-item">
                                    <form class="d-flex" style="margin-right: 0.5rem; margin-top: 0.3rem;">
                                        <button class="btn btn-outline-dark" type="submit">
                                            <i class="bi-cart-fill me-1"></i>
                                            Cart
                                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                                        </button>
                                    </form>
                                </li>
                                
                                <a class="nav-link" href="<?php echo base_url('auth/logout')?>"><span class="btn btn-sm btn-warning">Logout</span></a>
                                <?php } else { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('auth/login')?>"><span class="btn btn-sm btn-success">Login</span></a>
                                </li>
                            <?php } ?>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </body>