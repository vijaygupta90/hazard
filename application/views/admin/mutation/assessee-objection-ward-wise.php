<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">दाखिल खारिज /</span> आपत्ति विवरण
                </h4>
                <!-- Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">उपभोक्ता विवरण</h5>
                        <small class="float-end">
                            <a href="<?= base_url('Mutation/assesseeDetailObjection'); ?>" class="btn btn-primary">
                                वापस जाएं
                            </a>
                        </small>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>क्र0 सं0</th>
                                    <th>दाखिल खारिज संख्या</th>
                                    <!-- <th>कार्यालय रजिस्टर में पंजीकृत नंबर</th> -->
                                    <th>वार्ड</th>
                                    <th>आवेदक का नाम</th>
                                    <th>आवेदक के पिता/पति का नाम</th>
                                    <!-- <th>आवासीय/ व्यावसायिक</th> -->
                                    <th>पक्का/ कच्चा</th>
                                    <th>कमरो की सं0</th>
                                    <th>चौहदी</th>
                                    <th>समाचार प्रकाशन की तिथि</th>
                                    <th>प्रकाशन का प्रकार</th>
                                    <th>आपत्ति प्राप्त करने की अंतिम की तिथि</th>
                                    <th>प्रकाशन का विवरण</th>
                                    <th>
                                        दाखिल खारिज आपत्ति विवरण भरें
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($assesseeLists as $key => $value) { ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $value['crn']; ?></td>
                                    <!-- <td><?= $value['demand_no']; ?></td> -->
                                    <?php $ward = $this->db->select('*')->from('mutation_ward')->where('ward_no', $value['ward_no'])->get()->row(); ?>
                                    <td class="hindi-lg"><?= $ward->ward_name; ?></td>
                                    <td class="hindi-lg"><?= $value['name']; ?></td>
                                    <td class="hindi-lg"><?= $value['father_name']; ?></td>
                                    <!-- <td class="hindi-lg"><?= $value['property_type']; ?></td> -->
                                    <td class="hindi-lg"><?= $value['raw_sure']; ?></td>
                                    <td><?= $value['room_details']; ?></td>
                                    <td class="hindi-lg"><?= $value['east'].$value['west'].$value['north'].$value['south']; ?></td>
                                    <td><?= $value['pub_date']; ?></td>
                                    <td class="hindi-lg"><?= $value['pub_type']; ?></td>
                                    <td><?= $value['objection_date']; ?></td>
                                    <td class="hindi-lg"><?= $value['pub_detail']; ?></td>
                                    <td>
                                        <a href="<?= base_url('Mutation/objection/'.$value['crn'].'/'.$value['id']); ?>"><i class="bx bx-edit-alt me-1"></i> आपत्ति विवरण भरें</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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