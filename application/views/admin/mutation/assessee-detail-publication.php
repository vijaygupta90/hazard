<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">दाखिल खारिज /</span> प्रकाशन विवरण
                </h4>
                <!-- Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">प्रकाशन विवरण देखें</h5>
                        <small class="float-end">
                            <a href="<?= base_url('Mutation/assesseeDetailObjection'); ?>" class="btn btn-primary">
                                आपत्ति विवरण भरें
                            </a>
                        </small>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('Mutation/assesseePublicationWardWise'); ?>" method="POST">
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