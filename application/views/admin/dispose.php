<?php $this->load->view('admin/sidebar'); ?>
    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-2">
</div>
<div class="col-md-10">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">Coustomer Details /</span>
                </h4>
                <!-- Table -->

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Coustomer Details /</h5>
                    </div>
                    <div class="card-body text-nowrap">
                        <form action="<?= base_url().'Admin/updateGrievance/grievance/'.$update_grievance['id']; ?>" method="post" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">नाम</label>
                                        <input type="text" name="name" class="form-control" value="<?= $update_grievance['name']; ?>" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="">टिप्पणी</label>
                                        <input type="text" name="remarks" id="" class="form-control" value="" required/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="">अपलोड फाइल</label>
                                        <input type="file" name="dispose_image" class="form-control" value="" required/>
                                        <input type="hidden" name="status" class="form-control" value="1" />
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
            <!-- / Content -->
            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
                <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0"> © <script>document.write(new Date().getFullYear());</script><span>Savaari.com</span></div>
                </div>
            </footer> <!-- / Footer -->
            <div class="content-backdrop fade"></div>
        </div> <!-- Content wrapper -->
    </div> <!-- / Layout page -->
    
    <script>
    </script>
<?php $this->load->view('admin/admin_footer'); ?>