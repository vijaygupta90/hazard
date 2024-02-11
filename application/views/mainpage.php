<?php $this->load->view('header'); ?>
<!-- Start Schedule Area -->
	<!-- Start Appointment -->
  <div class="container-fluid appointment my- py- wow fadeIn" data-wow-delay="0.1s" style="background-color: rgb(69, 69, 223);">
        <div class="container">
            <div class="row py-4 g-5">
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                
                    <div class="position-relative rounded overflow-hidden " style="min-height: 400px;">
                        <h1 class="text-white">Get Your Insurance Now</h1>
                        <img class="position-absolute w-100" src="<?= base_url(); ?>assets\img\GettyImages-1266552048_LQ.jpg" alt="" style="object-fit: cover;">
                    </div>
                    <div class="wow fadeIn" data-wow-delay="0.3s">
                    <div><h1 class="display-6 text-white mb-2 mt-2">Free Hazard Insurance Quote.</h1></div>
                    <p class="text-white fs-5 mb-4">Hazard insurance, commonly known as homeowners insurance or property insurance, is a type of coverage that protects a property owner against damages caused by specific hazards or perils outlined in the insurance policy. It typically covers damages caused by events such as fire, lightning, windstorms, hail, vandalism, theft, and in some cases, certain water damage.</p>
                    <p class="text-white fs-5 mb-4">The purpose of hazard insurance is to financially protect the owner against losses to their property's structure and, in some cases, its contents, depending on the specific policy. Lenders often require homeowners to have hazard insurance as part of the mortgage agreement to protect their investment.</p>
                    <p class="text-white fs-5 mb-4">In the event of covered damage, the insurance company compensates the policyholder for the cost of repairing or rebuilding the damaged property, up to the limits specified in the policy. The policy usually involves a deductible that the homeowner must pay before the insurance coverage kicks in.</p>
                        <!-- <div class=" p-3">
                            <button class="btn btn-warning p-3">SIGN UP NOW</button>
                        </div> -->
                    
                </div>
                </div>
                
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-warning rounded p-5">
                    <?php
                    if($this->session->flashdata('success')){
                        echo "<div class='text-bold alert alert-success'>".$this->session->flashdata('success')."<br/></div>";
                    }elseif($this->session->flashdata('failure')){
                        echo "<div class='alert alert-danger'>".$this->session->flashdata('failure')."<br/></div>";
                    }
                ?>
                
                    <div class="forms p-1 mb-2" style="border-radius:15px;">
                <!-- <div class="arrow-form "><img class="" src="<?= base_url(); ?>assets\img\WhatsApp_Image_2023-09-28_at_18.12.40-removebg-removebg-preview.png"></div> -->
                
                <div class="text-center">
                    <h1>Get Your Free Quote</h1>
                  <!--<img class="h-50 w-50" src="<?= base_url(); ?>assets\img\undraw_Firmware_re_fgdy-removebg-preview.png" alt="">-->
                </div>
                </div>
                
                
                <form action="<?= base_url('Web/leadRegister'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="text-white">First Name</label>
                                        <input type="text" name="fname" class="form-control border-1"  style="height: 55px;" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="text-white">Last Name</label>
                                        <input type="text" name="lname" class="form-control border-1"  style="height: 55px;" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="text-white">Mobile No</label>
                                        <input type="number" name="mobile" class="form-control border-1"  style="height: 55px;" min="10" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="text-white">Zip Code</label>
                                        <input type="number" name="zcode" class="form-control border-1"  style="height: 55px;" min="5" maxlength="5"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="text-white">City</label>
                                        <input type="text" name="city" class="form-control border-1"  style="height: 55px;" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="text-white">Select State</label>
                    <select type="text" name="state" class="form-control border-1" style="height: 55px;" required>
                    <option value="Select" >Select State</option>  
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
                </select>
                  </div>
                
                                
                                
                  
                                <div class="col-12 col-md-6">
                                    <label class="text-white">Date Of Birth</label>
                  
                    <input type="date" name="txtdob" class="form-control border-1"  style="height: 55px;" required>
                  </div>
                                <div class="col-12 col-md-6">
                                    <label class="text-white">Address</label>
                                        <input type="text" name="address" class="form-control border-1"  style="height: 55px;" required>  
                                </div>
                                <div class="col-12">
                                    <label class="text-white">Email</label>
                                        <input type="email" name="email" class="form-control border-1"  style="height: 55px;" required>  
                                </div>
                                
                

                                <input id="leadid_token" name="universal_leadid" type="hidden" value=""/>
                                <div class="col-12">
                                
                                <input  name="radio_chek" type="checkbox" id="leadid_tcpa_disclosure" required/>
                                <label style="color:white;" for="leadid_tcpa_disclosure">By clicking Continue, I agree to email marketing, the Terms and Conditions (which include mandatory arbitration), Privacy Policy, and site visit recordation by TrustedForm and Jornaya. I provide my express written consent and electronic signature to receive monitored or recorded phone sales calls and text messages from SaveToday and PolicySavings, regarding products and services including Medicare Supplement, Medicare Advantage, and Prescription Drug Plans on the landline or mobile number i provided even if I am on a federal or State do not call registry. I confirm that the phone number set forth above is accurate and I am the regular user of the phone. I understand these calls may be generated using an automated dialing system and may contain pre-recorded and artificial voice messages and that consenting is not required to receive a quote or speak with an agent and that I can revoke my consent at any time by any reasonable means. To receive a quote without providing consent, please call +1 689-999-4084</label>
                                </div>

                                <!-- <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="cage" placeholder="Child Age">
                                        <label for="cage">Service Type</label>
                                    </div>
                                </div> -->
                                <!-- <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 80px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div> -->
                                <div class="col-12">
                                    <button class="btn btn-primary py-3 px-5" type="submit">Get A Quote</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                
            
                <!-- <div class="col-md-4 wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="display-6 text-white mb-5">Free Health Insurance Quote.</h1>
                    <p class="text-white mb-5">A free health insurance quote is an estimate of the cost and coverage details for a health insurance plan, provided by an insurance company or agent without any charge. It outlines the premiums you would pay, deductibles, copayments, and coverage specifics such as doctor visits, prescriptions, hospital stays, and other medical services. This information helps individuals evaluate and compare different health insurance options before making a decision that aligns with their healthcare needs and budget.</p>
                    <p class="text-white mb-5">Explore the benefits of free health insurance with our quick and easy quote process. Receive personalized coverage options tailored to your needs, ensuring financial peace of mind in uncertain times. Our comprehensive plans offer a range of services, from routine check-ups to emergency care, all at no cost to you. Get started today to safeguard your well-being without breaking the bank. Embrace a worry-free future with our commitment to your health and financial security.</p>
                    
                        <!-- <div class=" p-3">
                            <button class="btn btn-warning p-3">SIGN UP NOW</button>
                        </div> -->
                    
                </div> -->

                
        </div>
    </div>

		<!-- End Appointment -->
			
		

