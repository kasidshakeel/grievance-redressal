<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">
    <head>
        <title>MGMT - Portal</title>
        <base href="<?= base_url(); ?>">
        <?php $this->load->view('links'); ?>
    </head>

    <body class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg bg-white border-bottom">
            <div class="container">
                <a class="navbar-brand fw-bold" href="homeController">MGMT - Portal</a>
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="homeController">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="homeController/complaints">Complaint</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="homeController/getStatus">Status</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboardController">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>