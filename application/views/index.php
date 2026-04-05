<?php
    $this->load->view('headerView');
?>
    <main>
        <div class="page-content">
            <div class="container">

                <div class="row mt-4">

                    <div class="col-md-6">
                        <div class="card text-center shadow">
                            <div class="card-body">
                                <h5 class="card-title">Complaints</h5>
                                <p class="card-text">View all registered complaints.</p>
                                <a href="dashboardController/complaints" class="btn btn-primary">
                                View Complaints
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card text-center shadow">
                            <div class="card-body">
                                <h5 class="card-title">Resolved Complaints</h5>
                                <p class="card-text">View all resolved complaints.</p>
                                <a href="dashboardController/resolved" class="btn btn-success">
                                View Resolved
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    if ($this->session->userdata('officer_id') == 5771) {
                    ?>
                    <div class="col-md-6">
                        <div class="card text-center shadow">
                            <div class="card-body">
                                <h5 class="card-title">New Officer</h5>
                                <p class="card-text">View all & Add New Officers.</p>
                                <a href="dashboardController/officers" class="btn btn-warning">
                                Add Officer
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
<?php
    $this->load->view('footerView');
?>