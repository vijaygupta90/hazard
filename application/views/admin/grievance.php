<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="">
        <!-- Content wrapper -->
        <div class="">
            <!-- Content -->
            
            <div class=" container-p-y">
                
                <div class="">
                    <h4 class="fw-bold py-3 mb-4">
                        <span class="text-muted fw-light">Coustomer Details /</span>
                    </h4>
                    <!-- Table -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Coustomer Details /</h5>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th>Sr.No.</th>
                                        <th>Pick Up At</th>
                                        <th>Drop At</th>
                                        <th>Your Name</th>
                                        <th>Mobile No.</th>
                                        <th>Your Email</th>
                                        <th>Service Date</th>
                                        <th>Special Request</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($grievance as $key => $value) { ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $value['pickupat']; ?></td>
                                        <td><?= $value['dropat']; ?></td>
                                        <td><?= $value['yname']; ?></td>
                                        <td><?= $value['mobile']; ?></td>
                                        <td><?= $value['email']; ?></td>
                                        <td><?= $value['servicedate']; ?></td>
                                        <td><?= $value['request']; ?></td>
                                        <!--<td>
                                            <a title="Click to view" class="btn btn-outline-info" href="<?= base_url('assets/uploads/complaint/'.$value['image']); ?>" target="_blank"><i class='bx bx-file'></i></a>
                                        </td>-->
                                        <!--<td>
                                        <?php if($value['status'] == 0) { ?>
                                            <a class="btn btn-primary" href="<?= base_url('Admin/editGrievance/grievance/'.$value['id']); ?>">Active</a>
                                        <?php } else { ?>
                                            <a class="btn btn-success" href="javascript:void(0);">निस्तारित</a>
                                        <?php } ?>
                                        </td>-->
                                        <!--<td><?= $value['remarks']; ?></td>-->
                                        <!--<td>
                                        <?php if($value['dispose_image'] == '') { ?>
                                            N/A
                                        <?php } else { ?>
                                            <a title="Click to view" class="btn btn-outline-info" href="<?= base_url('assets/uploads/disposed/'.$value['dispose_image']); ?>" target="_blank"><i class='bx bx-file'></i></a>
                                        <?php } ?>
                                        </td>-->
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/ Table -->
                </div>
            
            </div>
            

            <!-- / Content -->
            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
                <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0"> © <script>document.write(new Date().getFullYear());</script><span> Allrights Reserved</span></div>
                </div>
            </footer> <!-- / Footer -->
             <!-- Content wrapper -->
    </div> <!-- / Layout page -->
    
    
    <script>
    </script>
    <?php $this->load->view('Admin/admin_footer'); ?>

