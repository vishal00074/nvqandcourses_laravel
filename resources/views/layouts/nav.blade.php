@php
$courses_levels= DB::table('courses_levels')->where
('status','Active')->select('*')->orderBy('id','asc')->get();
@endphp
<div class="container">
			<div class="row align-items-center">
				<div class="menu">
					<a href="{{url('/')}}" class="logo"><img class="down" src="{{ asset('frontend/assets/images/1.png') }}" alt=""> <img class="main_sticky" src="{{ asset('frontend/assets/images/1.png') }}" alt=""></a>
					<ul class="clearfix">
						<li><a  href="{{ url('/') }}">Home</a></li>
						<li><a href="{{ url('/about') }}">About Us</a></li>
						<li><a><span>NVQ Courses </span><i class="fa fa-angle-down"></i></a>
							<ul>
							<div class="inner-menu">
							@foreach($courses_levels as $courses)
							<li><a href="{{ url('nvq_courses/'.$courses->slug ) }}">{{ $courses->level }}</a></li>
							@endforeach
							</div>
							</ul>
						</li>
						
						<li><a href="{{ url('/electrical_courses') }}">Electrical Courses</a></li>
						<li><a href="{{ url('/plumbing_courses') }}">Plumbing/Gas  Courses</a></li>
						<li><a href="{{ url('/courses') }}">University Courses</a></li>
						<li><a href="{{ url('/short_courses') }}">Short  Courses</a></li>
						<li><a href="{{ url('/citb_courses') }}">CITB Courses</a></li>
						
						
						<!--<li><a href="{{ url('/blog') }}">Blog</a></li>-->
						<li><a href="{{ url('/contact') }}">Contact</a></li>
						@guest

                        @else
                        
                        @php
                            $count = DB::table('carts')->where('user_id','LIKE',auth()->user()->id)->where('status','0')->count();
                        @endphp
                        <li class="cart-menu"><a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i><span>{{$count}}</span></a></li>
                        <li class="cart-menu"><a href="{{ url('/profile') }}"><i class="fa fa-user"></i></a></li>
                        @endif

						@guest
						<div class="donate-btn-header">
							<a class="dtbtn" href="{{ url('/register') }}">Register</a>	
						</div>
						<div class="donate-btn-header">
							<a class="dtbtn" href="{{ url('/login') }}">Login</a>	
						</div>
						@else
						<div class="donate-btn-header">
							<a class="dtbtn" href="{{ url('/sign_out') }}">Signout</a>	
						</div>
						@endif
					</ul>
				</div>
			</div>
		</div>
		
	