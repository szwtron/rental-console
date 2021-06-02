<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Rental Console</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/assets_shop/') ?>assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url('assets/assets_shop/') ?>css/styles.css" rel="stylesheet" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>

    <style>
    @media (min-width: 768px) {
        .body {
            padding-top: 70px; /* nav height */
        }
        .sticky-nav {
            position:fixed;
            top:0;
            width: 100%;
            z-index: 99999999;
        }
    }
    </style>
    <body class="body">
        <nav class="navbar navbar-expand-lg navbar-light bg-light page-header sticky-nav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="<?php echo base_url('customer/dashboard') ?>">Rental Console</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo base_url('customer/dashboard') ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('customer/aboutus') ?>">About</a>
                        </li>

                        <?php if($this->session->userdata('nama')) { ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?php echo base_url('customer/dashboard/daftar_transaksi/'.$this->session->userdata('id')) ?>">Daftar Transaksi</a>
                            </li>
                        <?php } ?>
                    </ul>

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        
                            <?php if($this->session->userdata('nama')) { ?>
                                <li class="nav-item" style="margin-right: 0.5rem; margin-top: 0.8rem;">
                                    Welcome, <?php echo $this->session->userdata('nama')?>
                                </li>
                                <li class="nav-item">
                                    <form class="d-flex" style="margin-right: 0.5rem; margin-top: 0.3rem;">
                                            <?php 
                                                $keranjangs = $this->cart->total_items()
                                            ?>
                                        <a href="<?php echo base_url('customer/dashboard/detail_keranjang2/'.$keranjangs)?>" class="btn btn-outline-dark" type="submit">
                                            <i class="bi-cart-fill me-1"></i>
                                            Cart 
                                            <span> </span>
                                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $keranjangs ?></span>
                                        </a>
                                    </form>
                                </li>
                                
                                <a class="nav-link" href="<?php echo base_url('auth/logout')?>"><span class="btn btn-sm btn-warning">Logout</span></a>
                                <a class="nav-link" href="<?php echo base_url('auth/ganti_password')?>"><span class="btn btn-sm btn-primary">Change Password</span></a>
                                <?php } else { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('auth/login')?>"><span class="btn btn-sm btn-success">Login</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('register') ?>"><span class="btn btn-sm btn-primary">Register</span></a>
                                </li>
                            <?php } ?>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </body>