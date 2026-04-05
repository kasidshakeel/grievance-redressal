<?php
    $this->load->view('portal/headerView');
?>
<main class="flex-grow-1">
    <div class="container my-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold">Welcome to our Grievance Redressal Portal</h1>
            <p class="lead text-muted">
                Providing transparent and efficient public services for citizens.
            </p>
        </div>
        <div class="row mt-4">
            <div class="col-md-6 mb-3">
                <div class="card h-80 shadow-sm">
                    <div class="card-body text-center shadow">
                        <h5 class="card-title">Register Complaints</h5>
                        <p class="card-text">
                            Submit your complaints here.
                        </p>
                        <a href="homeController/complaints" class="btn btn-primary">Register Complaints</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card h-80 shadow-sm">
                    <div class="card-body text-center shadow">
                        <h5 class="card-title">Complaints Status</h5>
                        <p class="card-text">
                            Track your complaints status by complaints id.
                        </p>
                        <a href="homeController/getStatus" class="btn btn-primary">Track Complaints</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
    $this->load->view('portal/footerView');
?>

