<!DOCTYPE HTML>
<html lang="en-US">
<head>
@include('layouts.head')
	
</head>
<body>

		
	<!--==================================================-->
	<!----- Start	NVQ Header Top Menu Area Css ----->
	<!--==================================================-->
	<div class="header_top_menu pt-2 pb-2 bg_color">
	@include('layouts.headercontact')
		
	</div>
	<!--==================================================-->
	<!----- End	NVQ Header Top Menu Area Css ----->
	<!--===================================================-->



	<!--==================================================-->
	<!----- Start NVQ Main Menu Area ----->
	<!--==================================================-->
	<div id="sticky-header" class="NVQ_nav_manu d-md-none d-lg-block d-sm-none d-none">
	    @include('layouts.nav')
	</div>
	
	<!-- NVQ Mobile Menu Area -->
	<div class="mobile-menu-area d-sm-block d-md-block d-lg-none">
	 @include('layouts.nav')
	</div>
	<!--==================================================-->
	<!----- End NVQ Main Menu Area ----->
	<!--==================================================-->
	
	<!-- ============================================================== -->
	<!-- Start Techno Breatcome Area -->
	<!-- ============================================================== -->
	<div class="breatcome_area d-flex align-items-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breatcome_title">
						<div class="breatcome_title_inner pb-2">
							<h2>Submit Here</h2>
						</div>
						<div class="breatcome_content">
							<ul>
								<li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i> <span>Information</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Techno Breatcome Area -->
	<!-- ============================================================== -->
	


	
	<!--==================================================-->
	<!----- Start Techno Contact Area ----->
	<!--==================================================-->
	<div class="contact_sm_area pt-80 pb-80">
		<div class="container">
			<div class="row cnt_box align-items-center">
				<div class="col-lg-6 p-0">
					<div class="single_contact_rt_thumb">
						<img src="{{ asset('frontend/assets/images/new/ap.jpg') }}" alt="" />
					</div>
				</div>
				<div class="col-xl-6 pl-5 pr-5">
					
                    @include('flash-message')
					<div class="contact_sm_title pb-3">
						<h2>Submit Your Details</h2>
					</div>
					<div class="quote_wrapper">
						<form id="contact_form" action="{{ url('/guest_registration') }}" method="POST" id="dreamit-form">
							@csrf
                            <input type="hidden" name="course_id"  value="{{ $id }}">
							<div class="row">
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="text" name="name"  placeholder="Name">
										@if ($errors->has('name'))
									<span class="text-danger">{{ $errors->first('name') }}</span>
									@endif
									</div>
									
								</div>
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="email" name="email" placeholder="Email Address">
										@if ($errors->has('email'))
									<span class="text-danger">{{ $errors->first('email') }}</span>
									@endif
									</div>
								
								</div>
								
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="text" name="phone" placeholder="Phone Number">
										@if ($errors->has('phone'))
									<span class="text-danger">{{ $errors->first('phone') }}</span>
									@endif
									</div>
								
								</div>

								<div class="col-lg-6">
									<div class="form_box mb-30">
										<select name="payment_method" id="gender">
										    <option value="" disabled selected hidden>Payment Method</option>
											<option value="stripe">Card</option>
											<option value="paypal">Paypal</option>
											
										</select>
										@if ($errors->has('payment_method'))
									<span class="text-danger">{{ $errors->first('payment_method') }}</span>
									@endif
									</div>
									</div>

								
								
								
								
							
								</div>
								
								<div class="col-lg-12">
									
									<div class="quote_btn">
										<button class="btn" type="submit">Submit</button>
									</div>
								</div>
							</div>
						</form>
						<div id="status"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!----- End Techno Contact Area ----->
	<!--==================================================-->
	
		<!--==================================================-->
	<!----- Start NVQ Footer Middle Area ----->
	<!--==================================================-->
	<div class="footer-middle pt-95"> 
	@include('layouts.footer')
	</div>		
	<!--==================================================-->
	<!----- End NVQ Footer Middle Area ----->
	<!--==================================================-->
	
	<!-- jquery js -->	
	<script type="text/javascript" src="{{ asset('frontend/assets/js/vendor/jquery-3.2.1.min.js') }}"></script>
	<!-- bootstrap js -->	
	<script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
	<!-- carousel js -->
	<script type="text/javascript" src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
	<!-- counterup js -->
	<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.counterup.min.js') }}"></script>
	<!-- waypoints js -->
	<script type="text/javascript" src="{{ asset('frontend/assets/js/waypoints.min.js') }}"></script>
	<!-- wow js -->
	<script type="text/javascript" src="{{ asset('frontend/assets/js/wow.js') }}"></script>
	<!-- imagesloaded js -->
	<script type="text/javascript" src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
	<!-- venobox js -->
	<script type="text/javascript" src="{{ asset('frontend/assets/venobox/venobox.js') }}"></script>
	<!-- ajax mail js -->
	<script type="text/javascript" src="{{ asset('frontend/assets/js/ajax-mail.js') }}"></script>
	<!--  testimonial js -->	
	<script type="text/javascript" src="{{ asset('frontend/assets/js/testimonial.js') }}"></script>
	<!--  animated-text js -->	
	<script type="text/javascript" src="{{ asset('frontend/assets/js/animated-text.js') }}"></script>
	<!-- venobox min js -->
	<script type="text/javascript" src="{{ asset('frontend/assets/venobox/venobox.min.js') }}"></script>
	<!-- isotope js -->
	<script type="text/javascript" src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
	<!-- jquery nivo slider pack js -->
	<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.nivo.slider.pack.js') }}"></script>
	<!-- jquery meanmenu js -->	
	<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.meanmenu.js') }}"></script>
	<!-- jquery scrollup js -->	
	<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.scrollUp.js') }}"></script>
	<!-- theme js -->	
	<script type="text/javascript" src="{{ asset('frontend/assets/js/theme.js') }}"></script>
		<!-- jquery js -->	
</body>
</html>