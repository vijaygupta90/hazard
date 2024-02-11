<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">सम्पत्ति कर /</span> कर की मांग
                </h4>
                <!-- Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">जल कर मांग सूची</h5>
                        <small class="float-end">
                            <a href="<?= base_url('Admin/waterTaxDemand'); ?>" class="btn btn-primary">
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
                                    <th>वार्षिक मूल्यांकन</th>
                                    <th>पिछला बकाया/ सरचार्ज</th>
                                    <th>अग्रिम / अधिभार कर</th>
                                    <th>देय जल कर बकाया/ सरचार्ज</th>
                                    <th>बिल नं0</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($demandLists as $key => $value) { ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $value['crn']; ?></td>
                                    <td class="hindi"><?= $value['demand_no']; ?></td>
                                    <td class="hindi"><?= $value['name']; ?></td>
                                    <td><?= $value['arv_water']; ?></td>
                                    <td><?= $value['opening_arrear_water']; ?></td>
                                    <td><?= $value['opening_advance_water']; ?></td>
                                    <td><?= $value['total_tax_water']; ?></td>
                                    <td>
                                        <a class="btn rounded-pill btn-outline-danger" href="<?= base_url('Admin/printWaterBill/'.$value['billno']); ?>"> <?= $value['billno']; ?></a>
                                    </td>
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