<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">
<head>

<title>MGMT - Dashboard</title>
<base href="<?= base_url(); ?>">

<?php $this->load->view('links'); ?>

</head>

<body>

    <nav class="nav m-3">
        <a class="nav-link active" aria-current="page" href="dashboardController">Home</a>
        <a class="nav-link" href="dashboardController/complaints">Complaints</a>
        <a class="nav-link" href="dashboardController/resolved">Resolved</a>
        <?php
            if ($this->session->userdata('officer_id') == 5771) {
        ?>
        <a class="nav-link" href="dashboardController/officers">Officers</a>
        <?php
            }
        ?>
        <a class="nav-link" href="loginController/logoutUser">Logout</a>
    </nav>
        