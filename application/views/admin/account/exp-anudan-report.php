<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">लेखा व बजट /</span> अनुदान विवरण
                </h4>
                <!-- Table -->

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">अनुदान विवरण सूची</h5>
                        <small class="float-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal">
                                अनुदान का विवरण भरें
                            </button>
                        </small>
                        <small class="float-end">
                            <a href="<?= base_url('Account/newRegistration'); ?>" class="btn btn-primary">
                                वापस जाएं
                            </a>
                        </small>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>क्र० सं०</th>
                                    <th>नाम</th>
                                    <th>अवधि</th>
                                    <th>माह</th>
                                    <th>प्राप्ति का दिनांक</th>
                                    <th>व्यय अनुदान</th>
                                    <th>अनुदान खाता संख्या</th>
                                    <th>वाउचर क्रमांक</th>
                                    <th>माध्यम</th>
                                    <th>रकम</th>
                                    <!-- <th>चुनें</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                foreach ($expenseAnudanReport as $key => $value) { ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td class="hindi"><?= $value['contractor_name']; ?></td>
                                    <td><?= $value['fin_year']; ?></td>
                                    <?php $mon = $this->db->select('*')->from('month')->where('id', $value['month'])->get()->row(); ?>
                                    <td><?= $mon->month; ?></td>
                                    <td><?= $value['date_of_receipt']; ?></td>
                                    <?php $anudan_name = $this->db->get_where('exp_anudan', ['anudan_no'=>$value['anudan_no']])->row(); ?>
                                    <td><?= $anudan_name->anudan_name; ?></td>
                                    <td><?= $value['anudan_acc_no']; ?></td>
                                    <td><?= $value['voucher_no']; ?></td>
                                    <td><?= $value['medium']; ?></td>
                                    <td><?= $value['amount']; ?></td>
                                    <!-- <td>
                                        <a title="Click to edit" class="btn btn-info waves-effect" href="<?= base_url('Account/editExpenseAnudanReport/expense_anudan_report/'.$value['id']); ?>"><i class="fa fa-edit fa-2x"></i></a>
                                    </td> -->
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/ Table -->
                <!-- Modal -->
                <div class="modal fade" id="fullscreenModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalFullTitle">व्यय अनुदान बनाएं</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('Account/addExpenseAnudanReport'); ?>" method="POST">
                                    <div class="row clearfix">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">नाम</label>
                                                <input type="text" name="contractor_name" class="form-control hindi" value="<?= $contract_detail->name; ?>" readonly/>
                                                <input type="hidden" name="contract_id" value="<?= $contract_detail->id; ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="">वित्तीय वर्ष</label>
                                                <select name="fin_year" class="form-control" required>
                                                    <?php
                                                        $year = $this->db->get_where('fin_year')->result_array();
                                                        foreach ($year as $key => $value) {
                                                    ?>
                                                    <option value="<?= $value['fin_year']; ?>"><?= $value['fin_year']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="">माह</label>
                                                <select name="month" class="form-control" required>
                                                    <?php
                                                        $month = $this->db->get_where('month')->result_array();
                                                        foreach ($month as $key => $value) {
                                                    ?>
                                                    <option value="<?= $value['id']; ?>"><?= $value['month']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="">व्यय अनुदान</label>
                                                <select name="anudan_no" onchange="getExpAnudanDetail(this.value);" class="form-control hindi" id="acc_no" required>
                                                    <option value="">pquko djsa</option>
                                                    <?php
                                                        $anudan = $this->db->get_where('exp_anudan')->result_array();
                                                        foreach ($anudan as $key => $value) {
                                                    ?>
                                                    <option value="<?= $value['anudan_no']; ?>"><?= $value['anudan_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">अनुदान खाता संख्या</label>
                                                <input type="number" name="anudan_acc_no" id="anudan_acc_no" class="form-control" value="" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="">व्यय का दिनांक</label>
                                                <input type="date" name="date_of_receipt" class="form-control" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="">वाउचर क्रमांक</label>
                                                <input type="number" name="voucher_no" class="form-control hindi" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="">रकम</label>
                                                <input type="number" name="amount" class="form-control hindi" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="">माध्यम</label>
                                                <select name="medium" id="medium" onchange="changeInput();" class="form-control">
                                                    <option value="">Select </option>
                                                    <option value="Cash">Cash </option>
                                                    <option value="Check">Check </option>
                                                    <option value="PFMS">PFMS </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2" id="check_no">
                                            <div class="mb-3">
                                                <label class="form-label" for="">चेक नंबर</label>
                                                <input type="text" name="check_no" class="form-control hindi" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-2" id="pfms_no">
                                            <div class="mb-3">
                                                <label class="form-label" for="">पी० एफ० एम० एस० नं०</label>
                                                <input type="text" name="pfms_no" class="form-control hindi" value="" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="">लेबर सेस</label>
                                                <input type="number" name="labour_cess" class="form-control hindi" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="">इनकम टैक्स</label>
                                                <input type="number" name="income_tax" class="form-control hindi" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="">जी० एस० टी०</label>
                                                <input type="number" name="gst_amount" class="form-control" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="">रॉयल्टी</label>
                                                <input type="number" name="royalty" class="form-control" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="">भुगतान धनराशि</label>
                                                <input type="number" name="paid_amount" class="form-control" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="">अभियुक्ति</label>
                                                <input type="text" name="accusation" class="form-control hindi" value="" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">सुरक्षित करें</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
        function changeInput()
        {
            var medium = document.getElementById('medium');
            if(medium.value == "Cash")
            {
                document.getElementById('check_no').style.visibility="hidden";
                document.getElementById('pfms_no').style.visibility="hidden";
            }
            else if(medium.value == "Check")
            {
                document.getElementById('check_no').style.visibility="visible";
                document.getElementById('pfms_no').style.visibility="hidden";
            }
            else if(medium.value == "PFMS")
            {
                document.getElementById('check_no').style.visibility="hidden";
                document.getElementById('pfms_no').style.visibility="visible";
            }
        }

        // Anudan Account 
        $('#acc_no').on('change',function(){
            var id = $('#acc_no').val();
            $.ajax({
                type: "get",
                dataType: "json",
                url: "<?= base_url('Account/getExpAnudanDetail'); ?>",
                data: {
                    'id':id
                },
                success: function(response) {
                    console.log(response)
                $('#anudan_acc_no').val(response);
                
            }
            });
        });
        // Calculation
        $('#labour_charge, #income_tax, #gst_amount, #royalty, #paid_amount').keyup(function(){
            var labour_charge = parseFloat($('#labour_charge').val()) || 0;
            var income_tax = parseFloat($('#income_tax').val()) || 0;
            var gst_amount = parseFloat($('#gst_amount').val()) || 0;
            var royalty = parseFloat($('#royalty').val()) || 0;
            $('#amount').val(labour_charge + income_tax + gst_amount + royalty);
            var amount = parseFloat($('#amount').val()) || 0;
            var paid_amount = parseFloat($('#paid_amount').val()) || 0;
            
            $('#remaining_amount').val(amount - paid_amount);
            // if(amount <= paid_amount){
            //     $('#advance').val(paid_amount - amount);
            //     $('#arrear').val(0);
            // } else {
            //     $('#arrear').val(amount - paid_amount);
            //     $('#advance').val(0);
            // }
        });
    </script>
<?php $this->load->view('admin/footer'); ?>