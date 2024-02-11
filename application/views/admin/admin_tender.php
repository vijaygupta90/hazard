<?php $this->load->view('admin/sidebar'); ?>

    <!-- Layout container -->
    <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
            
<div class="">
                <h4 class="fw-bold  mb-5">
                    <span class="text-muted fw-light">TENDER/</span>
                </h4>
            
                <!--form  -->
                <div class="card py-2 p-5" style="background-color: rgb(244, 238, 238);">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1 class="shadow p-3 text-center" style="font-weight:700; color:black;">TENDER</h1>
                        
                    </div>
                    <div class="table-responsive text-nowrap">
                    <form class="form-group" action="<?= base_url('admin/saveTender'); ?>" method="POST">
                       <div class="row clearfy">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="row clearfy mb-3">
                                <div class="col-lg-6">
                                    <label for="uname" class="text-center" style="color:black; font-weight:600;"> <p>TENDER DATE</p></label>
                                    <input type="text" class="form-control" placeholder="" name="tDate" required>
                                </div>
                                <div class="col-lg-6">
                                    <label for="" class="text-center pl-5" style="color:black; font-weight:600;"><p>TENDER NO.</p></label>
                                    <input type="text " class="form-control" placeholder="" name="tNumber" required>
                                </div>
                            </div>
                            <div class="row clearfy">
                                <div class="col-lg-6">
                                    <label for="" class="text-center p-" style="color:black; font-weight:600;"><p>SUBJECT</p></label>
                                    <input type="text " class="form-control" placeholder="" name="tSubject" required>
                                </div>
                                <div class="col-lg-6">
                                    <label for="" class="text-center pl-5" style="color:black; font-weight:600;"><p>UPLOAD</p></label>
                                    <input type="file" class="form-control" id="myFile" name="tFile">
                                </div>
                            </div>
                            <div class="row clearfy mt-4">
                                <div class="text-center">
                                    <button class="btn btn-info" type="submit">Submit</button>
                                </div>
                            </div>   
                        </div>
                       </div>                        
                    
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
                <!--/ form -->
            </div>
            <!-- / Content -->
            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
                <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0"> © <script>document.write(new Date().getFullYear());</script><span> नगर पंचायत सुरियावाँ</span></div>
                </div>
            </footer> <!-- / Footer -->
             <!-- Content wrapper -->
    </div> <!-- / Layout page -->
    
    <script>
    </script>
    <?php $this->load->view('admin/admin_footer'); ?>
