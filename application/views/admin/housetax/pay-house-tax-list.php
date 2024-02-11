<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">सम्पत्ति कर /</span> कर जमा करें
                </h4>
                <!-- Table -->
                <?php if(isset($row)){ ?>
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('Admin/savePayment/'.$row->billno); ?>" method="POST">
                            <div class="row clearfix" style="display: none;">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">वित्तीय वर्ष चुनें</label>
                                        <select name="fin_year" class="select2 form-select" required>
                                            <?php
                                                $query = $this->db->get_where('fin_year')->result_array();
                                                foreach ($query as $key => $value) {
                                            ?>
                                            <option <?php if($row->fin_year == $value['fin_year']){ echo "selected"; } ?> value="<?= $value['fin_year']; ?>"><?= $value['fin_year']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">वार्ड चुनें</label>
                                        <select name="ward_no" class="select2 form-select hindi" required>
                                            <?php
                                                $query = $this->db->get_where('house_ward')->result_array();
                                                foreach ($query as $key => $value) {
                                            ?>
                                            <option <?php if($row->ward_no == $value['ward_no']){ echo "selected"; } ?> value="<?= $value['ward_no']; ?>"><?= $value['ward_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">उपभोक्ता पंजीकरण संख्या</label>
                                        <input type="text" name="crn" class="form-control" value="<?= $row->crn; ?>" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">भवन स्वामी का नाम</label>
                                        <input type="text" name="name" class="form-control hindi" value="<?= $row->name; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">भवन स्वामी के पिता/पति का नाम</label>
                                        <input type="text" name="father_name" class="form-control hindi" value="<?= $row->father_name; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">भवन स्वामी का पता</label>
                                        <input type="text" name="address" class="form-control hindi" value="<?= $row->address; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="">डिमाण्ड नं0</label>
                                        <input type="text" name="demand_no" class="form-control" value="<?= $row->demand_no; ?>" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">भवन कर (वर्तमान)</label>
                                        <input type="number" name="arv" class="form-control" value="<?= $row->arv; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">बकाया/ सरचार्ज</label>
                                        <input type="number" name="" class="form-control" value="<?= $row->opening_arrear; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">अग्रिम / अधिभार कर</label>
                                        <input type="number" name="" class="form-control" value="<?= $row->opening_advance; ?>" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">कुल देय भवन कर</label>
                                        <input type="number" name="total_tax" id="total_tax" class="form-control" value="<?= $row->curr_arrear; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">कुल जमा</label>
                                        <input type="number" name="paid_amount" id="paid_amount" class="form-control" value="" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">वर्तमान बकाया</label>
                                        <input type="number" name="opening_arrear" id="arrear" class="form-control" value="" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">वर्तमान अग्रिम</label>
                                        <input type="number" name="opening_advance" id="advance" class="form-control" value="" readonly/>
                                        <input type="hidden" name="payment_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
                                        <input type="hidden" name="payment_id" class="form-control" value="<?php $payment_id=rand(1000000, 9999999); echo "HOUSETAX-".$payment_id; ?>" />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?= base_url('Admin/payHouseTaxList'); ?>" class="btn btn-secondary">Go Back</a>
                        </form>
                    </div>
                </div>
                <?php } else { ?>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">भवन कर बकाया सूची</h5>
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
                                    <th>पंजी0 सं0</th>
                                    <th>डिमाण्ड नं0</th>
                                    <th>नाम</th>
                                    <th>वार्षिक मूल्यांकन</th>
                                    <th>पिछला बकाया</th>
                                    <th>अग्रिम कर</th>
                                    <th>देय भवन कर</th>
                                    <th>चुनें</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($demandLists as $key => $value) { ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $value['crn']; ?></td>
                                    <td class="hindi"><?= $value['demand_no']; ?></td>
                                    <td class="hindi"><?= $value['name']; ?></td>
                                    <td><?= $value['arv']; ?></td>
                                    <td><?= $value['opening_arrear']; ?></td>
                                    <td><?= $value['opening_advance']; ?></td>
                                    <td><?= $value['total_tax']; ?></td>
                                    <td>
                                        <a class="btn rounded-pill btn-outline-danger" href="<?= base_url('Admin/payTax/'.$value['billno']); ?>"> जमा करें</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php } ?>
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