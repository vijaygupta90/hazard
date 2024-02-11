<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <?php if(isset($update_license)){ ?>
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">लाइसेंस /</span> लाइसेंस पंजीकरण
                </h4>
                <!-- Table -->
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('License/updateLicense/license_registration/'.$update_license['id']); ?>" method="POST">
                            <div class="mb-3">
                                <label class="form-label" for="">व्यवसाय का नाम</label>
                                <input type="text" name="occupation" class="form-control hindi" value="<?= $update_license['occupation']; ?>" required/>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">लाइसेंस /</span> लाइसेंस पंजीकरण
                </h4>
                <!-- Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">लाइसेंस विवरण</h5>
                        <small class="float-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal">
                                लाइसेंस जोड़ें
                            </button>
                        </small>
                    </div>
                    <div class="text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>क्र० सं०</th>
                                    <th>लाइसेंस न0</th>
                                    <th>लाईसेंसधारी का नाम</th>
                                    <th>पिता का नाम</th>
                                    <th>व्यवसाय</th>
                                    <th>लाईसेंसजारी कर्ता का नाम</th>
                                    <th>चुनें</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($registration as $key => $value) { ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td class="hindi"><?= $value['licenseNo']; ?></td>
                                    <td class="hindi"><?= $value['name']; ?></td>
                                    <td class="hindi"><?= $value['fatherName']; ?></td>
                                    <td class="hindi"><?= $value['occupation']; ?></td>
                                    <td class="hindi"><?= $value['issuerName']; ?></td>
                                    <td>
                                        <a href="<?= base_url('License/editLicense/license_registration/'.$value['id']); ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    </td>
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
                                <h5 class="modal-title" id="modalFullTitle">लाइसेंस जोड़ें</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('License/addLicense'); ?>" method="POST">
                                    <div class="row clearfix">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="">पुस्तिका सँ0</label>
                                                <input type="text" name="bookNo" class="form-control hindi" id="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="">लाइसेंस न0</label>
                                                <input type="text" name="licenseNo" class="form-control hindi" id="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="">लाईसेंसधारी का नाम</label>
                                                <input type="text" name="name" class="form-control hindi" id="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="">पिता का नाम</label>
                                                <input type="text" name="fatherName" class="form-control hindi" id="" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="">लिंग</label>
                                                <select name="gender" class="select2 form-select" required>
                                                    <option value="">चुनें</option>
                                                    <option value="पुरुष">पुरुष</option>
                                                    <option value="महिला">महिला</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="">जाति</label>
                                                <select name="caste" class="select2 form-select" required>
                                                    <option value="">चुनें</option>
                                                    <option value="सामान्य">सामान्य</option>
                                                    <option value="अ० प० व०">अ० प० व०</option>
                                                    <option value="अ० जा०">अ० जा०</option>
                                                    <option value="अ० जा० जा०">अ० जा० जा०</option>
                                                    <option value="अन्य">अन्य</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="">वैवाहिक स्थति</label>
                                                <select name="mrtStatus" class="select2 form-select" required>
                                                    <option value="">चुनें</option>
                                                    <option value="विवाहित">विवाहित</option>
                                                    <option value="अविवाहित">अविवाहित</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="">पता</label>
                                                <input type="text" name="address" class="form-control hindi" id="" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">व्यवसाय</label>
                                                <input type="text" name="occupation" class="form-control hindi" id="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">लाइसेंस का प्रयोजन</label>
                                                <input type="text" name="licenseReason" class="form-control hindi" id="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">स्थान</label>
                                                <input type="text" name="place" class="form-control hindi" id="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">जारी करने की तिथि</label>
                                                <input type="date" name="issueDate" class="form-control" id="" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">लाइसेंस की अवधि</label>
                                                <input type="number" name="validThrough" class="form-control" id="" placeholder="in years" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">पंजीकरण शुल्क</label>
                                                <input type="text" name="regCharge" class="form-control" id="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">लाईसेंसजारी कर्ता का नाम</label>
                                                <input type="text" name="issuerName" class="form-control hindi" id="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">लाइसेंस समाप्त होने की तिथि</label>
                                                <input type="date" name="validTill" class="form-control" id="" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="">जनपद</label>
                                                <input type="text" name="distt" class="form-control hindi" id="" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="mb-3">
                                                <label class="form-label" for="">टिप्पणी</label>
                                                <input type="text" name="remark" class="form-control hindi" id="" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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