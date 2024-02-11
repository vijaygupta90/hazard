<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <?php if(isset($update_ward)){ ?>
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">मास्टर /</span> आय अनुदान
                </h4>
                <!-- Table -->
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('Admin/updateWard/house_ward/'.$update_ward['id']); ?>" method="POST">
                            <div class="mb-3">
                                <label class="form-label" for="">वार्ड का नाम</label>
                                <input type="text" name="ward_name" class="form-control hindi" value="<?= $update_ward['ward_name']; ?>" required/>
                            </div>
                            <button type="submit" class="btn btn-primary">सुरक्षित करें</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">मास्टर /</span> आय अनुदान
                </h4>
                <!-- Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">अनुदान</h5>
                        <small class="float-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                                नया अनुदान बनाएं
                            </button>
                        </small>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>क्र० सं०</th>
                                    <th>वित्तीय वर्ष</th>
                                    <th>अनुदान</th>
                                    <th>खाता संख्या</th>
                                    <th>प्रारम्भिक अवशेष</th>
                                    <th>शासनादेश सं०</th>
                                    <th>शासनादेश दिनाँक</th>
                                    <th>प्राप्ति का दिनाँक</th>
                                    <th>रकम</th>
                                    <th>अभियुक्ति</th>
                                    <!-- <th>चुनें</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($anudan as $key => $value) { ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $value['fin_year']; ?></td>
                                    <td><?= $value['anudan_name']; ?></td>
                                    <td><?= $value['anudan_acc']; ?></td>
                                    <td><?= $value['opening_balance']; ?></td>
                                    <td><?= $value['order_no']; ?></td>
                                    <td><?= $value['order_date']; ?></td>
                                    <td><?= $value['rcvng_date']; ?></td>
                                    <td><?= $value['amount']; ?></td>
                                    <td><?= $value['accusation']; ?></td>
                                    <!-- <td>
                                        <a href="<?= base_url('Admin/editWard/house_ward/'.$value['id']); ?>"><i class="bx bx-edit-alt me-1"></i> अपडेट करें</a>
                                    </td> -->
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
                                <h5 class="modal-title" id="modalCenterTitle">आय अनुदान</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('Account/addIncAnudan'); ?>" method="POST">
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="">अनुदान</label>
                                                <input type="text" name="anudan_name" class="form-control hindi" id="" required/>
                                                <?php $anudan = $this->db->select('*')->from('anudan')->order_by('id', 'DESC')->get()->row(); ?>
                                                <input type="hidden" name="anudan_no" class="form-control" value="<?php if(empty($anudan)){ echo "1"; }else{ echo $anudan->anudan_no+1; } ?>" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="">वित्तीय वर्ष</label>
                                                <select name="fin_year" class="select2 form-select" required>
                                                    <?php
                                                        $fin_year = $this->db->get_where('fin_year')->result_array();
                                                        foreach ($fin_year as $key => $value) {
                                                            ?>
                                                    <option value="<?= $value['fin_year']; ?>"><?= $value['fin_year']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="">प्रारम्भिक अवशेष</label>
                                                <input type="number" name="opening_balance" class="form-control" id="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="">खाता संख्या</label>
                                                <input type="text" name="anudan_acc" class="form-control" id="" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="">शासनादेश सं०</label>
                                                <input type="text" name="order_no" class="form-control" id="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="">प्राप्ति का दिनाँक</label>
                                                <input type="date" name="rcvng_date" class="form-control" id="" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="">रकम</label>
                                                <input type="number" name="amount" class="form-control" id="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="">अभियुक्ति</label>
                                                <input type="text" name="accusation" class="form-control" id="" required/>
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