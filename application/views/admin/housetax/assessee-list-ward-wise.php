<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">सम्पत्ति कर /</span> उपभोक्ता विवरण
                </h4>
                <!-- Table -->
                <?php if(isset($update_detail)){ ?>
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('Admin/updateAssesseeDetail/registrations/'.$update_detail['id']); ?>" method="POST">
                            <div class="row clearfix">
                                <div class="col-md-3">
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
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">वार्ड चुनें</label>
                                        <select name="ward_no" class="select2 form-select hindi" required>
                                            <?php
                                                $query = $this->db->get_where('house_ward')->result_array();
                                                foreach ($query as $key => $value) {
                                            ?>
                                            <option <?php if($row->ward_no == $value['ward_no']){ echo "selected"; } ?> value="<?= $value['ward_no']; ?>"><?= $value['ward_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">भवन का प्रकार चुनें</label>
                                        <select name="house_type_id" class="select2 form-select hindi" required>
                                            <?php
                                                $query = $this->db->get_where('house_type')->result_array();
                                                foreach ($query as $key => $value) {
                                            ?>
                                            <option <?php if($row->house_type_id == $value['house_type_id']){ echo "selected"; } ?> value="<?= $value['house_type_id']; ?>"><?= $value['house_type']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">भवन विवरण का चयन करें</label>
                                        <select name="house_detail_id" class="select2 form-select hindi" required>
                                            <option value="1">पक्का</option>
                                            <option value="2">कच्चा</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">उपभोक्ता पंजीकरण संख्या</label>
                                        <input type="text" name="crn" class="form-control" value="<?= $update_detail['crn']; ?>" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">डिमाण्ड नं0</label>
                                        <input type="text" name="demand_no" class="form-control" value="<?= $update_detail['demand_no']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">भवन संख्या</label>
                                        <input type="text" name="house_number" class="form-control" value="<?= $update_detail['house_number']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">पंजीकरण तिथि</label>
                                        <input type="text" name="regdate" class="form-control" value="<?= $update_detail['regdate']; ?>" readonly/>
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
                                        <label class="form-label" for="">पिता/पति का नाम</label>
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
                                        <input type="text" name="arv" class="form-control" value="<?= $update_detail['arv']; ?>" required/>
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
                                        <label class="form-label" for="">वार्षिक मूल्यांकन (रू0) जल कर (वर्तमान)</label>
                                        <input type="text" name="arv_water" class="form-control" value="<?= $update_detail['arv_water']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">जल कर पिछला बकाया/ सरचार्ज</label>
                                        <input type="text" name="opening_arrear_water" class="form-control" value="<?= $update_detail['opening_arrear_water']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">जल कर अग्रिम / अधिभार कर</label>
                                        <input type="text" name="opening_advance_water" class="form-control" value="<?= $update_detail['opening_advance_water']; ?>" required/>
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
                            <button type="button" onclick="history.back();" class="btn btn-primary">वापस जाएँ</button>
                        </form>
                    </div>
                </div>
                <?php } else { ?>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">उपभोक्ता विवरण</h5>
                        <small class="float-end">
                            <a href="<?= base_url('Admin/assesseeDetail'); ?>" class="btn btn-primary">
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
                                    <th>डिमाण्ड नं0</th>
                                    <th>भवन स्वामी का नाम</th>
                                    <th>भवन स्वामी के पिता/पति का नाम</th>
                                    <th>भवन स्वामी का पता</th>
                                    <th>वार्षिक मूल्यांकन (रू0) भवन कर</th>
                                    <th>बकाया/ सरचार्ज भवन कर</th>
                                    <th>वार्षिक मूल्यांकन (रू0) जल कर</th>
                                    <th>बकाया/ सरचार्ज जल कर</th>
                                    <th>चुनें</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($assesseeLists as $key => $value) { ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td class="hindi"><?= $value['ward_name']; ?></td>
                                    <td><?= $value['crn']; ?></td>
                                    <td><?= $value['demand_no']; ?></td>
                                    <td class="hindi"><?= $value['name']; ?></td>
                                    <td class="hindi"><?= $value['father_name']; ?></td>
                                    <td class="hindi"><?= $value['address']; ?></td>
                                    <td><?= $value['arv']; ?></td>
                                    <td><?= $value['opening_arrear']; ?></td>
                                    <td><?= $value['arv_water']; ?></td>
                                    <td><?= $value['opening_arrear_water']; ?></td>
                                    <td>
                                        <a href="<?= base_url('Admin/editAssesseeDetail/registrations/'.$value['id']); ?>"><i class="bx bx-edit-alt me-1"></i> अपडेट करें</a>
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