<!-- Start Feautes -->
<section class="Feautes section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Why Hazard insurance Plans</h2>
							<img src="<?= base_url(); ?>assets/img/section-img.png" alt="#">
							<p>"Hazard insurance is a financial shield that protects against the unpredictable, ensuring that your assets are safeguarded from the unexpected perils of life."</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-12">
						<!-- Start Single features -->
						<div class="single-features">
    <div class="signle-icon">
    <i class="icofont icofont-warning"></i> 
    </div>
    <h3>Hazard Insurance</h3>
    <p>Hazard insurance provides a financial shield against unforeseen events, ensuring your assets are protected from unexpected perils of life.</p>
</div>
<!-- End Single features -->
</div>
<div class="col-lg-4 col-12">
    <!-- Start Single features -->
    <div class="single-features">
        <div class="signle-icon">
        <i class="icofont icofont-home"></i> 
        </div>
        <h3>Property Protection</h3> 
        <p>Hazard insurance safeguards your property, providing peace of mind and financial security.</p>
    </div>
    <!-- End Single features -->
</div>
<div class="col-lg-4 col-12">
    <!-- Start Single features -->
    <div class="single-features last">
        <div class="signle-icon">
        <i class="icofont icofont-ambulance-cross"></i>
        </div>
        <h3>Earthquake Coverage</h3> 
        <p>Hazard insurance helps mitigate earthquake risks, offering a safety net against unexpected events that could impact your financial well-being.</p>
    </div>
