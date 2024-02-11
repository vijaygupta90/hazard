<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">दाखिल खारिज /</span> आवेदक विवरण
                </h4>
                <!-- Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">विवरण देखें</h5>
                        <small class="float-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal">
                                नया विवरण जोड़ें
                            </button>
                        </small>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('Mutation/assesseeListWardWise'); ?>" method="POST">
                            <div class="row clearfix">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="">वार्ड</label>
                                        <select name="ward_no" class="select2 form-select hindi" required>
                                            <?php
                                                $query = $this->db->get_where('mutation_ward')->result_array();
                                                foreach ($query as $key => $value) {
                                            ?>
                                            <option value="<?= $value['ward_no']; ?>"><?= $value['ward_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 text-center">
                                    <button type="submit" class="btn btn-primary">प्रस्तुत करें</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/ Table -->
                <!-- Modal -->
                <div class="modal fade" id="fullscreenModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalFullTitle">पंजीकरण करें</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('Mutation/addAssessee'); ?>" method="POST">
                                    <div class="row clearfix">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">वित्तीय वर्ष चुनें</label>
                                                <select name="fin_year" class="select2 form-select" required>
                                                    <?php
                                                        $query = $this->db->get_where('fin_year')->result_array();
                                                        foreach ($query as $key => $value) {
                                                    ?>
                                                    <option value="<?= $value['fin_year']; ?>"><?= $value['fin_year']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">वार्ड चुनें</label>
                                                <select name="ward_no" class="select2 form-select hindi" required>
                                                    <?php
                                                        $query = $this->db->get_where('mutation_ward')->result_array();
                                                        foreach ($query as $key => $value) {
                                                    ?>
                                                    <option value="<?= $value['ward_no']; ?>"><?= $value['ward_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">पंजीकरण संख्या</label>
                                                <?php $crn = $this->db->select('*')->from('mutation_registrations')->order_by('id', 'DESC')->get()->row(); ?>
                                                <input type="text" name="crn" class="form-control" value="<?php if(empty($crn)){ echo "1"; }else{ echo $crn->crn+1; } ?>" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">कार्यालय रजिस्टर में पंजीकृत नंबर</label>
                                                <input type="text" name="demand_no" class="form-control" value="" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="">मोहल्ले का नाम</label>
                                                <input type="text" name="mohalla_name" class="form-control hindi" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="">उपभोक्ता का नाम</label>
                                                <input type="text" name="name" class="form-control hindi" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="">उपभोक्ता के पिता/पति का नाम</label>
                                                <input type="text" name="father_name" class="form-control hindi" value="" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">आवासीय/ व्यावसायिक</label>
                                                <input type="text" name="property_type" class="form-control hindi" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">पक्का/ कच्चा</label>
                                                <input type="text" name="raw_sure" class="form-control hindi" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">कमरो की सं0</label>
                                                <input type="number" name="room_details" class="form-control" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">क्षेत्रफल</label>
                                                <input type="number" name="area" class="form-control" step=".01" value="" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">पूर्व</label>
                                                <input type="text" name="east" class="form-control hindi" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">पश्चिम</label>
                                                <input type="text" name="west" class="form-control hindi" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">उत्तर</label>
                                                <input type="text" name="north" class="form-control hindi" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">दक्षिण</label>
                                                <input type="text" name="south" class="form-control hindi" value="" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">पुराना मूल्यांकन</label>
                                                <input type="number" name="old_evaluation" class="form-control" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">प्रस्तावित मूल्यांकन</label>
                                                <input type="number" name="evaluation" class="form-control" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">अन्य</label>
                                                <input type="text" name="other_detail" class="form-control hindi" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">रिमार्क</label>
                                                <input type="text" name="remark" class="form-control hindi" value="" required/>
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
<?php $this->load->view('admin/footer'); ?>