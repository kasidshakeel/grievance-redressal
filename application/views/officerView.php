<?php
    $this->load->view('headerView');
?>
<main>
    <section class="tp-login-area pb-10 p-relative z-index-1 fix border-top" >
        <div class="row justify-content-center" >
            <div class="col-xl-6 col-lg-8">
                
                <div class="tp-login-wrapper">
                    <div class="text-center mb-4">
                        <h4 class="fw-bold">LIST OF OFFICERS</h4>
                    </div>
					<table class="table table-responsive">
						<thead>
							<th>Officer ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php
                                    
                                if ($this->session->flashdata('avl_msg')) {
                                    echo "<div class='alert alert-danger'>". $this->session->flashdata('avl_msg') . "</div>";
                                }
                                elseif ($this->session->flashdata('add_msg')){
                                    echo "<div class='alert alert-success'>". $this->session->flashdata('add_msg') . "</div>";
                                }
                                elseif ($this->session->flashdata('officer_upd_msg')){
                                    echo "<div class='alert alert-success'>". $this->session->flashdata('officer_upd_msg') . "</div>";
                                }
                                elseif ($this->session->flashdata('officer_err_msg')){
                                    echo "<div class='alert alert-danger'>". $this->session->flashdata('officer_err_msg') . "</div>";
                                }
                                if($officersData){
                                    foreach($officersData as $item){
                                ?>
                            <tr>
                                <td class=""><?=$item->officer_id?></td>
                                <td class=""><?=$item->officer_name?></td>
                                <td class=""><span><?=$item->officer_email?></span></td>
                                <td class=""><span><?=$item->officer_phone?></span></td>
                                
                                <!-- action -->
                                <td class="tp-cart-action">
                                    <a class="tp-cart-action-btn" href="dashboardController/removeOfficer/<?=$item->officer_id?>">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z" fill="currentColor"/>
                                        </svg>
                                        <span>Remove</span>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                                else {?>
                            <tr style="height:150px;">
                                <td colspan="4" class="text-center align-middle py-4 fw-semibold text-muted">
                                    No members
                                </td>
                            </tr>
                            <?php        
                                }
                            ?>
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </section>

	<section class="tp-login-area pb-10 p-relative z-index-1 fix" >
        <div class="row justify-content-center" >
                <div class="col-xl-6 col-lg-8">
                    <div class="tp-login-wrapper">

                        <?php if ($this->session->flashdata('successMsg')) { ?>
							<div class="alert alert-success">
								<?= $this->session->flashdata('successMsg'); ?>
							</div>
						<?php } ?>

						<?php if ($this->session->flashdata('failMsg')) { ?>
							<div class="alert alert-danger">
								<?= $this->session->flashdata('failMsg'); ?>
							</div>
						<?php } ?>
                        <?=form_open('dashboardController/insertOfficer')?>
                        <div class="tp-login-option">
                            <div class="tp-login-input-wrapper">
								<div class="tp-login-input-box">
                                    <div class="tp-login-input">
                                        <input id="officer_name" name="officer_name" type="text" placeholder="Enter Officer Name">
                                        <?= form_error('officer_name')?>
                                    </div>
                                </div>
                                <div class="tp-login-input-box">
                                    <div class="tp-login-input">
                                        <input id="officer_email" name="officer_email" type="email" placeholder="Enter Officer Email">
                                        <?= form_error('officer_email')?>
                                    </div>
                                </div>
								<div class="tp-login-input-box">
                                    <div class="tp-login-input">
                                        <input id="officer_phone" name="officer_phone" type="text" placeholder="Enter Officer Phone">
                                        <?= form_error('officer_phone')?>
                                    </div>
                                </div>
                                <div class="tp-login-input-box">
                                    <div class="tp-login-input">
                                        <input id="officer_password" name="officer_password" type="text" placeholder="Enter Officer password min. 6 character">
                                        <?= form_error('officer_password')?>
                                    </div>
                                </div>
                            </div>
                            <div class="tp-login-bottom">
                                <button type="submit" class="btn btn-success w-100">Add New Officer</button>
                            </div>
                            
                        </div>
                        <?=form_close()?>
                    </div>
                </div>
            </div>
    </section>
</main>
