<?php $this->load->view('header'); ?>

<div class="container-xxl py-5 bg-primary hero-header mb-5">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-12 text-center">
                            <h1 class="text-white animated zoomIn">APP DEVELOPMENT</h1>
                            <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                                    <li class="breadcrumb-item text-white active" aria-current="page">APP DEVELOPMENT</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Full Screen Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content" style="background: rgba(29, 29, 39, 0.7);">
                    <div class="modal-header border-0">
                        <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center justify-content-center">
                        <div class="input-group" style="max-width: 600px;">
                            <input type="text" class="form-control bg-transparent border-light p-3" placeholder="Type search keyword">
                            <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Full Screen Search End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="section-title position-relative mb-4 pb-2">
                            <h6 class="position-relative text-primary ps-4">USER-CENTRIC APP DEVELOPMENT</h6>
                            <h2 class="mt-2">Build your app to grow your business digitally.
</h2>
                        </div>
                        <p class="mb-4">Ranging from Mobile Apps to Custom Software Solutions, our development strategy driven by design and technology accelerates business growth, providing enhanced value to stakeholders. Explore Our Services for Detailed Requirements.</p>
                        <!-- <div class="row g-3">
                            <div class="col-sm-6">
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Award Winning</h6>
                                <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Professional Staff</h6>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>24/7 Support</h6>
                                <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Fair Prices</h6>
                            </div>
                        </div> -->
                        <div class="d-flex align-items-center mt-4">
                            <a class="btn btn-primary rounded-pill px-4 me-3" href="">Get Started</a>
                            <!-- <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-primary btn-square me-3" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a> -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="<?= base_url(); ?>assets\img\undraw_progressive_app_m9ms-removebg-preview.png">
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Portfolio Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="position-relative d-inline text-primary ps-4">Our Projects</h6>
                    <h2 class="mt-2">Recently Launched Projects</h2>
                </div>
                <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="col-12 text-center">
                        <ul class="list-inline mb-5" id="portfolio-flters">
                            <li class="btn px-3 pe-4 active" data-filter="*">All</li>
                            <li class="btn px-3 pe-4" data-filter=".first">Design</li>
                            <li class="btn px-3 pe-4" data-filter=".second">Development</li>
                        </ul>
                    </div>
                </div>
                <div class="row g-4 portfolio-container">
                    <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.1s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="<?= base_url(); ?>assets/img/portfolio-1.jpg" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="<?= base_url(); ?>assets/img/portfolio-1.jpg" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                                <div class="mt-auto">
                                    <small class="text-white"><i class="fa fa-folder me-2"></i>Web Design</small>
                                    <a class="h5 d-block text-white mt-1 mb-0" href="">Mobile App E-commerce</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item second wow zoomIn" data-wow-delay="0.3s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="<?= base_url(); ?>assets/img/portfolio-2.jpg" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="<?= base_url(); ?>assets/img/portfolio-2.jpg" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                                <div class="mt-auto">
                                    <small class="text-white"><i class="fa fa-folder me-2"></i>Web Design</small>
                                    <a class="h5 d-block text-white mt-1 mb-0" href="">Mobile App E-commerce</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.6s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="<?= base_url(); ?>assets/img/portfolio-3.jpg" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="<?= base_url(); ?>assets/img/portfolio-3.jpg" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                                <div class="mt-auto">
                                    <small class="text-white"><i class="fa fa-folder me-2"></i>Web Design</small>
                                    <a class="h5 d-block text-white mt-1 mb-0" href="">Mobile App E-commerce</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item second wow zoomIn" data-wow-delay="0.1s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="<?= base_url(); ?>assets/img/portfolio-4.jpg" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="<?= base_url(); ?>assets/img/portfolio-4.jpg" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                                <div class="mt-auto">
                                    <small class="text-white"><i class="fa fa-folder me-2"></i>Web Design</small>
                                    <a class="h5 d-block text-white mt-1 mb-0" href="">Mobile App E-commerce</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.3s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="<?= base_url(); ?>assets/img/portfolio-5.jpg" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="<?= base_url(); ?>assets/img/portfolio-5.jpg" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                                <div class="mt-auto">
                                    <small class="text-white"><i class="fa fa-folder me-2"></i>Web Design</small>
                                    <a class="h5 d-block text-white mt-1 mb-0" href="">Mobile App E-commerce</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item second wow zoomIn" data-wow-delay="0.6s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="<?= base_url(); ?>assets/img/portfolio-6.jpg" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="<?= base_url(); ?>assets/img/portfolio-6.jpg" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                                <div class="mt-auto">
                                    <small class="text-white"><i class="fa fa-folder me-2"></i>Web Design</small>
                                    <a class="h5 d-block text-white mt-1 mb-0" href="">Mobile App E-commerce</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio End -->

        <!-- Service Start -->
     <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="position-relative d-inline text-primary ps-4">We are an expert team who is</h6>
                    <h2 class="mt-2">Your Trusted Web App Development Partner</h2>
                    <p>Web development solutions designed to understand your users, eliminate compatibility issues, give wider accessibility and scale your business faster.</p>
                </div>
                <div class="row g-4 my-5">
                    <div class=" col-md-6 wow zoomIn" data-wow-delay="0.1s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                
