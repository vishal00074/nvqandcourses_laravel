@extends('index')
@section('content')

@php
    $heading =DB::table('headers')->select('*')->where('type', 'homepage')->get();
   
@endphp
	<!--==================================================-->
	<!----- End NVQ Main Menu Area ----->
	<!--==================================================-->
	
	<!--==================================================-->
	<!----- Start NVQ Slider Area ----->
	<!--==================================================-->
	<section class="slider">
            <div class="rev_slider_wrapper">
                <div id="rev_slider_1" class="rev_slider" data-version="5.4.5" style="display:none">
                    <ul>
                    <!-- MINIMUM SLIDE STRUCTURE -->
					@foreach($heading as $first_heading)	
                        <li data-transition="random-premium" data-masterspeed="1000">

                            <!-- SLIDE'S MAIN BACKGROUND IMAGE -->
                            <img src="{{ asset('frontend/assets/images/slider/slider-1.jpg') }}" alt="Sky" class="rev-slidebg">
                            <div class="tp-caption tp-resizeme normalWraping" 

                                 data-frames='[{"delay":1200,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
                                 {"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' 

                                 data-x="center" 
                                 data-y="center" 
                                 data-hoffset="0" 
                                 data-voffset="['-80']" 
                                 data-width="['850', '800', '700', '100%']"
                                 data-height="['auto]"
                                 data-whitesapce="['normal']"
                                 data-fontsize="['45', '40', '35', '30']"
                                 data-lineheight="['45', '40', '35', '30']"
                                 data-fontweight="['700']"
                                 data-color="['#FFF']"
                                 data-textAlign="['center', 'center', 'center', 'center']"
                                 data-paddingtop="[0,0,0,0]"
                                 data-paddingright="[0,0,0,20]"
                                 data-paddingbottom="[0,0,0,0]"
                                 data-paddingleft="[0,10,0,20]"
                                 >{{ $first_heading->title }}</div>
                            <div class="tp-caption text-center tp-resizeme normalWraping" 

                                 data-frames='[{"delay":1500,"speed":2000,"frame":"0","from":"y:0px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
                                 {"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' 

                                 data-x="center" 
                                 data-y="center" 
                                 data-hoffset="0" 
                                 data-voffset="['0', '20', '20', '25']"
                                 data-width="['650', '650', '700', '100%']"
                                 data-height="['auto]"
                                 data-whitesapce="['normal']"
                                 data-fontsize="['20', '20', '20', '20']"
                                 data-lineheight="['26', '26', '26', '26']"
                                 data-fontweight="['300']"
                                 data-color="['#FFF']"
                                 data-textAlign="['center', 'center', 'center', 'center']"
                                 data-paddingtop="[0,0,0,0]"
                                 data-paddingright="[0,0,0,20]"
                                 data-paddingbottom="[0,0,0,0]"
                                 data-paddingleft="[0,10,0,20]"
                                 >{!! ($first_heading->description) !!}</div>
                            <div class="tp-caption text-center tp-resizeme normalWraping" 

                                 data-frames='[{"delay":1800,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
                                 {"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' 

                                 data-x="center"
                                 data-y="center" 
                                 data-hoffset="0" 
                                 data-voffset="['89', '89', '89', '140']"
                                 data-width="['650', '100%', '700', '100%']"
                                 data-height="['auto]"
                                 data-whitesapce="['normal']"

                                 data-fontsize="16"
                                 data-lineheight="['30', '30', '30', '30']"
                                 data-fontweight="500"
                                 data-textAlign="['center', 'center', 'center', 'center']"
                                 data-paddingtop="[0,0,0,0]"
                                 data-paddingright="[0,0,0,20]"
                                 data-paddingbottom="[0,0,0,0]"
                                 data-paddingleft="[0,10,0,20]"
                                 ><a href="#nvq_courses" class="vor_btn_1 mr13">NVQ</a><a href="#courses" class="vor_btn_2 vb_reverse">COURSES</a></div>
                        </li>
						@endforeach
                        <!-- MINIMUM SLIDE STRUCTURE -->
                    </ul><!-- END SLIDES LIST -->
                </div>
            </div>
        </section>
	<!--==================================================-->
	<!----- End NVQ Slider Area ----->
	<!--==================================================-->
	
	<!--==================================================-->
	<!----- Start NVQ  Feature New Style ----->
	<!--==================================================-->
	<div class="feature_area pt-100">
		<div class="container">
					<div class="row">
				<!-- Start Section Tile -->
				<div class="col-lg-12">
					<div class="section_title text_center mb-50 mt-3" id="nvq_courses">
						<div class="section_sub_title uppercase mb-3">
							<h6>Trending</h6>
						</div>
						<div class="section_main_title">
							<h1>NVQ <span>COURSES</span></h1>
						</div>
						<div class="em_bar">
							<div class="em_bar_bg"></div>
						</div>
						
					</div>
					
				</div>
			</div>
			<div class="row">
				@foreach($courses_levels as $courses_level)
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="feature_style_eight mb-30 wow flipInY" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="feature_style_eight_content">
							<div class="feature_style_eight_icon">
								<div class="icon">
									<i class="flaticon-chart"></i>
								</div>
								<div class="anim-icon">
                                    <span class="icon icon-1"></span>
                                    <span class="icon icon-2"></span>
                                    <span class="icon icon-3"></span>	
                                </div>
							</div>
							<div class="feature_style_eight_title pt-4">
								<h4><a href="{{ url('nvq_courses/'.$courses_level->slug ) }}">NVQ {{ $courses_level->level }}</a></h4>
							</div>
							<div class="feature_style_eight_text pt-15">
								<p>{{ $courses_level->description }} </p>
							</div>
							<div class="feature_style_eight_button pt-3">
								<div class="button style-four">
									<a href="{{ url('nvq_courses/'.$courses_level->slug ) }}">Details</a>
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
	<!----- End NVQ  Feature New Style ----->
	<!--==================================================-->
	<!--==================================================-->
	<!----- Start NVQ About Area ----->
	<!--==================================================-->
	<div class="about_area pt-85 pb-70">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
					<div class="about_thumb">
                        <img src="{{ $home->image ?? '' }}" alt="About Image">
                    </div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
					<div class="section_title text_left mb-10 mt-3">
						<div class="section_sub_title uppercase mb-3">
							<!-- <h6>30 YEARS OF EXPERIENCE</h6> -->
						</div>
						<div class="section_main_title">
							<h1>{{ $home->title ?? '' }}</h1>
						</div>
						<div class="em_bar">
							<div class="em_bar_bg"></div>
						</div>
						<div class="section_content_text bold pt-4">
							{!! strip_tags($home->description ?? '') !!}
						</div>
						
					</div>
					<div class="singel_about_left mb-30">
					<h4 class="mb-10">{{ $home->heading ?? '' }}</h4>
						<div class="singel_about_left_inner mb-3">
                            <div class="em-about-icon-box2 ml-4">
                                <ul>
                                    @php
                                        $subheadings = json_decode($home->subheadings, true);
                                    @endphp
                            
                                    @foreach ($subheadings as $key => $subheading)
                                        <li>{{ $subheading }}</li>
                                    @endforeach
                                </ul>
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

	
	<!----- Start NVQ Call Do Action Area ----->
	<!--==================================================-->
	<div class="call_do_action pt-85 pb-120 bg_color" style="background-image:url({{$home->image2 ?? ''}})" >
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section_title white text_center mb-60 mt-3">
						<div class="single-video mb-50">
						<div class="video-icon">
							<a class="video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="{{$home->link ?? ''}}"><i class="fa fa-play"></i></a>
						</div>
					</div>
						<div class="section_main_title">
						<div class="row">
						<div class="col-lg-1"></div>
				<div class="col-lg-10">
							<h2>{!! $home->content ?? '' !!}</h2>
						</div></div></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!----- End NVQ Call Do Action Area ----->
	<!--==================================================-->
	
	<!--==================================================-->
	<!----- Start NVQ Flipbox Area ----->
	<!--==================================================-->
	
	@php
	    $contentA = DB::table('home_coose')->where('id','LIKE','1')->first();
	    $contentB = DB::table('home_coose')->where('id','LIKE','2')->first();
	    $contentC = DB::table('home_coose')->where('id','LIKE','3')->first();
	@endphp
	<div class="flipbox_area pb-70">
		<div class="container">
			<div class="row nagative_margin">
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
					<div class="flip-box">
					  <div class="flip-box-inner">
						<div class="flip-box-front">
							<div class="flipbox-icon">
								<div class="icon">
									<i class="flaticon-global"></i>
								</div>
							</div>
							<div class="flip-box-content">
								<h2>{{$contentA->title ?? ''}}</h2>
								<p>{{$contentA->description ?? ''}}</p>
							</div>
						</div>
						<div class="flip-box-back">
						<div class="flipbox-icon">
								<div class="icon">
									<i class="flaticon-global"></i>
								</div>
							</div>
							<div class="flip-box-back-content">
								<h2>{{$contentA->title ?? ''}}</h2>
								<p>{{$contentA->description ?? ''}}</p>
								<!--<a href="#">Read More</a>-->
							</div>
						</div>
					  </div>
					</div>	
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
					<div class="flip-box">
					  <div class="flip-box-inner">
						<div class="flip-box-front">
							<div class="flipbox-icon">
								<div class="icon">
									<i class="flaticon-developer"></i>
								</div>
							</div>
							<div class="flip-box-content">
								<h2>{{$contentB->title ?? ''}}</h2>
								<p>{{$contentB->description ?? ''}}</p>
							</div>
						</div>
						<div class="flip-box-back">
						<div class="flipbox-icon">
								<div class="icon">
									<i class="flaticon-developer"></i>
								</div>
							</div>
							<div class="flip-box-back-content">
								<h2>{{$contentB->title ?? ''}}</h2>
								<p>{{$contentB->description ?? ''}}</p>
								<!--<a href="#">Read More</a>-->
							</div>
						</div>
					  </div>
					</div>	
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-6">
					<div class="flip-box">
					  <div class="flip-box-inner">
						<div class="flip-box-front">
							<div class="flipbox-icon">
								<div class="icon">
									<i class="flaticon-process"></i>
								</div>
							</div>
							<div class="flip-box-content">
								<h2>{{$contentC->title ?? ''}}</h2>
								<p>{{$contentC->description ?? ''}}</p>
							</div>
						</div>
						<div class="flip-box-back">
						<div class="flipbox-icon">
								<div class="icon">
									<i class="flaticon-process"></i>
								</div>
							</div>
							<div class="flip-box-back-content">
								<h2>{{$contentC->title ?? ''}}</h2>
								<p>{{$contentC->description ?? ''}}</p>
								<!--<a href="#">Read More</a>-->
							</div>
						</div>
					  </div>
					</div>	
				</div>
				
			</div>
		</div>	
	</div>
	
	<!--==================================================-->
	<!----- End NVQ Flipbox Area ----->
	<!--==================================================-->
	
	<!--==================================================-->
	<!----- Start NVQ Service Area ----->
	<!--==================================================-->
	<div class="service_area pb-100">
		<div class="container">
			<div class="row">
				<!-- Start Section Tile -->
				<div class="col-lg-12">
					<div class="section_title text_center mb-50 mt-3">
						<div class="section_sub_title uppercase mb-3">
							<h6>Our Courses</h6>
						</div>
						<div class="section_main_title" id="courses">
							<h1>What We <span>Provide</span></h1>
						</div>
						<div class="em_bar">
							<div class="em_bar_bg"></div>
						</div>
						
					</div>
					
				</div>
			</div>
			<div class="row">
				<!--Service owl curousel -->
				<div class="service_list owl-carousel curosel-style">
					@foreach($courses as $detail)
					<div class="col-lg-12">
						<div class="service_style_12">
							<div class="service_style_12_thumb">
								<a href="{{url('/couses_detail',$detail->slug)}}"><img src="{{$detail->image}}" alt=" " /></a>
							</div>
							<div class="service_style12_content">
								<div class="service_style_12_icon">
									<div class="icon">
										<i class="flaticon-algorithm"></i>
									</div>
								</div>
								<div class="service_style_12_content_inner">
									<h2><a href="{{url('/couses_detail',$detail->slug)}}">{{$detail->name ?? ''}}</a></h2>
									<p>{{$detail->detail_name ?? ''}}</p>
									<a href="{{url('/couses_detail',$detail->slug)}}">Details +</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!----- End NVQ Service Area ----->
	<!--==================================================-->
	
	<!--==================================================-->
	<!----- Start NVQ Call Do Action Two Area ----->
	<!--==================================================-->
	<div class="call_do_action-2 pt-85 bg_color" style="background-image:url({{ asset('frontend/assets/images/call-bg.gif') }})" >
		<div class="container">
			<div class="row align-items-center">
				@php
				    $contact = DB::table('contact_us')->select('*')->first();
				    $phone = DB::table('footer')->select('*')->first();
				@endphp
				<div class="col-lg-6">
					<div class="section_title white text_left mb-60 mt-3">
						<div class="phone_number mb-3">
							<h3>{{$phone->phone ?? ''}}</h3>
						</div>
						<div class="section_main_title">
							<h1>{{$home->title2 ?? ''}}</h1>
							<!--<h1>contact with us</h1>-->
							<p class="pt-20">{!!($home->description2 ?? '')!!}</p>
						</div>
						<div class="button three mt-40">
							<a href="{{url('/contact')}}">Contact Now<i class="fa fa-long-arrow-right"></i></a>
						</div>
						
					</div>
				</div>
				<div class="col-lg-6">
					<div class="call_do_thumb">
						<img src="{{$home->image3 ?? ''}}" alt="" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!----- End NVQ Call Do Action Two Area ----->
	<!--==================================================-->
	
	<!--==================================================-->
	<!----- Start NVQ Case Study Area ----->
	<!--==================================================-->
	<!--<div class="case_study_area pt-80 four" id="portfolio">
		<div class="container-fluid">
			<div class="row">
				
				<div class="col-lg-12">
					<div class="section_title text_center mb-50 mt-3">
						
						<div class="section_sub_title uppercase mb-3">
							<h6>Trending</h6>
						</div>
						<div class="section_main_title">
							<h1><span>Find The</span> Best Courses</h1>
						</div>
						<div class="em_bar">
							<div class="em_bar_bg"></div>
						</div>
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 grid-item">
					<div class="row">
					
						<div class="case_study_list3 owl-carousel curosel-style">
						
							<div class="col-lg-12 pdn_0">
								<div class="single_case_study">
									<div class="single_case_study_inner">
										<div class="single_case_study_thumb">
											<a href="case-study-details.html"><img src="{{ asset('frontend/assets/images/new/case1.jpg') }}" alt="" /></a>
										</div>
									</div>
									<div class="single_case_study_content">
										<div class="single_case_study_content_inner">
											<h2><a href="case-study-details.html">Education And Training</a></h2>
											<span>Teacher</span>
										</div>
									</div>
								</div>
							</div>
						
							<div class="col-lg-12 pdn_0">
								<div class="single_case_study">
									<div class="single_case_study_inner">
										<div class="single_case_study_thumb">
											<a href="case-study-details.html"><img src="{{ asset('frontend/assets/images/new/case2.jpg') }}" alt="" /></a>
										</div>
									</div>
									<div class="single_case_study_content">
										<div class="single_case_study_content_inner">
											<h2><a href="case-study-details.html">Business and Management Studies</a></h2>
											<span>IT Server</span>
										</div>
									</div>
								</div>
							</div>
					
							<div class="col-lg-12 pdn_0">
								<div class="single_case_study">
									<div class="single_case_study_inner">
										<div class="single_case_study_thumb">
											<a href="case-study-details.html"><img src="{{ asset('frontend/assets/images/new/case3.jpg') }}" alt="" /></a>
										</div>
									</div>
									<div class="single_case_study_content">
										<div class="single_case_study_content_inner">
											<h2><a href="case-study-details.html">Information NVQlogy</a></h2>
											<span>IT Server</span>
										</div>
									</div>
								</div>
							</div>
							
						
							<div class="col-lg-12 pdn_0">
								<div class="single_case_study">
									<div class="single_case_study_inner">
										<div class="single_case_study_thumb">
											<a href="case-study-details.html"><img src="{{ asset('frontend/assets/images/new/case4.jpg') }}" alt="" /></a>
										</div>
									</div>
									<div class="single_case_study_content">
										<div class="single_case_study_content_inner">
											<h2><a href="case-study-details.html">Travel, Tourism and Hospitality Management</a></h2>
											<span>It Solution</span>
										</div>
									</div>
								</div>
							</div>
						
							<div class="col-lg-12 pdn_0">
								<div class="single_case_study">
									<div class="single_case_study_inner">
										<div class="single_case_study_thumb">
											<a href="case-study-details.html"><img src="{{ asset('frontend/assets/images/new/case1.jpg') }}" alt="" /></a>
										</div>
									</div>
									<div class="single_case_study_content">
										<div class="single_case_study_content_inner">
											<h2><a href="case-study-details.html">Health and Social Care</a></h2>
											<span>Branding</span>
										</div>
									</div>
								</div>
							</div>
						
							<div class="col-lg-12 pdn_0">
								<div class="single_case_study">
									<div class="single_case_study_inner">
										<div class="single_case_study_thumb">
											<a href="case-study-details.html"><img src="{{ asset('frontend/assets/images/new/case3.jpg') }}" alt="" /></a>
										</div>
									</div>
									<div class="single_case_study_content">
										<div class="single_case_study_content_inner">
											<h2><a href="case-study-details.html">Centre for Research and Enterprise Development</a></h2>
											<span>Design, Photoshop</span>
										</div>
									</div>
								</div>
							</div>
							
							
							<div class="col-lg-12 pdn_0">
								<div class="single_case_study">
									<div class="single_case_study_inner">
										<div class="single_case_study_thumb">
											<a href="case-study-details.html"><img src="{{ asset('frontend/assets/images/new/case3.jpg') }}" alt="" /></a>
										</div>
									</div>
									<div class="single_case_study_content">
										<div class="single_case_study_content_inner">
											<h2><a href="case-study-details.html">Business Accounting and Finance </a></h2>
											<span>IT Server</span>
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
	<!--==================================================-->
	<!----- End NVQ Case Study Area ----->
	<!--==================================================-->
	

	<!--==================================================-->
	<!----- Start NVQ Testimonial Area ----->
	<!--==================================================-->
	<!--<div class="testimonial_area pt-80 pb-100">
		<div class="container">
			<div class="row">
				 Start Section Tile 
				<div class="col-lg-12">
					<div class="section_title text_center mb-50 mt-3">
						<div class="section_sub_title uppercase mb-3">
							<h6>TESTIMONIAL</h6>
						</div>
						<div class="section_main_title">
							<h1>Our Happy Customers</h1>
						</div>
						<div class="em_bar">
							<div class="em_bar_bg"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="testimonial_list2 owl-carousel curosel-style">
					<div class="testimonial_style_three d-flex">
						<div class="testimonial_style_three_thumb">
							<img src="{{ asset('frontend/assets/images/testi/t1.jpg') }}" alt="" />
						</div>
						<div class="testimonial_style_three_content">	
							<div class="testimonial_style_three_title">
								<h4>Sayma Tanjim Nokshi</h4>
								<span>IT Solutions</span>
							</div>
							<div class="testimonial_style_three_text pt-4">
								<p>Lorem ipsum dolor sit consectetur adipicing elit send do usmod tempor incididunt.enim minim veniam quis nostrud exer citation laboris nisi aliqu commodo perspicia NVQ template is great for desing.</p>
							</div>
							<div class="testimonial_style_three_reviwer_star">
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
							</div>
							<div class="testimonial_style_three_quote mt-4">
								<i class="fa fa-quote-left"></i>
							</div>
						</div>
					</div>
					<div class="testimonial_style_three d-flex">
						<div class="testimonial_style_three_thumb">
							<img src="{{ asset('frontend/assets/images/testi/t2.jpg') }}" alt="" />
						</div>
						<div class="testimonial_style_three_content">	
							<div class="testimonial_style_three_title">
								<h4>Hossen Babu Orfe Hira</h4>
								<span>IT Solutions</span>
							</div>
							<div class="testimonial_style_three_text pt-4">
								<p>Lorem ipsum dolor sit consectetur adipicing elit send do usmod tempor incididunt.enim minim veniam quis nostrud exer citation laboris nisi aliqu commodo perspicia NVQ template is great for desing.</p>
							</div>
							<div class="testimonial_style_three_reviwer_star">
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
							</div>
							<div class="testimonial_style_three_quote mt-4">
								<i class="fa fa-quote-left"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>-->
	<!--==================================================-->
	<!----- End NVQ Testimonial Area ----->
	<!--==================================================-->

	<!--==================================================-->
	<!----- Start NVQ Blog Area ----->
	<!--==================================================-->
	<!--<div class="blog_area pt-85 pb-65 bg_color2">-->
	<!--	<div class="container">-->
	<!--		<div class="row">-->
	<!--			<div class="col-lg-9">-->
	<!--				<div class="section_title text_left mb-60 mt-3">-->
	<!--					<div class="section_sub_title uppercase mb-3">-->
	<!--						<h6>LATEST ARTICLE</h6>-->
	<!--					</div>-->
	<!--					<div class="section_main_title">-->
	<!--						<h1>Our Blog Post</h1>-->
	<!--					</div>-->
	<!--					<div class="em_bar">-->
	<!--						<div class="em_bar_bg"></div>-->
	<!--					</div>-->
	<!--				</div>-->
	<!--			</div>-->
	<!--			<div class="col-lg-3">-->
	<!--				<div class="section_button mt-50">-->
	<!--					<div class="button two">-->
	<!--						<a href="{{url('/blog')}}">See All Blogs</a>-->
	<!--					</div>-->
	<!--				</div>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--		<div class="row">-->
	<!--		    @foreach($blogs as $detail)-->
	<!--			<div class="col-lg-4 col-md-6 col-sm-12">-->
	<!--				<div class="single_blog mb-4">-->
	<!--					<div class="single_blog_thumb">-->
	<!--						<a href="{{url('/blog',$detail->id)}}"><img src="{{$detail->image ?? ''}}" alt="" /></a>-->
	<!--					</div>-->
	<!--					<div class="single_blog_content pt-4 pl-4 pr-4">-->
	<!--						<div class="NVQ_blog_meta">-->
							
	<!--							<span class="meta-date">{{\Carbon\Carbon::parse($detail->created_at)->format('d-M-Y')}}</span>-->
	<!--						</div>-->
	<!--						<div class="blog_page_title pb-1">-->
	<!--							<h3><a href="{{url('/blog',$detail->id)}}">{{$detail->title ?? ''}}</a></h3>-->
	<!--						</div>-->
	<!--						<div class="blog_page_button pb-4">-->
	<!--							<a href="{{url('/blog',$detail->id)}}">Detail<i class="fa fa-long-arrow-right"></i></a>-->
	<!--						</div>-->
	<!--					</div>-->
	<!--				</div>-->
	<!--			</div>-->
	<!--			@endforeach-->
	<!--		</div>-->
	<!--	</div>-->
	<!--</div>-->
@endsection