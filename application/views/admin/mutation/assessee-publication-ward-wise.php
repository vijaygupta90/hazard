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
                <?php if(isset($update_detail)){ ?>
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('Mutation/updateAssesseeDetail/mutation_registrations/'.$update_detail['id']); ?>" method="POST">
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
                                                $query = $this->db->get_where('mutation_ward')->result_array();
                                                foreach ($query as $key => $value) {
                                            ?>
                                            <option <?php if($row->ward_no == $value['ward_no']){ echo "selected"; } ?> value="<?= $value['ward_no']; ?>"><?= $value['ward_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">पंजीकरण संख्या</label>
                                        <input type="text" name="crn" class="form-control" value="<?= $update_detail['crn']; ?>" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">कार्यालय रजिस्टर में पंजीकृत नंबर</label>
                                        <input type="text" name="demand_no" class="form-control" value="<?= $update_detail['demand_no']; ?>" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">मोहल्ले का नाम</label>
                                        <input type="text" name="mohalla_name" class="form-control hindi" value="<?= $update_detail['mohalla_name']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">उपभोक्ता का नाम</label>
                                        <input type="text" name="name" class="form-control hindi" value="<?= $update_detail['name']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="">उपभोक्ता के पिता/पति का नाम</label>
                                        <input type="text" name="father_name" class="form-control hindi" value="<?= $update_detail['father_name']; ?>" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">आवासीय/ व्यावसायिक</label>
                                        <input type="text" name="property_type" class="form-control" value="<?= $update_detail['property_type']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">पक्का/ कच्चा</label>
                                        <input type="text" name="raw_sure" class="form-control" value="<?= $update_detail['raw_sure']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">कमरो की सं0</label>
                                        <input type="number" name="room_details" class="form-control" value="<?= $update_detail['room_details']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">क्षेत्रफल</label>
                                        <input type="number" name="area" class="form-control" step=".01" value="<?= $update_detail['area']; ?>" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">पूर्व</label>
                                        <input type="text" name="east" class="form-control" value="<?= $update_detail['east']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">पश्चिम</label>
                                        <input type="text" name="west" class="form-control" value="<?= $update_detail['west']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">उत्तर</label>
                                        <input type="text" name="north" class="form-control" value="<?= $update_detail['north']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">दक्षिण</label>
                                        <input type="text" name="south" class="form-control" value="<?= $update_detail['south']; ?>" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">पुराना मूल्यांकन</label>
                                        <input type="number" name="old_evaluation" class="form-control" value="<?= $update_detail['old_evaluation']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">प्रस्तावित मूल्यांकन</label>
                                        <input type="number" name="evaluation" class="form-control" value="<?= $update_detail['evaluation']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">अन्य</label>
                                        <input type="text" name="other_detail" class="form-control" value="<?= $update_detail['other_detail']; ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">रिमार्क</label>
                                        <input type="text" name="remark" class="form-control" value="<?= $update_detail['remark']; ?>" required/>
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
                            <a href="<?= base_url('Mutation/assesseeDetailpublication'); ?>" class="btn btn-primary">
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
                                    <th>वार्ड</th>
                                    <th>भवन स्वामी का नाम</th>
                                    <th>भवन स्वामी के पिता/पति का नाम</th>
                                    <th>पक्का/ कच्चा</th>
                                    <th>कमरो की सं0</th>
                                    <th>चौहदी</th>
                                    <th>क्षेत्रफल</th>
                                    <th>पुराना मूल्यांकन</th>
                                    <th>प्रस्तावित मूल्यांकन</th>
                                    <th>अन्य</th>
                                    <th>चुनें</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($assesseeLists as $key => $value) { ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $value['crn']; ?></td>
                                    <?php $ward = $this->db->select('*')->from('mutation_ward')->where('ward_no', $value['ward_no'])->get()->row(); ?>
                                    <td class="hindi-lg"><?= $ward->ward_name; ?></td>
                                    <td class="hindi-lg"><?= $value['name']; ?></td>
                                    <td class="hindi-lg"><?= $value['father_name']; ?></td>
                                    <td class="hindi-lg"><?= $value['raw_sure']; ?></td>
                                    <td><?= $value['room_details']; ?></td>
                                    <td class="hindi-lg"><?= $value['east'].$value['west'].$value['north'].$value['south']; ?></td>
                                    <td><?= $value['area']; ?></td>
                                    <td><?= $value['old_evaluation']; ?></td>
                                    <td><?= $value['evaluation']; ?></td>
                                    <td class="hindi-lg"><?= $value['other_detail']; ?></td>
                                    <td>
                                        <a href="<?= base_url('Mutation/publication/'.$value['crn']); ?>"><i class="bx bx-edit-alt me-1"></i> प्रकाशन का विवरण भरें</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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