@extends('index')
@section('content')
<div class="breatcome_area d-flex align-items-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breatcome_title">
						<div class="breatcome_title_inner pb-2">
						@if($courses->level=='1')
							<h2>  {{ $courses->level_name }}</h2>
							@else
							<h2>NVQ  {{ $courses->level_name }}</h2>
							@endif
						</div>
						<div class="breatcome_content">
							<ul>
							@if($courses->level=='1')
								<li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i> <span>  {{ $courses->level_name }}</span></li>
								@else
								<li><a href="{{ url('/') }}">Home</a> <i class="fa fa-angle-right"></i> <span>NVQ  {{ $courses->level_name }}</span></li>
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
							<li><a href="{{ url('couses_detail/'.$latest_course->id) }}">{{ $latest_course->name }}<span><i class="fa fa-angle-right"></i></span></a></li>
						    @endforeach
						</ul>
					</div>
					
					<div class="service-details-pn-about mt-4" style="background-image:url(assets/images/tab1.jpg)" >
						<div class="service-details-pn-about-content pt-35 pb-40 pl-4 pr-4">
							<div class="service-details-pn-about-content-title pb-3">
								<h4>Need Any Help?</h4>
							</div>
							<div class="service-details-pn-about-content-text">
								<!--<p>Lorem ipsum dolor sit amet, consectetur sed adipiscing elit.</p>-->
							</div>
							<div class="service-details-pn-about-content-button pt-2">
								<a href="{{ url('/contact') }}">Contact Now</a>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="service-main-details">
								<div class="service-main-details-inner">
									<div class="service-main-details-inner-thumb">
										
									</div>
									<div class="service-main-details-content-title pb-3">
										<h3 class="mt-0">  {{ $courses->detail_name }}</h3>
									</div>
									<div class="img-box mb-3">
									<img src="{{ $courses->image }}" alt="img" width="100%" /></div>
									<div class="service-main-details-content-text pb-3">
                                    {{ $courses->description }}
									
                                   </div>
									<div class="service-main-details-content-title pt-3 pb-3">
										<h4>Courses Information</h4>
                                        {{ $courses->column1 }}
                                    
                                        {{ $courses->column2 }}
                                        
                                        {{ $courses->column3 }}
                                       
                                        {{ $courses->column4 }}
									</div>
									
									<div class="row">
									
					<div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
							<div class="nvq_flipbox-1 mb-30">
								<div class="nvq_flipbox_font">
										<div class="nvq_flipbox_inner-1">
											<div class="nvq_flipbox_icon">
												<img src="{{ asset('assets/images/courses/duration.png') }}" alt="img" />
											</div>			
											<div class="flipbox_title">
												<h3>Duration </h3>
												<p>{{ $courses->duration }}</p>
											</div>
											
										</div>
								</div>
								
							</div>	
						</div>
						
						
						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
							<div class="nvq_flipbox-1 mb-30">
								<div class="nvq_flipbox_font">
										<div class="nvq_flipbox_inner-1">
											<div class="nvq_flipbox_icon">
												<img src="{{ asset('assets/images/courses/money.png') }}" alt="img" />
											</div>			
											<div class="flipbox_title">
												<h3>Cost</h3>
												@if($courses->price=='Enquire now')
												<p>{{ $courses->price }}</p>
												@else
												<p>£{{ $courses->price }}</p>
												@endif
											</div>
											
										</div>
								</div>
								
							</div>	
						</div>



<div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
							<div class="nvq_flipbox-1 mb-30">
								<div class="nvq_flipbox_font">
										<div class="nvq_flipbox_inner-1">
											<div class="nvq_flipbox_icon">
												<img src="{{ asset('assets/images/courses/location.png') }}" alt="img" />
											</div>			
											<div class="flipbox_title">
												<h3>Location</h3>
												<p>{{ $courses->location }}</p>
											</div>
											
										</div>
								</div>
								
							</div>	
						</div>
						
						

						
									
									</div>
									
									<div class="service-details-research-button pt-4 pb-5">
									@if(Auth::user())
									@if($courses->course_type=='Courses')
									<a href="{{ url('apply_course/'.$courses->id  ) }}">Apply Now</a>
									@elseif($courses->price=='Enquire now')
									<a href="{{ url('enquire_course/'.$courses->id  ) }}">Enquire Now</a>
									@else
									@if($cart)
									<a href="{{ url('cart') }}">View Cart</a>
									@else
									<a href="{{ url('user_cart/'.$courses->id  ) }}">Buy Now</a>
									@endif
								
									
									@endif
									@else
									@if($courses->course_type=='Courses')
									<a href="{{ url('apply_course/'.$courses->id  ) }}">Apply Now</a>
									@elseif($courses->course_type=='Plumbing/Gas' && $courses->price=='Enquire now')
									<a href="{{ url('enquire_course/'.$courses->id  ) }}">Enquire Now</a>
									@elseif($courses->course_type=='NVQ Courses')
									<a href="{{ url('guest_cart/'.$courses->id  ) }}">Buy Now</a>
									@elseif($courses->course_type=='Short Courses')
									<a href="{{ url('guest_cart/'.$courses->id  ) }}">Buy Now</a>
									@elseif($courses->course_type=='Plumbing/Gas')
									<a href="{{ url('guest_cart/'.$courses->id  ) }}">Buy Now</a>
									@elseif($courses->course_type=='Electrical Courses')
									<a href="{{ url('guest_cart/'.$courses->id  ) }}">Buy Now</a>
									@elseif($courses->course_type=='CITB Courses')
									<a href="{{ url('guest_cart/'.$courses->id  ) }}">Buy Now</a>
									@else
									<a href="">Disabled</a>
									@endif
									@endif
								</div>
									</div>
								</div>
							</div>
							
						</div>

						
					
							
							

					</div>		
				</div>
				

			</div>
		</div>
	</div>




@endsection