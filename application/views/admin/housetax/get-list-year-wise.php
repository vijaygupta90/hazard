<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">सम्पत्ति कर /</span> अवधि अनुसार रिपोर्ट
                </h4>
                <!-- Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">अवधि अनुसार रिपोर्ट</h5>
                        <small class="float-end">
                            <a href="<?= base_url('Admin/HouseTaxReport'); ?>" class="btn btn-primary">
                                वापस जाएं
                            </a>
                        </small>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>क्र० सं०</th>
                                    <th>पंजी0 सं0</th>
                                    <th>डिमाण्ड नं0</th>
                                    <th>नाम</th>
                                    <th>पिता का नाम</th>
                                    <th>वर्तमान वर्ष बिल राशि</th>
                                    <th>पिछला बकाया</th>
                                    <th>योग</th>
                                    <th>कुल जमा</th>
                                    <th>शेष</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($yearWiseList as $key => $value) { ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $value['crn']; ?></td>
                                    <td class="hindi"><?= $value['demand_no']; ?></td>
                                    <td class="hindi"><?= $value['name']; ?></td>
                                    <td class="hindi"><?= $value['father_name']; ?></td>
                                    <td><?= $value['arv']; ?></td>
                                    <td><?= $value['opening_arrear']; ?></td>
                                    <td><?= $value['total_tax']; ?></td>
                                    <td><?= $value['paid_amount']; ?></td>
                                    <td><?= $value['curr_arrear']; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/ Table -->
            </div>
            <!-- / Content -->
            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
                <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0"> © <script>document.write(new Date().getFullYear());</script></div>
                </div>
            </footer> <!-- / Footer -->
            <div class="content-backdrop fade"></div>
        </div> <!-- Content wrapper -->
    </div> <!-- / Layout page -->
<?php $this->load->view('admin/footer'); ?>