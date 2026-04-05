<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html class="no-js">
   
    <head>
        <meta charset="utf-8">
        <title>MGMT - LOGIN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="<?= base_url(); ?>">
        <?php
			$this->load->view('links');
		?>
    </head>
    <style>
        .offcanvas__lang-wrapper .offcanvas__lang-selected-lang::after {
            content: none !important;
            display: none !important;
        }
    </style>
        
<main>

    <section class="tp-login-area pb-140 p-relative z-index-1 fix pt-3" >
        <div class="container pt-20 mt-30 border bg-light">
            <div class="row justify-content-center" >
                <div class="col-xl-6 col-lg-8">
                    <div class="tp-login-wrapper">
                        <div class="text-center mb-4">
                            <h4 class="fw-bold">LOGIN - DASHBOARD</h4>
                        </div>
                        <?php
                            if ($this->session->flashdata('invalidUser')) {
                        ?>
                            <div class="alert alert-danger">
                                <?= $this->session->flashdata('invalidUser');?>
                            </div>
                        <?php        
                            }
                        ?>
                        <?=form_open('loginController/login')?>
                        <div class="tp-login-option">
                            <div class="tp-login-input-wrapper">
                                <div class="tp-login-input-box">
                                    <div class="tp-login-input">
                                        <input id="officer_email" name="officer_email" type="email" placeholder="Your Email">
                                        <?= form_error('officer_email')?>
                                    </div>
                                    <div class="tp-login-input-title">
                                        <label for="officer_email">Your Email</label>
                                    </div>
                                </div>
                                <div class="tp-login-input-box">
                                    <div class="tp-login-input">
                                        <input id="tp_password" name="officer_password" type="password" placeholder="Min. 6 character">
                                        <?= form_error('officer_password')?>
                                    </div>
                                    
                                    <div class="tp-login-input-title">
                                        <label for="tp_password">Password</label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="tp-login-bottom">
                                <button type="submit" class="btn btn-success w-50">Login</button>
                            </div>
                        </div>
                        <?=form_close()?>
                                
                            
                    </div>
                    <a href="homeController" class="text-center btn btn-outline-secondary m-2">Back</a>
                </div>
            </div>
        </div>
    </section>
</main>
