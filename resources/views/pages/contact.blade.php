@extends('index')
@section('content')
@php
 $contact =DB::table('contact_us')->select('*')->first();
@endphp
<div class="breatcome_area d-flex align-items-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breatcome_title">
						<div class="breatcome_title_inner pb-2">
							<h2>Contact</h2>
						</div>
						<div class="breatcome_content">
							<ul>
								<li><a href="{{ url('/') }}">Home</a><i class="fa fa-angle-right"></i> <span>Contact</span></li>
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
	
	<!-- ============================================================== -->
	<!-- Start NVQ Contact Address Area -->
	<!-- ============================================================== -->
	
	<div class="contact_address_area pt-80 pb-70">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section_title text_center mb-55">
						<div class="section_sub_title uppercase mb-3">
							<h6>CONTACT US</h6>
						</div>
						<div class="section_main_title">
							<h3>{{ $contact->title }}</h3>
						</div>
						<div class="em_bar">
							<div class="em_bar_bg"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="single_contact_address_two">
						<div class="single_contact_address_two_icon">
							<div class="icon">
								<i class="flaticon-global-1"></i>
							</div>
						</div>
						<div class="single_contact_address_two_content">
							<h4><a href="https://www.google.com/maps/search/?q={{urlencode($contact->address ?? '')}}" target="_blank">{{ $contact->address }}</a></h4>
							<span>OFFICE ADDRESS</span>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single_contact_address_two">
						<div class="single_contact_address_two_icon">
							<div class="icon">
								<i class="flaticon-global-1"></i>
							</div>
						</div>
						<div class="single_contact_address_two_content">
							<h4><a href="mailto:{{$contact->email ?? ''}}">{{ $contact->email ?? ''}}</a></h4>
							<span>Our Mail</span>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single_contact_address_two">
						<div class="single_contact_address_two_icon">
							<div class="icon">
								<i class="flaticon-global-1"></i>
							</div>
						</div>
						<div class="single_contact_address_two_content">
							<h4><a href="tel:{{$contact->phone ?? ''}}">{{ $contact->phone ?? ''}}</a></h4>
							<span>Phone Number</span>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End NVQ Contact Address Area -->
	<!-- ============================================================== -->
	
	<!--==================================================-->
	<!----- Start NVQ Contact Area ----->
	<!--==================================================-->
	<div class="main_contact_area app pt-80 bg_fixed " style="background-image:url({{ $contact->background_image }})";>
		<div class="container">
			<div class="row align-items-center">
				
				<div class="col-lg-6">
					<div class="section_title white mb-4">
						<div class="section_sub_title uppercase mb-3">
							<h6>Get A Quote</h6>
						</div>
						<div class="section_main_title">
							<h1>Make an Appointment</h1>
						</div>
					</div>
					<div class="contact_from">
						<form id="contact_form" action="{{ url('/user_queries') }}" method="POST" id="dreamit-form">
							@csrf
							<div class="row">
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="text" name="name"  placeholder="Name">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="email" name="email" placeholder="Email Address">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="text" name="phone" placeholder="Phone Number">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_box mb-30">
										<input type="text" name="about_what" placeholder="About What">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form_box mb-30">
										<textarea name="message" id="message" cols="30" rows="10" placeholder="Write a Message"></textarea>
									</div>
									<div class="quote_btn">
										<button class="btn" type="submit">Send Message</button>
									</div>
								</div>
							</div>
						</form>
						<div class="status"></div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="single_contact_abs_thumb mt-4">
						<img src="{{ $contact->image ?? ''}}" alt="" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!----- End NVQ Contact Area ----->
	<!--==================================================-->

	
	<!--==================================================-->
	<!----- End NVQ Map Area ----->
	<!--==================================================-->
	<div class="google_map_area">
		<div class="row-fluid">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="google_map_area">
					{!! $contact->map ?? '' !!}	
				</div>
			</div>				
		</div>
	</div>

@endsection    