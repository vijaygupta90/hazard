<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">सम्पत्ति कर /</span> कर रसीद प्राप्त करें
                </h4>
                <!-- Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">भवन कर जमा सूची</h5>
                        <small class="float-end">
                            <a href="<?= base_url('Admin/payHouseTax'); ?>" class="btn btn-primary">
                                वापस जाएं
                            </a>
                        </small>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>क्र० सं०</th>
                                    <th>वार्ड</th>
                                    <th>पंजी0 सं0</th>
                                    <th>डिमाण्ड नं0</th>
                                    <th>नाम</th>
                                    <th>देय भवन कर</th>
                                    <th>कुल जमा</th>
                                    <th>वर्तमान बकाया</th>
                                    <th>चुनें</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($paidList as $key => $value) { ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td class="hindi"><?= $value['ward_name']; ?></td>
                                    <td><?= $value['crn']; ?></td>
                                    <td class="hindi"><?= $value['demand_no']; ?></td>
                                    <td class="hindi"><?= $value['name']; ?></td>
                                    <td><?= $value['total_tax']; ?></td>
                                    <td><?= $value['paid_amount']; ?></td>
                                    <td><?= $value['curr_arrear']; ?></td>
                                    <td>
                                        <a class="btn rounded-pill btn-outline-danger" href="<?= base_url('Admin/printReceipt/'.$value['billno']); ?>"> रसीद</a>
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
    <script>
        // Payment calculation
        $('#total_tax, #paid_amount').keyup(function(){
            var total_tax = parseFloat($('#total_tax').val()) || 0;
            var paid_amount = parseFloat($('#paid_amount').val()) || 0;
            if(total_tax <= paid_amount){
                $('#advance').val(paid_amount - total_tax);
                $('#arrear').val(0);
            } else {
                $('#arrear').val(total_tax - paid_amount);
                $('#advance').val(0);
            }
        });
    </script>
<?php $this->load->view('admin/footer'); ?>