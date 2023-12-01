@extends('index')
@section('content')
<div class="breatcome_area d-flex align-items-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breatcome_title">
						<div class="breatcome_title_inner pb-2">
							@if($level->slug=='level-one-courses')
							<h2> {{ $level->level }}</h2>
							@else
							<h2>NVQ {{ $level->level }}</h2>
							@endif
						</div>
						<div class="breatcome_content">
							<ul>
							@if($level->slug=='level-one-courses')
								<li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i> <span> {{ $level->level }}</span></li>
								@else
								<li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i> <span>NVQ {{ $level->level }}</span></li>
							@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End nvq Breatcome Area -->
	<!-- ============================================================== -->
	
	<!--==================================================-->
	<!----- Start nvq Service Details Area ----->
	<!--==================================================-->
	
	<div class="service-details pages pt-90 pb-50">
		<div class="container">		
			<div class="row">	
				<div class=" col-lg-4 col-md-5 col-sm-12 col-xs-12">
				<div class="service-main-details-content-title pb-5">
										<h3 class="mt-0">Latest Courses</h3>
									</div>
					<div class="service-details-pn-list">
						<ul>
							@foreach($latest_courses as $latest_course)
							<li><a href="{{ url('couses_detail/'.$latest_course->slug) }}">{{ $latest_course->name }}<span><i class="fa fa-angle-right"></i></span></a></li>
							@endforeach
						</ul>
					</div>
					
					
					<div class="service-details-pn-about mt-4" style="background-image:url(assets/images/tab1.jpg)" >
						<div class="service-details-pn-about-content pt-35 pb-40 pl-4 pr-4">
							<div class="service-details-pn-about-content-title pb-3">
								<h4>Need Any Help?</h4>
							</div>
							<div class="service-details-pn-about-content-text">
								<!-- <p>Lorem ipsum dolor sit amet, consectetur sed adipiscing elit.</p> -->
							</div>
							<div class="service-details-pn-about-content-button pt-2">
								<a href="{{ url('contact') }}">Contact Now</a>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="service-main-details">
								<div class="service-main-details-inner">
									
									<div class="service-main-details-content-title pb-5">
									@if($level->slug=='level-one-courses')
									<h3 class="mt-0">{{ $level->level }} Courses Available</h3>
									@else
										<h3 class="mt-0">{{ $level->level }} NVQ Courses Available</h3>
									@endif
									</div>
									
								</div>
							</div>
						</div>
						@foreach($nvqcourse as $nvqcourses)
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-6 course">
							<div class="nvq_flipbox mb-30">
								<div class="nvq_flipbox_font">
										<div class="nvq_flipbox_inner">
											<div class="nvq_flipbox_icon">
												<img src="{{ $nvqcourses->image }}" alt="img" />
											</div>			
											<div class="flipbox_title">
												<h6> {{ $nvqcourses->name }}</h6>
											</div>
											
										</div>
								</div>
								<div class="nvq_flipbox_back " style="background-image:url({{ $nvqcourses->image }});">
									<div class="nvq_flipbox_inner">		
										<div class="flipbox_title">
											<h3> {{ $nvqcourses->level_name }}</h3>
										</div>
										<div class="flipbox_desc">
											<p>{{ $nvqcourses->duration }}</p>
										</div>
										<div class="flipbox_button">
											<a href="{{ url('couses_detail/'.$nvqcourses->slug) }}">Details<i class="fa fa-angle-double-right"></i></a>
										</div>
									</div>
								</div>
							</div>	
						</div>
						
						@endforeach
						<div class="pagination">
                            {{ $nvqcourse->appends(request()->except('page'))->links() }}
                        </div>
						<!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
							<div class="nvq_flipbox mb-30">
								<div class="nvq_flipbox_font">
										<div class="nvq_flipbox_inner">
											<div class="nvq_flipbox_icon">
												<img src="assets/images/level-2.png" alt="img" />
											</div>			
											<div class="flipbox_title">
												<h3>NVQ Level 2</h3>
											</div>
											
										</div>
								</div>
								<div class="nvq_flipbox_back " style="background-image:url(assets/images/level-2.png);">
									<div class="nvq_flipbox_inner">		
										<div class="flipbox_title">
											<h3>NVQ Level 2</h3>
										</div>
										<div class="flipbox_desc">
											<p>Nvq level 2 diploma in plastering (qcf)</p>
										</div>
										<div class="flipbox_button">
											<a href="#">Read More<i class="fa fa-angle-double-right"></i></a>
										</div>
									</div>
								</div>
							</div>	
						</div> -->
						
						
						<!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
							<div class="nvq_flipbox mb-30">
								<div class="nvq_flipbox_font">
										<div class="nvq_flipbox_inner">
											<div class="nvq_flipbox_icon">
												<img src="assets/images/level-2.png" alt="img" />
											</div>			
											<div class="flipbox_title">
												<h3>NVQ Level 2</h3>
											</div>
											
										</div>
								</div>
								<div class="nvq_flipbox_back " style="background-image:url(assets/images/level-2.png);">
									<div class="nvq_flipbox_inner">		
										<div class="flipbox_title">
											<h3>NVQ Level 2</h3>
										</div>
										<div class="flipbox_desc">
											<p>Nvq level 2 diploma in plastering (qcf)</p>
										</div>
										<div class="flipbox_button">
											<a href="#">Read More<i class="fa fa-angle-double-right"></i></a>
										</div>
									</div>
								</div>
							</div>	
						</div> -->
						
						
						<!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
							<div class="nvq_flipbox mb-30">
								<div class="nvq_flipbox_font">
										<div class="nvq_flipbox_inner">
											<div class="nvq_flipbox_icon">
												<img src="assets/images/level-2.png" alt="img" />
											</div>			
											<div class="flipbox_title">
												<h3>NVQ Level 2</h3>
											</div>
											
										</div>
								</div>
								<div class="nvq_flipbox_back " style="background-image:url(assets/images/level-2.png);">
									<div class="nvq_flipbox_inner">		
										<div class="flipbox_title">
											<h3>NVQ Level 2</h3>
										</div>
										<div class="flipbox_desc">
											<p>Nvq level 2 diploma in plastering (qcf)</p>
										</div>
										<div class="flipbox_button">
											<a href="#">Read More<i class="fa fa-angle-double-right"></i></a>
										</div>
									</div>
								</div>
							</div>	
						</div> -->
						
						<!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
							<div class="nvq_flipbox mb-30">
								<div class="nvq_flipbox_font">
										<div class="nvq_flipbox_inner">
											<div class="nvq_flipbox_icon">
												<img src="assets/images/level-2.png" alt="img" />
											</div>			
											<div class="flipbox_title">
												<h3>NVQ Level 2</h3>
											</div>
											
										</div>
								</div>
								<div class="nvq_flipbox_back " style="background-image:url(assets/images/level-2.png);">
									<div class="nvq_flipbox_inner">		
										<div class="flipbox_title">
											<h3>NVQ Level 2</h3>
										</div>
										<div class="flipbox_desc">
											<p>Nvq level 2 diploma in plastering (qcf)</p>
										</div>
										<div class="flipbox_button">
											<a href="#">Read More<i class="fa fa-angle-double-right"></i></a>
										</div>
									</div>
								</div>
							</div>	
						</div> -->
						
						<!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
							<div class="nvq_flipbox mb-30">
								<div class="nvq_flipbox_font">
										<div class="nvq_flipbox_inner">
											<div class="nvq_flipbox_icon">
												<img src="assets/images/level-2.png" alt="img" />
											</div>			
											<div class="flipbox_title">
												<h3>NVQ Level 2</h3>
											</div>
											
										</div>
								</div>
								<div class="nvq_flipbox_back " style="background-image:url(assets/images/level-2.png);">
									<div class="nvq_flipbox_inner">		
										<div class="flipbox_title">
											<h3>NVQ Level 2</h3>
										</div>
										<div class="flipbox_desc">
											<p>Nvq level 2 diploma in plastering (qcf)</p>
										</div>
										<div class="flipbox_button">
											<a href="#">Read More<i class="fa fa-angle-double-right"></i></a>
										</div>
									</div>
								</div>
							</div>	
						</div> -->
						
						

						
						
						
						
						
						
					</div>		
				</div>
				

			</div>
		</div>
	</div>
	<!--==================================================-->
	<!----- End nvq Service Details Area ----->
	<!--==================================================-->
	
	<!-- <div class="main_contact_area style_three bg_color2 pt-80 pb-90" style="background-image:url(assets/images/glob-bg.png)">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="section_title text_left mb-50 mt-3">
						<div class="section_sub_title uppercase mb-3">
							<h6>Contact Info</h6>
						</div>
						<div class="section_main_title">
							<h1>Why not give us a call?</h1>
						</div>
						<div class="section_title_text pt-2">
							<p>Our friendly team of advisers are always happy to help with any queries you may have</p>
					
							
							<h4>Do you Have Any Questions?</h4>
						</div>
						<div class="em_bar">
							<div class="em_bar_bg"></div>
						</div>
					</div>
					<div class="contact_address">
						<div class="contact_address_company mb-3">
							<ul>
								<li><i class="fa fa-envelope-o"></i><span><a href="#">Contact@examplesite.com</a></span></li>
								<li><i class="fa fa-mobile"></i><span> +088 01314 183818</span></li>
								<li><i class="fa fa-map-marker"></i> <span> 
1-5 The Parade Monarch Way, Ilford, 1G2 7HT</span></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="contact_from">
						<div class="contact_from_box">
							<div class="contact_title pb-4">
								<h3>Request a call back </h3>
							</div>
							<form id="contact_form" action="https://formspree.io/f/myyleorq" method="POST">
								<div class="row">
									<div class="col-lg-12">
										<div class="form_box mb-30">
											<input type="text" name="name" placeholder="Name">
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form_box mb-30">
											<input type="email" name="email" placeholder="Email Address">
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
				</div>
			</div>
		</div>
	</div> -->
@endsection	