</div>

						<!-- End Single features -->
					</div>
				</div>
			</div>
		</section>
		<!--/ End Feautes -->
		
		<!-- Start Fun-facts -->
		<div id="fun-facts" class="fun-facts section overlay">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="icofont icofont-home"></i>
							<div class="content">
								<span class="counter">96</span><span>%</span>
								<p>Claim Approval Rate</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="icofont icofont-user-alt-3"></i>
							<div class="content">
								<span class="counter">55557</span>
								<p>Policy Holders</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="icofont-simple-smile"></i>
							<div class="content">
								<span class="counter">4379</span>
								<p>Happy Clients</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="icofont icofont-table"></i>
							<div class="content">
								<span class="counter">12</span>
								<p>Years of Experience</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
				</div>
			</div>
		</div>
		<!--/ End Fun-facts -->
		
		<!-- Start Why choose -->
		<section class="why-choose section" >
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Enroll Now</h2>
							<img src="<?= base_url(); ?>assets/img/section-img.png" alt="#">
							<p>helps you find a Hazard insurance coverage option that works for you. Our licensed insurance agent can answer your questions and help you and help you find a right Hazard insurance plan that suits your needs and we are here to make sure that you’re not overpaying for it.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-12">
						<!-- Start Choose Left -->
						<div class="choose-left">
							<h3>Who We Are</h3>
							<p>All Hazard insurance plans are state and carrier based, so it's great to work with a licensed insurance agent who knows the plans in your area, which helps you possibly save money and make the suitable choices. </p>
							<p>We'll pair you with the licensed insurance agent in your area to help you find MA plans. We'll help you enroll in the suitable choices, whether or not we represent those particular companies.</p>
							<div class="row">
								<div class="col-lg-6">
									<ul class="list">
										<li><i class="fa fa-caret-right"></i>Check on Hazard insurance Plans</li>
										<li><i class="fa fa-caret-right"></i>Compare Plans Easily</li>
										<li><i class="fa fa-caret-right"></i>Get Knowledgeable Advice</li>
									</ul>
								</div>
								<div class="col-lg-6">
									<ul class="list">
										<li><i class="fa fa-caret-right"></i>Get No Obligation Quotes</li>
										<li><i class="fa fa-caret-right"></i>Choose the Right Plan</li>
										<li><i class="fa fa-caret-right"></i>Affordable Hazard insurance Quotes</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- End Choose Left -->
					</div>
					<div class="col-lg-6 col-12">
						<!-- Start Choose Rights -->
						<div class="choose-right">
							<div class="video-image">
								<!-- Video Animation -->
								<!-- <div class="promo-video">
									<div class="waves-block">
										<div class="waves wave-1"></div>
										<div class="waves wave-2"></div>
										<div class="waves wave-3"></div>
									</div>
								</div> -->
								<!--/ End Video Animation -->
								<!-- <a href="https://www.youtube.com/watch?v=RFVXy6CRVR4" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a> -->
							</div>
						</div>
						<!-- End Choose Rights -->
					</div>
				</div>
			</div>
		</section>
		<!--/ End Why choose -->
		
		<!-- Start Call to action -->
		<section class="call-action overlay" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-12">
						<div class="content">
							<h2>Get Your Free Quote! Call @ +1 689-999-4084</h2>
							<p>helps you find a Hazard insurance coverage option that works for you.</p>
							<div class="button">
								<a href="#" class="btn">Contact Now</a>
								<!-- <a href="#" class="btn second">Learn More<i class="fa fa-long-arrow-right"></i></a> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Call to action -->
		
		<!-- Start portfolio -->
		<section class="portfolio section" >
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Our Services</h2>
							<img src="<?= base_url(); ?>assets/img/section-img.png" alt="#">
							<p>helps you find a Hazard insurance coverage option that works for you.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-12">
						<div class="owl-carousel portfolio-slider">
							<div class="single-pf">
								<img src="<?= base_url(); ?>assets/img/images.jpg" alt="#">
								<!-- <a href="portfolio-details.html" class="btn">View Details</a> -->
							</div>
							<div class="single-pf">
								<img src="<?= base_url(); ?>assets/img/Hazard-Insurance-removebg-preview.png" alt="#">
								<!-- <a href="portfolio-details.html" class="btn">View Details</a> -->
							</div>
							<div class="single-pf">
								<img src="<?= base_url(); ?>assets/img/Home_Hazard_Ins_800x534.jpg" alt="#">
								<!-- <a href="portfolio-details.html" class="btn">View Details</a> -->
							</div>
							<div class="single-pf">
								<img src="<?= base_url(); ?>assets/img/hzinsurance.png" alt="#">
								<!-- <a href="portfolio-details.html" class="btn">View Details</a> -->
							</div>
							</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End portfolio -->
		
		<!-- Start service -->
		<section class="services section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>We Offer Different Services</h2>
							<img src="<?= base_url(); ?>assets/img/section-img.png" alt="#">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="icofont icofont-prescription"></i>
							<h4><a href="service-details.html">From Several Insurance Providers</a></h4>
							<p>Get Quotes and compare Hazard insurance plans from different providers in the United States!</p>	
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
            <i class="icofont icofont-warning"></i>
							<h4><a href="service-details.html">Possible Additional Benefits</a></h4>
							<p>Hazard insurance Advantage plans may include extra benefits. Get your no obligation quote and review a plan that fits YOU!</p>	
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="icofont icofont-heart-alt"></i>
							<h4><a href="service-details.html">Click “Get A Quote” and fill the Contact Form with the Required Info.</a></h4>
							<p>Get your anonymous and no interference with your Hazard insurance plans quote.</p>	
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="icofont icofont-listening"></i>
							<h4><a href="service-details.html">Fast</a></h4>
							<p>All Hazard insurance plans are state and carrier based, so it's great to work with a licensed insurance agent who knows the plans in your area, which helps you possibly save money and make the suitable choices.</p>	
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="icofont icofont-eye-alt"></i>
							<h4><a href="service-details.html">SECURE</a></h4>
							<p>We'll pair you with the licensed insurance agent in your area to help you find MA plans. We'll help you enroll in the suitable choices, whether or not we represent those particular companies. </p>	
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="icofont icofont-blood"></i>
							<h4><a href="service-details.html">EASY</a></h4>
							<p>It is easy to get the suitable quotes for no obligation to enroll with Hazard insurance.com. All you have to do is complete the form and wait for our licensed insurance agent to contact you. </p>	
						</div>
						<!-- End Single Service -->
					</div>
				</div>
			</div>
		</section>
		<!--/ End service -->
		
		<!-- Pricing Table -->
		<!-- <section class="pricing-table section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>We Provide You The Best Treatment In Resonable Price</h2>
							<img src="img/section-img.png" alt="#">
							<p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p>
						</div>
					</div>
				</div>
				<div class="row"> -->
					<!-- Single Table -->
					<!-- <div class="col-lg-4 col-md-12 col-12">
						<div class="single-table">
							<!-- Table Head -->
							<!-- <div class="table-head">
								<div class="icon">
									<i class="icofont icofont-ui-cut"></i>
								</div>
								<h4 class="title">Plastic Suggery</h4>
								<div class="price">
									<p class="amount">$199<span>/ Per Visit</span></p>
								</div>	
							</div> -->
							<!-- Table List -->
							<!-- <ul class="table-list">
								<li><i class="icofont icofont-ui-check"></i>Lorem ipsum dolor sit</li>
								<li><i class="icofont icofont-ui-check"></i>Cubitur sollicitudin fentum</li>
								<li class="cross"><i class="icofont icofont-ui-close"></i>Nullam interdum enim</li>
								<li class="cross"><i class="icofont icofont-ui-close"></i>Donec ultricies metus</li>
								<li class="cross"><i class="icofont icofont-ui-close"></i>Pellentesque eget nibh</li>
							</ul>
							<div class="table-bottom">
								<a class="btn" href="#">Book Now</a>
							</div> -->
							<!-- Table Bottom -->
						<!-- </div>
					</div> -->
					<!-- End Single Table-->
					<!-- Single Table -->
					<!-- <div class="col-lg-4 col-md-12 col-12">
						<div class="single-table">
							<!-- Table Head -->
							<!-- <div class="table-head">
								<div class="icon">
									<i class="icofont icofont-tooth"></i>
								</div>
								<h4 class="title">Teeth Whitening</h4>
								<div class="price">
									<p class="amount">$299<span>/ Per Visit</span></p>
								</div>	
							</div> -->
							<!-- Table List -->
							<!-- <ul class="table-list">
								<li><i class="icofont icofont-ui-check"></i>Lorem ipsum dolor sit</li>
								<li><i class="icofont icofont-ui-check"></i>Cubitur sollicitudin fentum</li>
								<li><i class="icofont icofont-ui-check"></i>Nullam interdum enim</li>
								<li class="cross"><i class="icofont icofont-ui-close"></i>Donec ultricies metus</li>
								<li class="cross"><i class="icofont icofont-ui-close"></i>Pellentesque eget nibh</li>
							</ul>
							<div class="table-bottom">
								<a class="btn" href="#">Book Now</a>
							</div> -->
							<!-- Table Bottom -->
						<!-- </div>
					</div> -->
					<!-- End Single Table-->
					<!-- Single Table -->
					<!-- <div class="col-lg-4 col-md-12 col-12">
						<div class="single-table">
							<!-- Table Head -->
							<!-- <div class="table-head">
								<div class="icon">
									<i class="icofont-heart-beat"></i>
								</div>
								<h4 class="title">Heart Suggery</h4>
								<div class="price">
									<p class="amount">$399<span>/ Per Visit</span></p>
								</div>	
							</div>  -->
							<!-- Table List -->
							<!-- <ul class="table-list">
								<li><i class="icofont icofont-ui-check"></i>Lorem ipsum dolor sit</li>
								<li><i class="icofont icofont-ui-check"></i>Cubitur sollicitudin fentum</li>
								<li><i class="icofont icofont-ui-check"></i>Nullam interdum enim</li>
								<li><i class="icofont icofont-ui-check"></i>Donec ultricies metus</li>
								<li><i class="icofont icofont-ui-check"></i>Pellentesque eget nibh</li>
							</ul>
							<div class="table-bottom">
								<a class="btn" href="#">Book Now</a>
							</div> -->
							<!-- Table Bottom -->
						<!-- </div>
					</div> -->
					<!-- End Single Table-->
				<!-- </div>	
			</div>	
		</section>	 -->
		<!--/ End Pricing Table -->
		
		
		
		<!-- Start Blog Area -->
		<section class="blog section" id="blog">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>What They Say About Our Services</h2>
							<img src="<?= base_url(); ?>assets/img/section-img.png" alt="#">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Blog -->
						<div class="single-news">
							<div class="news-head">
								<img src="<?= base_url(); ?>assets\img\author1.jpg"alt="#">
							</div>
							<div class="news-body">
								<div class="news-content">
									<!-- <div class="date">22 Aug, 2020</div> -->
                  <h2>Sarah K.</h2>
									<p class="fs-5">"Having our insurance with this company has been a game-changer. The coverage is comprehensive, claims are handled swiftly, and the peace of mind it provides for me and my family is priceless. Highly recommended!"</p>
									
								</div>
							</div>
						</div>
						<!-- End Single Blog -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Blog -->
						<div class="single-news">
							<div class="news-head">
								<img src="<?= base_url(); ?>assets\img\author2.jpg" alt="#">
							</div>
							<div class="news-body">
								<div class="news-content">
                <h2>John</h2>
									<p class="fs-5">Our experience with this insurance has been exceptional. The customer service is top-notch, and the policy has proven to be a reliable safety net during unexpected health issues. We feel secure and well taken care.</p>
								</div>
							</div>
						</div>
						<!-- End Single Blog -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Blog -->
						<div class="single-news">
							<div class="news-head">
								<img src="<?= base_url(); ?>assets\img\author3.jpg" alt="#">
							</div>
							<div class="news-body">
								<div class="news-content">
									
									<h2>Olivia</h2>
									<p class="fs-5">"Having our insurance with this company has been a game-changer. The coverage is comprehensive, claims are handled swiftly, and the peace of mind it provides for me and my family is priceless. Highly recommended!"</p>
								</div>
							</div>
						</div>
						<!-- End Single Blog -->
					</div>
				</div>
			</div>
		</section>
		<!-- End Blog Area -->
		
		<!-- Start clients -->
		<div class="clients overlay">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-12">
						<div class="owl-carousel clients-slider">
							<div class="single-clients">
								<img src="<?= base_url(); ?>assets/img/client1.png" alt="#">
							</div>
							<div class="single-clients">
								<img src="<?= base_url(); ?>assets/img/client2.png" alt="#">
							</div>
							<div class="single-clients">
								<img src="<?= base_url(); ?>assets/img/client3.png" alt="#">
							</div>
							<div class="single-clients">
								<img src="<?= base_url(); ?>assets/img/client4.png" alt="#">
							</div>
							<div class="single-clients">
								<img src="<?= base_url(); ?>assets/img/client5.png" alt="#">
							</div>
							<div class="single-clients">
								<img src="<?= base_url(); ?>assets/img/client1.png" alt="#">
							</div>
							<div class="single-clients">
								<img src="<?= base_url(); ?>assets/img/client2.png" alt="#">
							</div>
							<div class="single-clients">
								<img src="<?= base_url(); ?>assets/img/client3.png" alt="#">
							</div>
							<div class="single-clients">
								<img src="<?= base_url(); ?>assets/img/client4.png" alt="#">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/Ens clients -->
		
		<!-- Start Appointment -->
		<!-- <section class="appointment">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>We Are Always Ready to Help You. Book An Appointment</h2>
							<img src="img/section-img.png" alt="#">
							<p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-12 col-12">
						<form class="form" action="#">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<input name="name" type="text" placeholder="Name">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<input name="email" type="email" placeholder="Email">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<input name="phone" type="text" placeholder="Phone">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<div class="nice-select form-control wide" tabindex="0"><span class="current">Department</span>
											<ul class="list">
												<li data-value="1" class="option selected ">Department</li>
												<li data-value="2" class="option">Cardiac Clinic</li>
												<li data-value="3" class="option">Neurology</li>
												<li data-value="4" class="option">Dentistry</li>
												<li data-value="5" class="option">Gastroenterology</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<div class="nice-select form-control wide" tabindex="0"><span class="current">Doctor</span>
											<ul class="list">
												<li data-value="1" class="option selected ">Doctor</li>
												<li data-value="2" class="option">Dr. Akther Hossain</li>
												<li data-value="3" class="option">Dr. Dery Alex</li>
												<li data-value="4" class="option">Dr. Jovis Karon</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<input type="text" placeholder="Date" id="datepicker">
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-12">
									<div class="form-group">
										<textarea name="message" placeholder="Write Your Message Here....."></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-5 col-md-4 col-12">
									<div class="form-group">
										<div class="button">
											<button type="submit" class="btn">Book An Appointment</button>
										</div>
									</div>
								</div>
								<div class="col-lg-7 col-md-8 col-12">
									<p>( We will be confirm by an Text Message )</p>
								</div>
							</div>
						</form>
					</div>
					<div class="col-lg-6 col-md-12 ">
						<div class="appointment-image">
							<img src="img/contact-img.png" alt="#">
						</div>
					</div>
				</div>
			</div>
		</section> -->
		<!-- End Appointment -->
   
      
        

            </div>
          </div>
        </div> 
      </div>
    </div>
  </div>

 

 

  

    <?php $this->load->view('footer'); ?>