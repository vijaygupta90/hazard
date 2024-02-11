<?php $this->load->view('header'); ?>

     <!-- Page Header Start -->
     <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Donate Now</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Donate</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        <!-- Donate Start -->
        <div class="container">
            <div class="donate" data-parallax="scroll" data-image-src="<?= base_url(); ?>assets\img/donate.jpg">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="donate-content">
                            <div class="section-header">
                                <p>Donate Now</p>
                                <h2>Let's donate to needy people for better lives</h2>
                            </div>
                            <div class="donate-text">
                                <p>
                                Donating to help those in need is a powerful act of compassion and generosity that can make a significant impact on the lives of vulnerable individuals and communities. By contributing to various charitable causes, such as food banks, shelters, medical clinics, or educational programs, you can provide essential support to those facing adversity. Your donation can offer a lifeline to families struggling to put food on the table, warmth and shelter to the homeless, or access to healthcare and education for those less fortunate. The act of giving not only meets immediate needs but also fosters a sense of solidarity and unity among people from different walks of life. Together, through our contributions, we can create a ripple effect of positive change and make a meaningful difference in the lives of those who need it most. Whether it's a small monetary gift, clothing, or your time and skills, each contribution matters and serves as a beacon of hope for those facing challenging circumstances.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="donate-form">
                            <form>
                                <div class="control-group">
                                    <input type="text" class="form-control" placeholder="Name" required="required" />
                                </div>
                                <div class="control-group">
                                    <input type="email" class="form-control" placeholder="Email" required="required" />
                                </div>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-custom active">
                                        <input type="radio" name="options" checked> $10
                                    </label>
                                    <label class="btn btn-custom">
                                        <input type="radio" name="options"> $20
                                    </label>
                                    <label class="btn btn-custom">
                                        <input type="radio" name="options"> $30
                                    </label>
                                </div>
                                <div>
                                    <a class="btn btn-custom" href="<?= base_url('web/payment'); ?>">Donate Now</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Donate End -->

        <?php $this->load->view('footer'); ?>