@extends('index')
@section('content')
<div class="breatcome_area d-flex align-items-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breatcome_title">
						<div class="breatcome_title_inner pb-2">
							<h2>OTP Verification</h2>
						</div>
						<div class="breatcome_content">
							<ul>
								<li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i> <span>OTP</span></li>
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
						<img src="assets/images/otp-img.jpg" alt="" />
					</div>
				</div>
				<div class="col-xl-6 pl-5 pr-5">
					<div class="contact_sm_title pb-3">
						<h2>Validate OTP</h2>
						<p>Please enter the OTP (one time password) to verify your account. A Code has been sent on your email</p>
					</div>
					<div class="quote_wrapper">
                        @include('flash-message')
						<form id="otp_form" method="POST"  action="{{ url('verify_otp') }}" >
                            @csrf
							<div class="row">
								<div class="col">
									<div class="form_box mb-30">
									  <input type="number" class="text-center" name="otp" placeholder="Enter Otp" />
                                 <input type="hidden" name="user_id" value="{{ $id }}">
									</div>
								</div>
								
								</div>
								<div class="quote_btn">
										<button class="btn" type="submit">Verify</button>
									</div><br>
								<p class="text-center text-muted mb-0">Not received your code? <a href="{{ url('resend_otp/'.$id) }}">Resend code</a></p>
						</form>
						<div id="status"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
  @endsection






