@extends('index')
@section('content')
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
							<h2>Thank You</h2>
						</div>
						<div class="breatcome_content">
							<ul>
								<li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i> <span>Thankyou</span></li>
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
	<div class="pt-50 pb-80">
		<div class="container">
			<div class="row align-items-center">
			<div class="col-lg-2 p-0"></div>
				<div class="col-lg-8 p-0">
					<div class="single_contact_rt_thumb">
						<img src="frontend/assets/images/thank.jpg" alt="" />
						<h3 class="text-center">Your Payment has been Recevied</h3>
						<p class="text-center">We will connect with you very soon.</p>
						<div class="button two text-center">
								<a href="{{ url('/') }}">Go to Home</a>
							</div>
						
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
@endsection