<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <?php if(isset($update_year)){ ?>
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">मास्टर /</span> वित्तीय वर्ष
                </h4>
                <!-- Table -->
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('Admin/updateFinancialYear/fin_year/'.$update_year['id']); ?>" method="POST">
                            <div class="mb-3">
                                <label class="form-label" for="">वित्तीय वर्ष</label>
                                <input type="text" name="fin_year" class="form-control" value="<?= $update_year['fin_year']; ?>" placeholder="YYYY-YY" required/>
                            </div>
                            <button type="submit" class="btn btn-primary">सुरक्षित करें</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">मास्टर /</span> वित्तीय वर्ष
                </h4>
                <!-- Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">वित्तीय वर्ष</h5>
                        <small class="float-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                                नया वर्ष जोड़ें
                            </button>
                        </small>
                    </div>
                    <div class="text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>क्र० सं०</th>
                                    <th>वित्तीय वर्ष</th>
                                    <th>चुनें</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($financialYear as $key => $value) { ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $value['fin_year']; ?></td>
                                    <td>
                                        <a href="<?= base_url('Admin/editFinancialYear/fin_year/'.$value['id']); ?>"><i class="bx bx-edit-alt me-1"></i> अपडेट करें</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/ Table -->
                <!-- Modal -->
                <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">वित्तीय वर्ष जोड़ें</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('Admin/addFinancialYear'); ?>" method="POST">
                                    <div class="mb-3">
                                        <label class="form-label" for="">वित्तीय वर्ष</label>
                                        <input type="text" name="fin_year" class="form-control" id="" placeholder="YYYY-YY" required/>
                                    </div>
                                    <button type="submit" class="btn btn-primary">सुरक्षित करें</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
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