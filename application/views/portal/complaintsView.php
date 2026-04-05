<?php
    $this->load->view('portal/headerView');
?>
<main>
    <section class="fix pt-3" >
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">

                <?php 
                if ($this->session->flashdata('successMsg')){ ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('successMsg'); ?>
                    </div>
                <?php
                } 
                elseif ($this->session->flashdata('failedMsg')) {
                ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('failedMsg'); ?>
                    </div>
                <?php
                }
                ?>
                
                <?= form_open_multipart('homeController/addComplaint') ?>
                <div class="shadow-sm p-4">
                    <div class="row g-3">

                        <div class="col-md-6">
                            <input id="complain_name" name="complain_name" type="text" 
                                class="form-control" placeholder="Enter your name">
                            <?= form_error('complain_name') ?>
                        </div>

                        <div class="col-md-6">
                            <input id="complain_email" name="complain_email" type="email" 
                                class="form-control" placeholder="Enter your email">
                            <?= form_error('complain_email') ?>
                        </div>

                        <div class="col-md-6">
                            <input id="complain_phone" name="complain_phone" type="text" 
                                class="form-control" placeholder="Enter your phone">
                            <?= form_error('complain_phone') ?>
                        </div>

                        <div class="col-md-6">
                            <input id="complain_title" name="complain_title" type="text" 
                                class="form-control" placeholder="Enter Complaint Title">
                            <?= form_error('complain_title') ?>
                        </div>

                        <div class="col-md-6">
                            <textarea id="complain_descr" name="complain_descr" type="text" 
                                class="form-control" placeholder="Describe complaint"></textarea>
                                <?= form_error('complain_descr')?>
                        </div>

                        <div class="col-md-6">
                            <textarea id="complain_addr" name="complain_addr" 
                                class="form-control" placeholder="Complaint Address"></textarea>
                                <?= form_error('complain_addr') ?>
                        </div>

                        <div class="col-md-6">
                            <input id="complain_file" name="complain_file" type="file" 
                                class="form-control">
                            <?= form_error('complain_file') ?>
                        </div>

                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success px-5">
                                Submit Complaint
                            </button>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </section>
</main>
<?php
    $this->load->view('portal/footerView');
?>