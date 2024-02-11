
<?php $this->load->view('admin/sidebar'); ?>


    
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
    
<div class="">
        <h4 class="fw-bold  mb-5">
            <span class="text-muted fw-light">BUDGET</span>
        </h4>
        <!-- Table -->

        <div class="card py-2 p-3" style="background-color: rgb(244, 238, 238);">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1 class=" p-3 text-center" style="font-weight:700; color:black;">BUDGET</h1>

            </div>

            <div class="table-responsive text-nowrap">
                <form class="p-1" action="<?= base_url('admin/saveBudget'); ?>" method="POST">
                    
                <div class="row clearfy">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="row clearfy mb-3">
                                <!--<div class="col-lg-6">
                                    <label for="bnumber" class="text-center" style="color:black; font-weight:600;"> <p>BUDGET NO</p></label>
                                    <input type="text" class="form-control" placeholder="" name="bnumber" required>
                                </div>
                                <div class="col-lg-6">
                                    <label for="bname" class="text-center pl-5" style="color:black; font-weight:600;"><p>BUDGET NAME</p></label>
                                    <input type="text " class="form-control" placeholder="" name="bname" required>
                                </div>-->
                            </div>
                            <div class="row clearfy">
                                <div class="col-lg-6">
                                    <label for="bsubject" class="text-center p-" style="color:black; font-weight:600;"><p>SUBJECT</p></label>
                                    <input type="text " class="form-control" placeholder="" name="bsubject" required>
                                </div>
                                <div class="col-lg-6">
                                    <label for="bfile" class="text-center pl-5" style="color:black; font-weight:600;"><p>UPLOAD</p></label>
                                    <input type="file" class="form-control" id="myFile" name="bfile">
                                </div>
                            </div>
                            <div class="row clearfy ">
                                <div class="text-center my-3">
                                    <button class="btn btn-info " type="submit">Submit</button>
                                </div>
                            </div>   
                        </div>
                       </div>                        
                    
                </form>
            </div>
        </div>
        <!--/ Table -->
    </div>
</div>
</div>



            
            <!-- / Content -->
            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
                <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0"> © <script>document.write(new Date().getFullYear());</script><span> नगर पंचायत सुरियावाँ</span></div>
                </div>
            </footer> <!-- / Footer -->
        
    
    <script>
    </script>
<?php $this->load->view('Admin/admin_footer'); ?>
