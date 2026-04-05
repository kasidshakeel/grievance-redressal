<?php
    $this->load->view('portal/headerView');
    $value = '';
?>

<style>
.containers {
    width: 500px;
    margin: 50px auto;
}

.progress-row {
    display: flex;
    align-items: center;
}

.step {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.circlee {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    text-align: center;
    line-height: 35px;
    color: white;
    font-weight: bold;
}

.label-text {
    margin-top: 8px;
    font-size: 12px;
    text-align: center;
    width: 80px;
}

.linee {
    flex: 1;
    height: 4px;
    background: lightgray;
    margin: 0 10px;
}

.blue { background: blue; }
.green { background: green; }
.gray { background: lightgray; }
</style>

<main>

    <section class="fix pt-3" >
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">

                <?php 
                if ($this->session->flashdata('failedMsg')) {
                ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('failedMsg'); ?>
                    </div>
                <?php
                }
                ?>
                
                <?= form_open('homeController/getStatus') ?>
                <div class="shadow-sm p-4">
                    
                    <div class="row justify-content-center">
                        
                        <div class="col-md-6">
                            <input id="complain_id" name="complain_id" type="text" 
                                class="form-control" placeholder="Enter your Complain ID Number">
                            <?= form_error('complain_id') ?>
                        </div>

                    </div>

                    <div class="row justify-content-center mt-3">
                        <div class="col-md-6 text-center">
                            <button type="submit" class="btn btn-success px-4">
                                Check Complaint Status
                            </button>
                        </div>
                    </div>

                </div>

                <?= form_close() ?>
            </div>
        </div>
    </section>

    <?php
     if (!empty($status)) {
        $value = $status->complain_status;
    }
    function getColor($step, $value) {
        if ($value == 3) {
            return "green";
        } elseif ($value >= $step) {
            return "blue";
        } else {
            return "gray";
        }
    }

    ?>
             <div class="containers">

                <div class="progress-row">

                    <div class="step">
                        <div class="circlee <?= getColor(1, $value) ?>">1</div>
                        <div class="label-text">Complaint Registered</div>
                    </div>

                    <div class="linee"></div>

                    <div class="step">
                        <div class="circlee <?= getColor(2, $value) ?>">2</div>
                        <div class="label-text">Officer Assigned</div>
                    </div>

                    <div class="linee"></div>

                    <div class="step">
                        <div class="circlee <?= getColor(3, $value) ?>">3</div>
                        <div class="label-text">Resolved</div>
                    </div>

                </div>

            </div>
       <?php 
    ?>
</main>

<?php
    $this->load->view('portal/footerView');
?>