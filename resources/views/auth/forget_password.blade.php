@extends('index')
@section('content')
<div class="breatcome_area d-flex align-items-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breatcome_title">
						<div class="breatcome_title_inner pb-2">
							<h2>Forget Password</h2>
						</div>
						<div class="breatcome_content">
							<ul>
								<li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i> <span>Forget Password</span></li>
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
     	<div class="container padding-bottom-3x mb-2 mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="forgot">
                      	<h2>Forgot your password?</h2>
                        <p>Change your password in three easy steps. This will help you to secure your password!</p>
                        <ol class="list-unstyled">
                            <li><span class="text-medium">1. </span>Enter your email address below.</li>
                            <li><span class="text-medium">2. </span>Our system will send you a temporary link</li>
                            <li><span class="text-medium">3. </span>Use the link to reset your password</li>
                        </ol>
                    </div>	
                  
                    <form class="card mt-4" action="{{ url('send/otp') }}" method="post">
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="email-for-pass">Enter your email address</label>
                                <input class="form-control" type="text" id="email-for-pass" name="email" ><small class="form-text text-muted">Enter the email address you used during the registration on Waamde.com. Then we'll email a link to this address.</small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success get-new" type="submit">Get New Password</button>
                            <a class="btn btn-danger back-login" href="{{ url('login') }}">Back to Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</div>
@endsection
