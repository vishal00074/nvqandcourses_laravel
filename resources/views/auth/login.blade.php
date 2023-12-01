<!DOCTYPE HTML>
@php
 $social = DB::table('social_links')->select('*')->first();
@endphp

<html lang="en-US">
<head>
@include('layouts.head')
	
</head>
<body>

		
	<!--==================================================-->
	<!----- Start	NVQ Header Top Menu Area Css ----->
	<!--==================================================-->
	<div class="header_top_menu pt-2 pb-2 bg_color">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-sm-8">
					<div class="header_top_menu_address">
						<div class="header_top_menu_address_inner">
							<ul>
								<li><a href="#"><i class="fa fa-envelope-o"></i>nvq&courses@gmail.com</a></li>
								<li><a href="#"><i class="fa fa-map-marker"></i>1-5 The Parade Monarch Way, Ilford, 1G2 7HT</a></li>
								<li><a href="#"><i class="fa fa-phone"></i>+01708 300 088</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-4">
					<div class="header_top_menu_icon">
						<div class="header_top_menu_icon_inner">
							<ul>
								<li><a href="{{$social->facebook ?? ''}}"><i class="fa fa-facebook"></i></a></li>
								<li><a href="{{$social->twitter ?? ''}}"><i class="fa fa-twitter"></i></a></li>
								<li><a href="{{$social->printerest ?? ''}}"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="{{$social->linkedin ?? ''}}"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				
			</div>
		</div>
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
    @include('layouts.mobilenav')
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
							<h2>Login Here</h2>
						</div>
						<div class="breatcome_content">
							<ul>
								<li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i> <span>Login</span></li>
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
						<img src="frontend/assets/images/new/ap.jpg" alt="" />
					</div>
				</div>
				<div class="col-xl-6 pl-5 pr-5">
                @include('flash-message')
					<div class="contact_sm_title pb-3">
						<h2>Login</h2>
					</div>
					<div class="quote_wrapper">
						<form id="loginForm" action="{{ url('/logged_in') }}" method="POST" id="loginForm">
							@csrf
							<div class="row">
								
								<div class="col-lg-12">
									<div class="form_box mb-15">
										<input type="email" name="email" placeholder="Enter Your Email">
										@if ($errors->has('email'))
									<span class="text-danger">{{ $errors->first('email') }}</span>
									@endif
									</div>
								
								</div>
								
							
								<div class="col-lg-12">
									<div class="form_box mb-15">
										<input type="text" name="password" placeholder="Enter Password">
										@if ($errors->has('password'))
									<span class="text-danger">{{ $errors->first('password') }}</span>
									@endif
									</div>
									
								</div>
								<div class="col-lg-12 mb-15">
							<div class="row frgt">
                  <div class="col">
                    <div class="form-check">
                      <input id="remember-me" name="remember" class="form-check-input" type="checkbox">
                      <label class="form-check-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>
                  <div class="col text-right"><a href="{{url('forget_password')}}">Forgot Password ?</a></div>
                </div></div>
								
								<div class="col-lg-12">
									
									<div class="quote_btn">
										<button class="btn" type="submit">Submit</button>
									</div>
								</div>
							</div>
						</form>
						<p class="text-center text-muted mt-15">Don't have an account? <a class="link-primary" href="{{ url('/register') }}">Register here</a></p>
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
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div class="widget widgets-company-info">
						<div class="footer-bottom-logo pb-40">
							<img src="frontend/assets/images/logo.png" alt="" />
						</div>
						<div class="company-info-desc">
							<p>Condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus.
							</p>
						</div>
						<div class="follow-company-info pt-3">
							<div class="follow-company-text mr-3">
								<a href="#"><p>Follow Us</p></a>
							</div>
							<div class="follow-company-icon">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-skype"></i></a>
							</div>
						</div>
					</div>					
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div class="widget widget-nav-menu">
						<h4 class="widget-title pb-4">Our Services</h4>
						<div class="menu-quick-link-container ml-4">
							<ul id="menu-quick-link" class="menu">
								<li><a href="#">Marketing Strategy</a></li>
								<li><a href="#">Interior Design</a></li>
								<li><a href="#">Digital Services</a></li>
								<li><a href="#">Product Selling</a></li>
								<li><a href="#">Product Design</a></li>
								<li><a href="#">Social Marketing</a></li>
							</ul>
						</div>
					</div>
				</div>	
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div class="widget widget-nav-menu">
						<h4 class="widget-title pb-4">Our Services</h4>
						<div class="menu-quick-link-container ml-4">
							<ul id="menu-quick-link" class="menu">
								<li><a href="#">Marketing Strategy</a></li>
								<li><a href="#">Interior Design</a></li>
								<li><a href="#">Digital Services</a></li>
								<li><a href="#">Product Selling</a></li>
								<li><a href="#">Product Design</a></li>
								<li><a href="#">Social Marketing</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div class="widget widgets-company-info">
						<h3 class="widget-title pb-4">Company Address</h3>
						<div class="company-info-desc">
							
						</div>	
						<div class="footer-social-info">
							<p><span>Address :</span> 1-5 The Parade Monarch Way, Ilford, 1G2 7HT</p>
						</div>
						<div class="footer-social-info">
							<p><span>Phone :</span> 01708 300 088</p>
						</div>
						<div class="footer-social-info">
							<p><span>Email :</span> info@nvq&courses.com</p>
						</div>
						
					</div>					
				</div>
				
				
			</div>
			<div class="row footer-bottom mt-70 pt-3 pb-1">
				<div class="col-lg-6 col-md-6">
					<div class="footer-bottom-content">
						<div class="footer-bottom-content-copy">
							<p>© 2023 Nvq & Courses.All Rights Reserved. </p>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="footer-bottom-right">
						<div class="footer-bottom-right-text">
							<a class="absod" href="#">Privacy Policy </a>
							<a href="#"> Terms & Conditions</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>		
	<!--==================================================-->
	<!----- End NVQ Footer Middle Area ----->
	<!--==================================================-->
	
	<!-- jquery js -->	
	<script type="text/javascript" src="frontend/assets/js/vendor/jquery-3.2.1.min.js"></script>
	<!-- bootstrap js -->	
	<script type="text/javascript" src="frontend/assets/js/bootstrap.min.js"></script>
	<!-- carousel js -->
	<script type="text/javascript" src="frontend/assets/js/owl.carousel.min.js"></script>
	<!-- counterup js -->
	<script type="text/javascript" src="frontend/assets/js/jquery.counterup.min.js"></script>
	<!-- waypoints js -->
	<script type="text/javascript" src="frontend/assets/js/waypoints.min.js"></script>
	<!-- wow js -->
	<script type="text/javascript" src="frontend/assets/js/wow.js"></script>
	<!-- imagesloaded js -->
	<script type="text/javascript" src="frontend/assets/js/imagesloaded.pkgd.min.js"></script>
	<!-- venobox js -->
	<script type="text/javascript" src="frontend/assets/venobox/venobox.js"></script>
	<!-- ajax mail js -->
	<script type="text/javascript" src="frontend/assets/js/ajax-mail.js"></script>
	<!--  testimonial js -->	
	<script type="text/javascript" src="frontend/assets/js/testimonial.js"></script>
	<!--  animated-text js -->	
	<script type="text/javascript" src="frontend/assets/js/animated-text.js"></script>
	<!-- venobox min js -->
	<script type="text/javascript" src="frontend/assets/venobox/venobox.min.js"></script>
	<!-- isotope js -->
	<script type="text/javascript" src="frontend/assets/js/isotope.pkgd.min.js"></script>
	<!-- jquery nivo slider pack js -->
	<script type="text/javascript" src="frontend/assets/js/jquery.nivo.slider.pack.js"></script>
	<!-- jquery meanmenu js -->	
	<script type="text/javascript" src="frontend/assets/js/jquery.meanmenu.js"></script>
	<!-- jquery scrollup js -->	
	<script type="text/javascript" src="frontend/assets/js/jquery.scrollUp.js"></script>
	<!-- theme js -->	
	<script type="text/javascript" src="frontend/assets/js/theme.js"></script>
		<!-- jquery js -->	
</body>
</html>