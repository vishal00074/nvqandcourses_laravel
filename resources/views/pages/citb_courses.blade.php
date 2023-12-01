@extends('index')
@section('content')
<div class="breatcome_area d-flex align-items-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breatcome_title">
						<div class="breatcome_title_inner pb-2">
							<h2>Courses</h2>
						</div>
						<div class="breatcome_content">
							<ul>
								<li><a href="{{ url('/') }}">Home</a>  <i class="fa fa-angle-right"></i> <span>Courses</span></li>
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
	<!----- Start NVQ Flipbox Area ----->
	<!--==================================================-->
	
	<div class="flipbox_area pages pt-85 pb-70">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section_title text_center mb-55">
						<div class="section_sub_title uppercase mb-3">
							<h6>Training</h6>
						</div>
						<div class="section_main_title">
							<h1>CITB Courses</h1>
						</div>
						<div class="em_bar">
							<div class="em_bar_bg"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach($courses as $course)
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
					<div class="nvq_flipbox mb-30">
						<div class="nvq_flipbox_font">
								<div class="nvq_flipbox_inner">
									<div class="nvq_flipbox_icon">
										<div class="img-ic">
											<!--<i class="flaticon-padlock"></i>-->
											<img src="{!! ($course->icon) !!}"  />
										</div>
									</div>			
									<div class="flipbox_title">
										<h6>{{ $course->name }}</h6>
									</div>
									<div class="flipbox_desc">
										<p>{{ $course->detail_name }}</p>
									</div>
								</div>
						</div>
						<div class="nvq_flipbox_back " style="background-image:url({{ $course->image }});">
							<div class="nvq_flipbox_inner">		
								<div class="flipbox_title">
									<h3>{{ $course->description }}</h3>
								</div>
								<div class="flipbox_desc">
									<p>{{ $course->duration }}</p>
								</div>
								<div class="flipbox_button">
									<a href="{{ url('couses_detail/'.$course->slug) }}">Details<i class="fa fa-angle-double-right"></i></a>
								</div>
							</div>
						</div>
					</div>	
				</div>
				@endforeach
		
			</div>
		</div>	
	</div>
	
	<!--==================================================-->
	<!----- End NVQ Flipbox Area ----->
	<!--==================================================-->
	

	<!--==================================================-->
	<!----- Start NVQ Accordion Area ----->
	<!--==================================================-->
	<!--<div class="accordion-area about-pages">
		<div class="container-fluid">
			<div class="row">
				 <div class="col-lg-6 main-accordion-lt">
			
					<div class="acd-items acd-arrow pt-30 pb-30 mr-4">
						<div class="section_title white text_left mb-60 mt-3">
							<div class="section_sub_title uppercase mb-3">
								<h6>WHY CHOOSE US</h6>
							</div>
							<div class="section_main_title">
								<h1>We Provide World Class</h1>
								<h1>IT Solution Service</h1>
							</div>
							<div class="em_bar">
								<div class="em_bar_bg"></div>
							</div>
							
						</div>
						<div class="panel-group symb" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading mb-3">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#ac1"><i class="fa fa-check-circle"></i>
											 Best IT Solution Provider
										</a>
									</h4>
								</div>
								<div id="ac1" class="panel-collapse in">
									<div class="panel-body pl-4 pr-4">
										<p>
										  There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which
										</p>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading mb-3">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#ac2"><i class="fa fa-check-circle"></i>
											 Experienced Engineers
										</a>
									</h4>
								</div>
								<div id="ac2" class="panel-collapse collapse">
									<div class="panel-body pl-4 pr-4">
										<p>
										  There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,
										</p>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading mb-3">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#ac3"><i class="fa fa-check-circle"></i>
											 Internet Of Things
										</a>
									</h4>
								</div>
								<div id="ac3" class="panel-collapse collapse">
									<div class="panel-body pl-4 pr-4">
										<p>
										  There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div>
				<div class="col-lg-6 absod">
					<div class="single-panel">
						<div class="single-panel-thumb">
							<div class="single-panel-thumb-inner">
								<img src="assets/images/video1.jpg" alt="" />
							</div>
							<div class="main_video text_center">
								<div class="video-icon">
									<a class="video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="https://youtu.be/BS4TUd7FJSg"><i class="fa fa-play"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!----- End NVQ Accordion Area ----->
	<!--==================================================-->
	
	

	<!--==================================================-->
	<!----- Start NVQ Call Do Action Area ----->
	<!--==================================================-->
	<div class="call_do_action pt-85 pb-50 bg_color" style="background-image:url(frontend/assets/images/slider/slider-4.jpg)" >
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section_title white text_center mb-60 mt-3">
						<div class="phone_number mb-3">
						    @php
						        $contact = DB::table('contact_us')->first();
						    @endphp
							<h5>{{$contact->phone}}</h5>
						</div>
						<div class="section_main_title">
							<h1>To make requests for the</h1>
							<h1>further information</h1>
						</div>
						<div class="button three mt-40">
							<a href="{{url('/contact')}}">Join With Us<i class="fa fa-long-arrow-right"></i></a>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection   