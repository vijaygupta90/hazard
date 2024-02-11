<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <?php if(isset($update_advertisement_type)){ ?>
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">मास्टर /</span> विज्ञापन का प्रकार
                </h4>
                <!-- Table -->
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('Advertisement/updateAdvertisementType/advertisement_type/'.$update_advertisement_type['id']); ?>" method="POST">
                            <div class="mb-3">
                                <label class="form-label" for="">विज्ञापन का प्रकार</label>
                                <input type="text" name="advertisement_type" class="form-control hindi" value="<?= $update_advertisement_type['advertisement_type']; ?>" required/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">कर राशि</label>
                                <input type="number" name="rate" class="form-control" id="" value="<?= $update_advertisement_type['rate']; ?>" required/>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">मास्टर /</span> विज्ञापन का प्रकार
                </h4>
                <!-- Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">विज्ञापन का प्रकार</h5>
                        <small class="float-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                                नया विज्ञापन का प्रकार जोड़ें
                            </button>
                        </small>
                    </div>
                    <div class="text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-nowrap">
                                    <th>क्र० सं०</th>
                                    <th>विज्ञापन का नाम</th>
                                    <th>कर राशि</th>
                                    <th>चुनें</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($advertisementType as $key => $value) { ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td class="hindi"><?= $value['advertisement_type']; ?></td>
                                    <td><?= $value['rate']; ?></td>
                                    <td>
                                        <a href="<?= base_url('Advertisement/editAdvertisementType/advertisement_type/'.$value['id']); ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
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
                                <h5 class="modal-title" id="modalCenterTitle">विज्ञापन का प्रकार</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('Advertisement/addAdvertisementType'); ?>" method="POST">
                                    <div class="mb-3">
                                        <label class="form-label" for="">विज्ञापन का प्रकार</label>
                                        <input type="text" name="advertisement_type" class="form-control hindi" id="" required/>
                                        <?php $type = $this->db->select('*')->from('advertisement_type')->order_by('type_id', 'DESC')->get()->row(); ?>
                                        <input type="hidden" name="type_id" class="form-control" value="<?php if(empty($type)){ echo "1"; }else{ echo $type->type_id+1; } ?>" required/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="">कर राशि</label>
                                        <input type="number" name="rate" class="form-control" id="" required/>
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