@php
    $links = DB::table('social_links')->select('*')->first();
    $contact = DB::table('footer')->select('*')->first();
    $courses_levels= DB::table('courses_levels')->where('status','Active')->select('*')->orderBy('id','asc')->get();
@endphp

<div class="container">
	<div class="row">
		<div class="col-lg-4 col-md-6 col-sm-12">
			<div class="widget widgets-company-info">
				<div class="footer-bottom-logo pb-10">
					<a href="{{url('/')}}"><img src={{$contact->logo ?? ''}} alt="" /></a>
				</div>
				<div class="company-info-desc">
					<p>{!!($contact->description ?? '')!!}</p>
				</div>
				<div class="follow-company-info pt-3">
					<div class="follow-company-text mr-3">
						<a><p>Follow Us</p></a>
					</div>
					<div class="follow-company-icon">
						<a href="{{$links->facebook ?? ''}}"><i class="fa fa-facebook"></i></a>
						<a href="{{$links->twitter ?? ''}}"><i class="fa fa-twitter"></i></a>
						<a href="{{$links->pinterest ?? ''}}"><i class="fa fa-pinterest"></i></a>
						<a href="{{$links->linkedIn ?? ''}}"><i class="fa fa-linkedin"></i></a>
					</div>
				</div>
			</div>					
		</div>
		<div class="col-lg-2 col-md-6 col-sm-12">
			<div class="widget widget-nav-menu">
				<h4 class="widget-title pb-4">Quik Links</h4>
				<div class="menu-quick-link-container ml-4">
					<ul id="menu-quick-link" class="menu">
						<li><a href="{{url('/')}}">Home</a></li>
						<li><a href="{{url('/about')}}">About Us</a></li>
						<li><a href="{{url('/courses')}}">Courses</a></li>
						<!--<li><a href="{{url('/blog')}}">Blog</a></li>-->
						<li><a href="{{url('/contact')}}">Contact</a></li>
						<li><a href="{{url('/policy')}}">Privacy Policy</a></li>
						<li><a href="{{url('/terms')}}"> Terms & Conditions</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="col-lg-2 col-md-6 col-sm-12">
			<div class="widget widget-nav-menu">
				<h4 class="widget-title pb-4">NVQ Courses</h4>
				<div class="menu-quick-link-container ml-4">
					<ul id="menu-quick-link" class="menu">
						@foreach($courses_levels as $courses)
							<li><a href="{{ url('nvq_courses/'.$courses->slug ) }}">{{ $courses->level }}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		
		<div class="col-lg-4 col-md-6 col-sm-12">
			<div class="widget widgets-company-info">
				<h3 class="widget-title pb-4">{{$contact->title ?? ''}}</h3>
				<div class="company-info-desc">
					
				</div>	
				<div class="footer-social-info add">
					<p><span><i class="fa fa-map-marker"></i></span><a href="https://www.google.com/maps/search/?q={{urlencode($contact->address ?? '')}}" target="_blank">{{$contact->address ?? ''}}</a></p>
				</div>
				<div class="footer-social-info phn">
					<p><span><i class="fa fa-phone"></i></span> <a href="tel:{{$contact->phone ?? ''}}"> {{$contact->phone ?? ''}}</a></p>
				</div>
				<div class="footer-social-info">
					<p><span><i class="fa fa-envelope-o"></i></span><a href="mailto:{{$contact->email ?? ''}}"> {{$contact->email ?? ''}}</a></p>
				</div>
				
			</div>					
		</div>
		
		
	</div>
	<div class="row footer-bottom mt-70 pt-3 pb-1">
		<div class="col-lg-12 col-md-12">
			<div class="footer-bottom-content">
				<div class="footer-bottom-content-copy text-center">
					<p>{{$contact->copyright ?? ''}} </p>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6">
			<div class="footer-bottom-right">
				<!--<div class="footer-bottom-right-text">-->
				<!--	<a class="absod" href="#">Privacy Policy </a>-->
				<!--	<a href="#"> Terms & Conditions</a>-->
				<!--</div>-->
			</div>
		</div>
	</div>
	</div>

@php
    $number = str_replace(' ', '', $contact->phone);
@endphp

<div class="call desktop"><a href="tel:+44 7447 133450" target="_blank">
<img src="../frontend/assets/images/telephone.png" alt="whatsapp" class="whatsapp"></a></div>

<div class="call mobile"><a href="tel:+44 7447 133450" target="_blank">
<img src="../frontend/assets/images/telephone.png" alt="whatsapp" class="whatsapp"></a></div>

<div class="whtsapp desktop"><a href="https://web.whatsapp.com/send?phone={{$number}}&amp;text=Welcome to NVQ Courses. How may we Help You? " 
target="_blank" onclick="ga('create','UA-203669152-1'); ga('send', 'event', 'category-whatsapp', 'action-whatsapp', 'label-whatsapp', 1);">
<img src="../frontend/assets/images/whtsapp.png" alt="whatsapp" class="whatsapp"></a></div>

<div class="whtsapp mobile"><a href="https://api.whatsapp.com/send?phone={{$number}}&amp;text=Welcome to NVQ Courses. How may we Help You? " 
target="_blank" onclick="ga('create','UA-203669152-1'); ga('send', 'event', 'category-whatsapp', 'action-whatsapp', 'label-whatsapp', 1);">
<img src="../frontend/assets/images/whtsapp.png" alt="whatsapp" class="whatsapp"></a></div>