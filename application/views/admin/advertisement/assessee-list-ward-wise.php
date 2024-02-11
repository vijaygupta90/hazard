<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">विज्ञापन कर /</span> उपभोक्ता विवरण
                </h4>
                <!-- Table -->
                <?php if(isset($updateAssesseeDetail)){ ?>
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('Advertisement/updateAssesseeDetail/advertisement_registrations/'.$updateAssesseeDetail['id']); ?>" method="POST">
                            <div class="row clearfix">
                                <div class="col-md-2">
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
                                                $query = $this->db->get_where('advertisement_ward')->result_array();
                                                foreach ($query as $key => $value) {
                                            ?>
                                            <option <?php if($row->ward_no == $value['ward_no']){ echo "selected"; } ?> value="<?= $value['ward_no']; ?>"><?= $value['ward_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">विज्ञापन का प्रकार चुनें</label>
                                        <select name="type_id" class="select2 form-select hindi" required>
                                            <?php
                                                $query = $this->db->get_where('advertisement_type')->result_array();
                                                foreach ($query as $key => $value) {
                                            ?>
                                            <option <?php if($row->type_id == $value['type_id']){ echo "selected"; } ?> value="<?= $value['type_id']; ?>"><?= $value['advertisement_type']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="">मांग / शुल्क</label>
                                        <input type="number" name="rate" id="rate" class="form-control" value="<?= $updateAssesseeDetail['rate']; ?>" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="">डिलीवरी की तारीख</label>
                                        <input type="date" name="reg_date" id="" class="form-control" value="<?= $updateAssesseeDetail['reg_date']; ?>" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">उपभोक्ता पंजीकरण संख्या</label>
                                        <input type="text" name="crn" class="form-control" value="<?= $updateAssesseeDetail['crn']; ?>" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">नाम</label>
                                        <input type="text" name="name" class="form-control hindi" value="<?= $updateAssesseeDetail['name']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">पिता/पति का नाम</label>
                                        <input type="text" name="father_name" class="form-control hindi" value="<?= $updateAssesseeDetail['father_name']; ?>" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="">पता</label>
                                        <input type="text" name="address" class="form-control hindi" value="<?= $updateAssesseeDetail['address']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="">मोबाइल नं0</label>
                                        <input type="number" name="mobile" class="form-control" value="<?= $updateAssesseeDetail['mobile']; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" required/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="">आधार नं0</label>
                                        <input type="number" name="aadhaar" class="form-control" value="<?= $updateAssesseeDetail['aadhaar']; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="12" required/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="">ईमेल आईडी</label>
                                        <input type="email" name="email" class="form-control" value="<?= $updateAssesseeDetail['email']; ?>" required/>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <?php } else { ?>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">उपभोक्ता विवरण</h5>
                        <small class="float-end">
                            <a href="<?= base_url('Advertisement/assesseeDetail'); ?>" class="btn btn-primary">
                                वापस जाएं
                            </a>
                        </small>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>क्र० सं०</th>
                                    <th>वित्तीय वर्ष</th>
                                    <th>वार्ड का नाम</th>
                                    <th>उपभोक्ता पंजीकरण संख्या</th>
                                    <th>नाम</th>
                                    <th>पिता/पति का नाम</th>
                                    <th>पता</th>
                                    <th>विज्ञापन का प्रकार</th>
                                    <th>मांग / शुल्क</th>
                                    <th>डिलीवरी की तारीख</th>
                                    <th>चुनें</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($assesseeLists as $key => $value) { ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $value['fin_year']; ?></td>
                                    <td class="hindi"><?= $value['ward_name']; ?></td>
                                    <td><?= $value['crn']; ?></td>
                                    <td class="hindi"><?= $value['name']; ?></td>
                                    <td class="hindi"><?= $value['father_name']; ?></td>
                                    <td class="hindi"><?= $value['address']; ?></td>
                                    <td class="hindi"><?= $value['advertisement_type']; ?></td>
                                    <td><?= $value['rate']; ?></td>
                                    <td><?= $value['reg_date']; ?></td>
                                    <td>
                                        <a href="<?= base_url('Advertisement/editAssesseeDetail/advertisement_registrations/'.$value['id']); ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
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