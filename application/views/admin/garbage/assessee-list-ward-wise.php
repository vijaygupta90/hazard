<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">ठोस अपशिष्ट कर /</span> उपभोक्ता विवरण
                </h4>
                <!-- Table -->
                <?php if(isset($update_detail)){ ?>
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('Garbage/updateAssesseeDetail/garbage_registrations/'.$update_detail['id']); ?>" method="POST">
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">वित्तीय वर्ष चुनें</label>
                                        <select name="fin_year" class="select2 form-select" required>
                                            <?php
                                                $query = $this->db->get_where('fin_year')->result_array();
                                                foreach ($query as $key => $value) {
                                            ?>
                                            <option <?php if($row->fin_year == $value['fin_year']){ echo "selected"; } ?> value="<?= $value['fin_year']; ?>"><?= $value['fin_year']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">वार्ड चुनें</label>
                                        <select name="ward_no" class="select2 form-select hindi" required>
                                            <?php
                                                $query = $this->db->get_where('garbage_ward')->result_array();
                                                foreach ($query as $key => $value) {
                                            ?>
                                            <option <?php if($row->ward_no == $value['ward_no']){ echo "selected"; } ?> value="<?= $value['ward_no']; ?>"><?= $value['ward_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">उपभोक्ता पंजीकरण संख्या</label>
                                        <input type="text" name="crn" class="form-control" value="<?= $update_detail['crn']; ?>" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">भवन स्वामी का नाम</label>
                                        <input type="text" name="name" class="form-control hindi" value="<?= $update_detail['name']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">भवन स्वामी के पिता/पति का नाम</label>
                                        <input type="text" name="father_name" class="form-control hindi" value="<?= $update_detail['father_name']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="">भवन स्वामी का पता</label>
                                        <input type="text" name="address" class="form-control hindi" value="<?= $update_detail['address']; ?>" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">वार्षिक मूल्यांकन (रू0) भवन कर (वर्तमान)</label>
                                        <input type="text" name="rent" class="form-control" value="<?= $update_detail['rent']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">भवन कर पिछला बकाया/ सरचार्ज</label>
                                        <input type="text" name="opening_arrear" class="form-control" value="<?= $update_detail['opening_arrear']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">भवन कर अग्रिम / अधिभार कर</label>
                                        <input type="text" name="opening_advance" class="form-control" value="<?= $update_detail['opening_advance']; ?>" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">मोबाइल नं0</label>
                                        <input type="number" name="mobile" class="form-control" value="<?= $update_detail['mobile']; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">आधार नं0</label>
                                        <input type="number" name="aadhaar" class="form-control" value="<?= $update_detail['aadhaar']; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="12" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">ईमेल आईडी</label>
                                        <input type="email" name="email" class="form-control" value="<?= $update_detail['email']; ?>" />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">सुरक्षित करें</button>
                        </form>
                    </div>
                </div>
                <?php } else { ?>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">उपभोक्ता विवरण</h5>
                        <small class="float-end">
                            <a href="<?= base_url('Garbage/assesseeDetailGarbage'); ?>" class="btn btn-primary">
                                वापस जाएं
                            </a>
                        </small>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>क्र० सं०</th>
                                    <th>वार्ड का नाम</th>
                                    <th>उपभोक्ता पंजीकरण संख्या</th>
                                    <th>भवन स्वामी का नाम</th>
                                    <th>भवन स्वामी के पिता/पति का नाम</th>
                                    <th>भवन स्वामी का पता</th>
                                    <th>वार्षिक मूल्यांकन</th>
                                    <th>पिछला बकाया/ सरचार्ज</th>
                                    <th>चुनें</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($assesseeLists as $key => $value) { ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td class="hindi"><?= $value['ward_name']; ?></td>
                                    <td><?= $value['crn']; ?></td>
                                    <td class="hindi"><?= $value['name']; ?></td>
                                    <td class="hindi"><?= $value['father_name']; ?></td>
                                    <td class="hindi"><?= $value['address']; ?></td>
                                    <td><?= $value['rent']; ?></td>
                                    <td><?= $value['opening_arrear']; ?></td>
                                    <td>
                                        <a href="<?= base_url('Garbage/editAssesseeDetail/garbage_registrations/'.$value['id']); ?>"><i class="bx bx-edit-alt me-1"></i> अपडेट करें</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/ Table -->
                <?php } ?>
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