<img decoding="async" alt="" data-src="https://www.neoito.com/wp-content/uploads/2022/07/noun-design-4200607-1.svg" class=" lazyloaded" src="https://www.neoito.com/wp-content/uploads/2022/07/noun-design-4200607-1.svg"><noscript><img decoding="async" src="https://www.neoito.com/wp-content/uploads/2022/07/noun-design-4200607-1.svg" alt=""></noscript>

                            </div>
                            <h5 class="mb-3">Interactive Design</h5>
                            <p>We keep your users in mind at every stage of your web app development – from brainstorming to design. The result? You will get a highly interactive web app with a hassle-free & unique user experience.</p>
                            <!-- <a class="btn px-3 mt-auto mx-auto" href="">Read More</a> -->
                        </div>
                    </div>
                    <div class=" col-md-6 wow zoomIn" data-wow-delay="0.3s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                            <img decoding="async" alt="" data-src="https://www.neoito.com/wp-content/uploads/2022/07/noun-technology-1315829-1.svg" class=" lazyloaded" src="https://www.neoito.com/wp-content/uploads/2022/07/noun-technology-1315829-1.svg">
                            </div>
                            <h5 class="mb-3">Latest Technology</h5>
                            <p>You name the tech and we have it! Our unique team comes with tons of experience across all emerging and popular technology. We go the extra mile to empower your web app with the right and latest technology that helps you stand the test of time in every aspect.</p>
                            <!-- <a class="btn px-3 mt-auto mx-auto" href="">Read More</a> -->
                        </div>
                    </div>
                   </div>
                    <div class="row g-4">
                    <div class=" col-md-6 wow zoomIn" data-wow-delay="0.6s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                            <span>
<img decoding="async" alt="" data-src="https://www.neoito.com/wp-content/uploads/2022/07/noun-responsive-3629284-1.svg" class=" lazyloaded" src="https://www.neoito.com/wp-content/uploads/2022/07/noun-responsive-3629284-1.svg"><noscript><img decoding="async" src="https://www.neoito.com/wp-content/uploads/2022/07/noun-responsive-3629284-1.svg" alt=""></noscript>
</span>
                            </div>
                            <h5 class="mb-3">Compatible with all devices</h5>
                            <p>The web apps we create are all-device compatible. You can access them from your smartphone, computer or tablet and other portable devices seamlessly and experience superlative performance. This means your website looks good on every screen!</p>
                            <!-- <a class="btn px-3 mt-auto mx-auto" href="">Read More</a> -->
                        </div>
                    </div>
                    <div class=" col-md-6 wow zoomIn" data-wow-delay="0.1s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                            <span>
