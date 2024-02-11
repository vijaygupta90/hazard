<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">सम्पत्ति कर /</span> कर गणना
                </h4>
                <!-- Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">कर गणना विवरण</h5>
                        <small class="float-end">
                            <a href="<?= base_url('Admin/calculateHouseTax'); ?>" class="btn btn-primary">
                                वापस जाएं
                            </a>
                        </small>
                    </div>
                    <form action="<?= base_url('Admin/saveDemandTax'); ?>" method="POST">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th>क्र० सं०</th>
                                        <th>वित्तीय वर्ष</th>
                                        <th>वार्ड का नाम</th>
                                        <th>उपभोक्ता पंजीकरण संख्या</th>
                                        <th>भवन स्वामी का नाम</th>
                                        <th>वार्षिक मूल्यांकन भवन कर</th>
                                        <th>भवन कर पिछला बकाया/सरचार्ज</th>
                                        <th>भवन कर अग्रिम/अधिभार कर</th>
                                        <th>देय भवन कर बकाया/सरचार्ज</th>
                                        <th>वार्षिक मूल्यांकन जल कर</th>
                                        <th>जल कर पिछला बकाया/सरचार्ज</th>
                                        <th>जल कर अग्रिम/अधिभार कर</th>
                                        <th>देय जल कर बकाया/सरचार्ज</th>
                                        <th>बिल नं0</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $from_date  = $this->input->post('from_date');
                                        $to_date    = $this->input->post('to_date');
                                        $finYear    = $this->input->post('fin_year');
                                        
                                        $billno     = $this->db->select('billno')->from('housetax_demand')->order_by('billno', 'desc')->get()->row();
                                        if(empty($billno)){ $num = 0; }else{$num=$billno->billno;}
                                        $i=0; foreach ($assesseeLists as $key => $value) {
                                            $nill_arv = $this->db->get_where('registrations', ['crn'=>$value['crn']], ['fin_year' => $finYear])->result();
                                            $tax    = $nill_arv[0]->arv + $nill_arv[0]->opening_arrear - $nill_arv[0]->opening_advance;
                                            if(empty($tax == 0)){
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $i = $i+1; ?></th>
                                        <td><?= $value['fin_year']; ?><input type="hidden" name="fin_year[]" value="<?php echo $value['fin_year']; ?>"/></td>
                                        <td class="hindi"><?= $value['ward_name']; ?><input type="hidden" name="ward_no[]" value="<?php echo $value['ward_no']; ?>"/></td>
                                        <td><?= $value['crn']; ?><input type="hidden" name="crn[]" value="<?php echo $value['crn']; ?>"/></td>
                                        <td class="hindi"><?= $value['name']; ?><input type="hidden" name="name[]" value="<?php echo $value['name']; ?>"/></td>
                                        <td><?= $value['arv']; ?><input type="hidden" name="arv[]" value="<?php echo $value['arv']; ?>"/></td>
                                        <td><?= $value['opening_arrear']; ?><input type="hidden" name="opening_arrear[]" value="<?php echo $value['opening_arrear']; ?>"/></td>
                                        <td><?= $value['opening_advance']; ?><input type="hidden" name="opening_advance[]" value="<?php echo $value['opening_advance']; ?>"/></td>
                                        <td><?php $total_tax = $value['arv'] + $value['opening_arrear'] - $value['opening_advance']; echo $total_tax; ?><input type="hidden" name="total_tax[]" value="<?php echo round($total_tax); ?>"/></td>
                                        <td><?= $value['arv_water']; ?><input type="hidden" name="arv_water[]" value="<?php echo $value['arv_water']; ?>"/></td>
                                        <td><?= $value['opening_arrear_water']; ?><input type="hidden" name="opening_arrear_water[]" value="<?php echo $value['opening_arrear_water']; ?>"/></td>
                                        <td><?= $value['opening_advance_water']; ?><input type="hidden" name="opening_advance_water[]" value="<?php echo $value['opening_advance_water']; ?>"/></td>
                                        <td><?php $total_tax_water = $value['arv_water'] + $value['opening_arrear_water'] - $value['opening_advance_water']; echo $total_tax_water; ?><input type="hidden" name="total_tax_water[]" value="<?php echo round($total_tax_water); ?>"/></td>
                                        <td>
                                            <input type="text" name="billno[]" value="<?= $num+$i; ?>" readonly/>
                                            <input type="hidden" name="from_date[]" value="<?php echo $from_date; ?>"/>
                                            <input type="hidden" name="to_date[]" value="<?php echo $to_date; ?>"/>
                                        </td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </form>
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