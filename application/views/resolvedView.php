<?php
    $this->load->view('headerView');
?>
<main>
    <section class="tp-login-area pb-10 p-relative z-index-1 fix border-top" >
        <div class="row justify-content-center" >
            <div class="col-xl-12 col-lg-12">
                
                <div class="tp-login-wrapper">
                    <div class="text-center mb-4">
                        <h4 class="fw-bold">RESOLVED COMPLAINTS</h4>
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
                                $hasResolved = false;

                                if (!empty($resolvedData)) {
                                    foreach ($resolvedData as $item) {
                                        if ($item->complain_status == 2) {
                                            $hasResolved = true;
                            ?>
                                            <tr>
                                                <td><?= $item->complain_id ?></td>
                                                <td><?= $item->officer_id ?></td>
                                                <td><?= $item->officer_name ?></td>
                                                <td>Complaint Solved</td>
                                            </tr>
                            <?php
                                        }
                                    }
                                }

                                if (!$hasResolved) {
                            ?>
                                    <tr style="height:150px;">
                                        <td colspan="4" class="text-center align-middle py-4 fw-semibold text-muted">
                                            No resolved complaints
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