<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">ठोस अपशिष्ट कर /</span> कर जमा करें
                </h4>
                <!-- Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">वार्ड अनुसार ठोस अपशिष्ट कर जमा करें</h5>
                        <small class="float-end">
                            <a href="<?= base_url('Garbage/getTaxReceipt'); ?>" class="btn btn-primary">
                                रसीद निकालें
                            </a>
                        </small>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('Garbage/payGarbageList'); ?>" method="POST">
                            <div class="row clearfix">
                                <div class="col-md-2"></div>
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
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">वार्ड</label>
                                        <select name="ward_no" class="select2 form-select hindi" required>
                                            <?php
                                                $query = $this->db->get_where('garbage_ward')->result_array();
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