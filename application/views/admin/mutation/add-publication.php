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
                        <h5 class="mb-0">दाखिल खारिज / नामान्तरण प्रकाशन विवरण सूची</h5>
                        <small class="float-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal">
                                प्रकाशन का विवरण भरें
                            </button>
                        </small>
                        <small class="float-end">
                            <a href="<?= base_url('Mutation/assesseePublicationWardWise'); ?>" class="btn btn-primary">
                                वापस जाएं
                            </a>
                        </small>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>क्र० सं०</th>
                                    <th>दाखिल खारिज संख्या</th>
                                    <th>समाचार प्रकाशन की तिथि</th>
                                    <th>प्रकाशन का प्रकार</th>
                                    <th>आपत्ति प्राप्त करने की अंतिम की तिथि</th>
                                    <th>प्रकाशन का विवरण</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                foreach ($assesseeLists as $key => $value) { ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $value['crn']; ?></td>
                                    <td><?= $value['pub_date']; ?></td>
                                    <td class="hindi-lg"><?= $value['pub_type']; ?></td>
                                    <td><?= $value['objection_date']; ?></td>
                                    <td class="hindi-lg"><?= $value['pub_detail']; ?></td>
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
                                <h5 class="modal-title" id="modalFullTitle">दाखिल खारिज / नामान्तरण प्रकाशन विवरण भरें</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('Mutation/addPublication'); ?>" method="POST">
                                    <div class="row clearfix">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">दाखिल खारिज / नामान्तरण पंजीकरण संख्या</label>
                                                <input type="text" name="crn" class="form-control" value="<?= $crn; ?>" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">समाचार प्रकाशन की तिथि</label>
                                                <input type="date" name="pub_date" class="form-control" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">प्रकाशन का प्रकार</label>
                                                <input type="text" name="pub_type" class="form-control hindi" value="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">आपत्ति प्राप्त करने की अंतिम की तिथि</label>
                                                <input type="date" name="objection_date" class="form-control" value="" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="">प्रकाशन का विवरण</label>
                                                <input type="text" name="pub_detail" class="form-control hindi" value="" required/>
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