<img decoding="async" alt="" data-src="https://www.neoito.com/wp-content/uploads/2022/07/noun-customization-4416623-1.svg" class=" lazyloaded" src="https://www.neoito.com/wp-content/uploads/2022/07/noun-customization-4416623-1.svg"><noscript><img decoding="async" src="https://www.neoito.com/wp-content/uploads/2022/07/noun-customization-4416623-1.svg" alt=""></noscript>
</span>
                            </div>
                            <h5 class="mb-3">Super-customizable and easily scalable</h5>
                            <p>We build flexible web apps that let you add unique functionalities easily and accommodate more users while you’re scaling up.</p>
                            <!-- <a class="btn px-3 mt-auto mx-auto" href="">Read More</a> -->
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- Service End -->

        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="position-relative d-inline text-primary ps-4">Why Hire Vemtek for Your Web App Development</h6>
                    <h2 class="mt-2">What Solutions We Provide</h2>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <img class="service-icon" src="<?= base_url(); ?>assets\img\undraw_Code_review_re_woeb__1_-removebg-preview.png" >
                            </div>
                            <h5 class="mb-3">User-centric approach</h5>
                            <p>We keep in mind each stage of your user journey to build smart, immersive & seamless UX, giving your web app a headstart in the market.</p>
                            <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                            <img class="service-icon" src="<?= base_url(); ?>assets\img\undraw_Programming_re_kg9v-removebg-preview.png" >
                            </div>
                            <h5 class="mb-3">Seasoned developers</h5>
                            <p>Our developers have top-notch competency across different technologies to reduce turnaround time and transform your idea into a scalable web app the way you want it with zero tech hurdles.</p>
                            <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                            <img class="service-icon" src="<?= base_url(); ?>assets\img\WhatsApp_Image_2023-09-18_at_19.30.53-removebg-preview.png" >
                            </div>
                            <h5 class="mb-3">Entrepreneur-friendly</h5>
                            <p>Before we kickstart your project, we relate to you as entrepreneurs and ensure we are on the same page. This helps us understand you better and create solutions that align with your requirements.</p>
                            <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                            <img class="service-icon" src="<?= base_url(); ?>assets\img\undraw_flutter_dev_wvqj-removebg-preview.png" >
                            </div>
                            <h5 class="mb-3">Complete transparency</h5>
                            <p>Engage anytime with our developers through our open and 100% transparent communication loop that lets you keep all your worries at bay.</p>
                            <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                            <img class="service-icon" src="<?= base_url(); ?>assets\img\undraw_Mobile_application_re_13u3-removebg-preview.png" >
                            </div>
                            <h5 class="mb-3">Quality assurance</h5>
                            <p>No bugs escape the experienced eyes of our quality analysts. We employ intensive testing to ensure your web app hits the bullseye at every level.</p>
                            <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                            <img class="service-icon" src="<?= base_url(); ?>assets\img\undraw_progressive_app_m9ms-removebg-preview.png" >
                            </div>
                            <h5 class="mb-3">100% customer satisfaction</h5>
                            <p>With over 97% project success rate, we go the extra mile and do whatever it takes to deliver your project on time and leave a smile on your face.</p>
                            <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->

        




        <!-- Newsletter Start -->
        <div class="container-xxl newsletter my-5 wow fadeInUp text-center" data-wow-delay="0.1s" style="background-color: #C7DBCEA6;">
            <div class="container px-lg-5">
                <div class="row align-items-center" style="height: 250px;">
                    <div class="col-12">
                        <h3 class="text-dark">Reach more prospects with Vemtek.</h3>
                        <h1 class="text-dark">Partner with us and watch the leads flow in.</h1>
                        <div class="position-relative w-100 mt-3">
                            <!-- <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Enter Your Email" style="height: 48px;"> -->
                            <!-- <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button> -->
                            <div>
                        <a class="btn btn-primary rounded-pill px-4 me-3" href="">Speak to an Expert</a>
</div>
                        </div>
                    </div>
                        <!-- <div class="col-md-6 text-center mb-n5 d-none d-md-block">
                            <img class="img-fluid mt-5" style="height: 250px;" src="<?= base_url(); ?>assets/img/newsletter.png">
                        </div> -->
                        
                </div>
            </div>
        </div>
        <!-- Newsletter End -->


<?php $this->load->view('footer'); ?>