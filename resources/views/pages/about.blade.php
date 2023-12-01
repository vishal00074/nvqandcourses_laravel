@extends('index')
@section('content')

	
	
	<!--==================================================-->
	<!----- End NVQ Main Menu Area ----->
	<!--==================================================-->
	
	<!-- ============================================================== -->
	<!-- Start NVQ Breatcome Area -->
	<!-- ============================================================== -->
	<div class="breatcome_area d-flex align-items-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breatcome_title">
						<div class="breatcome_title_inner pb-2">
							<h2>About Us</h2>
						</div>
						<div class="breatcome_content">
							<ul>
								<li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i> <span>About Us</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End NVQ Breatcome Area -->
	<!-- ============================================================== -->
	
	<!--==================================================-->
	<!----- Start NVQ About Area ----->
	<!--==================================================-->
	<div class="about_area pt-85 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
					<div class="single_about_thumb mb-3">
						<div class="single_about_thumb_inner">
							<img src="{{$about->image ?? ''}}" alt="" />
						</div>
					</div>
					<div class="single_about_shape">
						<div class="single_about_shape_thumb bounce-animate">
							<img src="frontend/assets/images/about-circle.png" alt="" />
						</div>
					</div>	
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
					<div class="section_title text_left mb-40 mt-3">
						<div class="section_sub_title uppercase mb-3">
							<h6>You Can Learn</h6>
						</div>
						<div class="section_main_title">
							
							<h1>{{$about->title ?? ''}}</h1>
						</div>
						<div class="em_bar">
							<div class="em_bar_bg"></div>
						</div>
						<div class="section_content_text pt-4">
							<p>{!! strip_tags($about->description ?? '') !!}</p>
						</div>
					</div>
					<div class="singel_about_left mb-30">
						
						<div class="singel_about_left_inner">
							<div class="about_icon mr-4">
								<div class="icon mt-3">
									<i class="flaticon-code"></i>
								</div>
							</div>
							<div class="singel-about-content">
							    <h5>{{$about->titleA ?? ''}}</h5>
								{!! strip_tags($about->column1 ?? '') !!}
							</div>
						</div><br>
						
	
						<div class="singel_about_left_inner">
							<div class="about_icon mr-4">
								<div class="icon mt-3">
									<i class="flaticon-code"></i>
								</div>
							</div>
							<div class="singel-about-content">
							    <h5>{{$about->titleB ?? ''}}</h5>
								{!! strip_tags($about->column2 ?? '') !!}
							</div>
						</div>
					</div>	
				</div>
				
			</div>
		</div>	
	</div>
	<!--==================================================-->
	<!----- End NVQ About Area ----->
	<!--==================================================-->
	
	
	<!--==================================================-->
	<!----- Start NVQ Call Do Action Area ----->
	<!--==================================================-->
	<div class="call_do_action pt-85 pb-130 bg_color" style="background-image:url(frontend/assets/images/slider/slider-6.jpg)" >
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section_title white  mt-3">
						<div class="phone_number mb-3">
							<h5>What We Do</h5>
						</div>
						<div class="section_main_title">
							<h1>{{$about->skill_title ?? ''}}</h1>
							<p>{{$about->skill_description ?? ''}}</p>
						</div>
						
						
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!----- End NVQ Call Do Action Area ----->
	<!--==================================================-->
	
	
	
	
	
<!--	<div class="main_contact_area style_three bg_color2 pt-80 pb-90" style="background-image:url(frontend/assets/images/glob-bg.png)">-->
<!--		<div class="container">-->
<!--			<div class="row align-items-center">-->
<!--				<div class="col-lg-6">-->
<!--					<div class="section_title text_left mb-50 mt-3">-->
<!--						<div class="section_sub_title uppercase mb-3">-->
<!--							<h6>Contact Info</h6>-->
<!--						</div>-->
<!--						<div class="section_main_title">-->
<!--							<h1>Why not give us a call?</h1>-->
<!--						</div>-->
<!--						<div class="section_title_text pt-2">-->
<!--							<p>Our friendly team of advisers are always happy to help with any queries you may have</p>-->
					
							
<!--							<h4>Do you Have Any Questions?</h4>-->
<!--						</div>-->
<!--						<div class="em_bar">-->
<!--							<div class="em_bar_bg"></div>-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="contact_address">-->
<!--						<div class="contact_address_company mb-3">-->
<!--							<ul>-->
<!--								<li><i class="fa fa-envelope-o"></i><span><a href="#">Contact@examplesite.com</a></span></li>-->
<!--								<li><i class="fa fa-mobile"></i><span> +088 01314 183818</span></li>-->
<!--								<li><i class="fa fa-map-marker"></i> <span> -->
<!--1-5 The Parade Monarch Way, Ilford, 1G2 7HT</span></li>-->
<!--							</ul>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="col-lg-6">-->
<!--					<div class="contact_from">-->
<!--						<div class="contact_from_box">-->
<!--							<div class="contact_title pb-4">-->
<!--								<h3>Request a call back </h3>-->
<!--							</div>-->
<!--							<form id="contact_form" action="https://formspree.io/f/myyleorq" method="POST">-->
<!--								<div class="row">-->
<!--									<div class="col-lg-12">-->
<!--										<div class="form_box mb-30">-->
<!--											<input type="text" name="name" placeholder="Name">-->
<!--										</div>-->
<!--									</div>-->
<!--									<div class="col-lg-12">-->
<!--										<div class="form_box mb-30">-->
<!--											<input type="email" name="email" placeholder="Email Address">-->
<!--										</div>-->
<!--									</div>-->
<!--									<div class="col-lg-12">-->
<!--										<div class="form_box mb-30">-->
<!--											<textarea name="message" id="message" cols="30" rows="10" placeholder="Write a Message"></textarea>-->
<!--										</div>-->
<!--										<div class="quote_btn">-->
<!--											<button class="btn" type="submit">Send Message</button>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--							</form>-->
<!--							<div class="status"></div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->

@endsection