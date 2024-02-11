<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">सम्पत्ति कर /</span> रिपोर्ट निकालें
                </h4>
                <h4 class="text-muted">जल कर रिपोर्ट</h4>
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-defaulter" aria-controls="navs-pills-justified-defaulter" aria-selected="true">
                                बड़े बकायेदार
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-year" aria-controls="navs-pills-justified-year" aria-selected="false">
                                अवधि अनुसार
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-ward" aria-controls="navs-pills-justified-ward" aria-selected="false">
                                वार्ड अनुसार
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-date" aria-controls="navs-pills-justified-date" aria-selected="false">
                                तिथि अनुसार
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-pills-justified-defaulter" role="tabpanel">
                            <form action="<?= base_url('Admin/getDefaulterListWater'); ?>" method="POST">
                                <div class="row clearfix">
                                    <div class="col-md-2"></div>
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
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label class="form-label" for="">न्यूनतम बकाया राशि</label>
                                            <input type="number" name="range" class="form-control" value="" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="">वार्ड</label>
                                            <select name="ward_no" class="select2 form-select hindi" required>
                                                <?php
                                                    $query = $this->db->get_where('house_ward')->result_array();
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
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-justified-year" role="tabpanel">
                            <form action="<?= base_url('Admin/getListYearWiseWater'); ?>" method="POST">
                                <div class="row clearfix">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
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
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6 text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-justified-ward" role="tabpanel">
                            <form action="<?= base_url('Admin/getListWardWiseWater'); ?>" method="POST">
                                <div class="row clearfix">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="">वार्ड</label>
                                            <select name="ward_no" class="select2 form-select hindi" required>
                                                <?php
                                                    $query = $this->db->get_where('house_ward')->result_array();
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
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-justified-date" role="tabpanel">
                            <form action="<?= base_url('Admin/getListDateWiseWater'); ?>" method="POST">
                                <div class="row clearfix">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="">प्रारम्भिक तिथि</label>
                                            <input type="date" name="from_date" class="form-control" value="" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="">अन्तिम तिथि</label>
                                            <input type="date" name="to_date" class="form-control" value="" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6 text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
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