<?php
    $this->load->view('headerView');
?>
<main>
    <section class="tp-login-area pb-10 p-relative z-index-1 fix border-top" >
        <div class="row justify-content-center" >
            <div class="col-xl-12 col-lg-12">
                
                <div class="tp-login-wrapper">
                    <div class="text-center mb-4">
                        <h4 class="fw-bold">COMPLAINTS</h4>
                    </div>
					<table class="table table-responsive">
						<thead>
                            <th>Complain ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
                            <th>Title</th>
							<th>Description</th>
							<th>Address</th>
                            <th>Status</th>
                            <th>File</th>
                            <th>Action</th>
						</thead>
						<tbody>
							<?php
                                if ($this->session->flashdata('assigned_upd_msg')){
                                    echo "<div class='alert alert-success'>". $this->session->flashdata('assigned_upd_msg') . "</div>";
                                }
                                elseif ($this->session->flashdata('assigned_err_msg')){
                                    echo "<div class='alert alert-danger'>". $this->session->flashdata('assigned_err_msg') . "</div>";
                                }
                                if($complaintsData){
                                    foreach($complaintsData as $item){
                                ?>
                            <tr>
                                <td class=""><?=$item->complain_id?></td>
                                <td class=""><?=$item->complain_name?></td>
                                <td class=""><?=$item->complain_email?></td>
                                <td class=""><?=$item->complain_phone?></td>
                                <td class=""><?=$item->complain_title?></td>
                                <td class=""><?=$item->complain_descr?></td>
                                <td class=""><?=$item->complain_addr?></td>
                                <td class=""><?=$item->complain_status?></td>
                                <td class=""><a href="uploads/<?=$item->complain_file?>"><?=$item->complain_file?></a></td>
                                
                                <!-- action -->
                                <?php
                                    if ($this->session->userdata('officer_id') == 5771) {
                                       
                                        if($item->complain_status == 0){
                                ?>
                                            <td class="tp-cart-action">
                                                <?=form_open('dashboardController/assignOfficer')?>
                                                <select name="officer_id" id="officer_id">
                                                    <option selected disabled>Select Officer</option>
                                                <?php
                                                    $officers = $this->dashboardModel->getOfficers();
                                                    if($officers){
                                                        foreach($officers as $value){
                                                ?>
                                                        <option value="<?= $value->officer_id ?>"><?= $value->officer_name?></option>
                                                        
                                                <?php
                                                        }
                                                    }
                                                ?>
                                                    
                                                </select>
                                                <input type="hidden" name="complain_id" value="<?=$item->complain_id?>">
                                                <center><button type="submit">
                                                    <span>Assign</span>
                                                </button>
                                                </center>
                                                <?=form_close()?>
                                            </td>
                                <?php
                                        }
                                        else{
                                ?>
                                        <td>Under Processing</td>
                                <?php  
                                        }
                                    }
                                    else{
                                        if($item->complain_status == 1){
                                ?>
                                            <td class="tp-cart-action">
                                                <?=form_open('dashboardController/doneComplaint')?>
                                                
                                                <input type="hidden" name="complain_id" value="<?=$item->complain_id?>">
                                                <button type="submit">
                                                    <span class="btn btn-outline-warning">Done</span>
                                                </button>
                                                <?=form_close()?>
                                            </td>
                                <?php
                                        }
                                        else{
                                            echo "<td>Complaint Solved</td>";
                                        }
                                    }
                                ?>
                            </tr>
                            <?php
                                    } 
                                }
                                else {?>
                            <tr style="height:150px;">
                                <td colspan="10" class="text-center align-middle py-4 fw-semibold text-muted">
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

    <section class="tp-login-area pb-10 p-relative z-index-1 fix border-top" >
        <div class="row justify-content-center" >
            <div class="col-xl-12 col-lg-12">
                
                <div class="tp-login-wrapper">
                    <div class="text-center mb-4">
                        <h4 class="fw-bold">ASSIGNED COMPLAINTS</h4>
                    </div>
					<table class="table table-responsive">
						<thead>
                            <th>Complain ID</th>
							<th>Officer ID</th>
							<th>Officer</th>
							<th>Status</th>
						</thead>
						<tbody>
							<?php
                                if($getAssigned){
                                    foreach($getAssigned as $item){
                                ?>
                            <tr>
                                <td class=""><?=$item->complain_id?></td>
                                <td class=""><?=$item->officer_id?></td>
                                <td class=""><?=$item->officer_name?></td>
                                <?php
                                if($item->complain_status == 2){
                                    echo "<td class=''>Complaint Solved</td>";
                                }
                                else{
                                    echo "<td class=''>Under Processing</td>";
                                }
                                ?>
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
</main>
<?php
    $this->load->view('footerView');
?>