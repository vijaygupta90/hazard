<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <?php if(isset($update_contractor)){ ?>
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">लेखा व बजट /</span> पंजीकरण
                </h4>
                <!-- Table -->
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('Account/updateContractor/contractor_registration/'.$update_contractor['id']); ?>" method="POST">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="">ठेकेदार का नाम</label>
                                        <input type="text" name="name" class="form-control hindi" value="<?= $update_contractor['name']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="">ठेकेदार के पिता का नाम</label>
                                        <input type="text" name="father_name" class="form-control hindi" value="<?= $update_contractor['father_name']; ?>" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="">जी० एस० टी० संख्या</label>
                                        <input type="text" name="gstno" class="form-control" value="<?= $update_contractor['gstno']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="">मोबाइल</label>
                                        <input type="number" name="mobile" class="form-control" value="<?= $update_contractor['mobile']; ?>" oninput="javascript: if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="">पता</label>
                                        <input type="text" name="address" class="form-control hindi" value="<?= $update_contractor['address']; ?>" required/>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">सुरक्षित करें</button>
                            <button type="submit" class="btn btn-primary" onclick="history.back()">वापस जाएँ</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">लेखा व बजट /</span> पंजीकरण
                </h4>
                <!-- Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">विवरण</h5>
                        <small class="float-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                                नया पंजीकरण
                            </button>
                        </small>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>क्र० सं०</th>
                                    <th>ठेकेदार का नाम</th>
                                    <th>ठेकेदार के पिता का नाम</th>
                                    <th>जी० एस० टी० संख्या</th>
                                    <th>मोबाइल</th>
                                    <th>पता</th>
                                    <th colspan="2">चुनें</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($contractorList as $key => $value) { ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td class="hindi"><?= $value['name']; ?></td>
                                    <td class="hindi"><?= $value['father_name']; ?></td>
                                    <td><?= $value['gstno']; ?></td>
                                    <td><?= $value['mobile']; ?></td>
                                    <td class="hindi"><?= $value['address']; ?></td>
                                    <td>
                                        <a class="btn btn-info waves-effect" href="<?= base_url('Account/expenseAnudanReport/'.$value['id']); ?>"><i class='bx bx-detail'></i> व्यय देखें</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-info waves-effect" href="<?= base_url('Account/editContractor/contractor_registration/'.$value['id']); ?>"><i class="bx bx-edit-alt me-1"></i> अपडेट करें</a>
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
                                <h5 class="modal-title" id="modalCenterTitle">पंजीकरण</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('Account/addContractor'); ?>" method="POST">
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="">ठेकेदार का नाम</label>
                                                <input type="text" name="name" class="form-control hindi" id="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="">ठेकेदार के पिता का नाम</label>
                                                <input type="text" name="father_name" class="form-control hindi" id="" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="">जी० एस० टी० संख्या</label>
                                                <input type="text" name="gstno" class="form-control" id="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="">मोबाइल</label>
                                                <input type="number" name="mobile" class="form-control" id="" oninput="javascript: if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="">पता</label>
                                                <input type="text" name="address" class="form-control hindi" id="" required/>
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