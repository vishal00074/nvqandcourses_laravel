@php
$courses_levels= DB::table('courses_levels')->where
('status','Active')->select('*')->orderBy('id','asc')->get();
@endphp
<div class="mobile-menu">
			<nav class="NVQ_menu">
									<ul class="clearfix" style="display:none;">
						<li><a class="active" href="{{ url('/') }}">Home</a></li>
						<li><a href="{{ url('/about') }}">About Us</a></li>
						<li><a >NVQ Courses</a>
							<ul>	
                            @foreach($courses_levels as $courses)
								<li><a href="{{ url('nvq_courses/'.$courses->slug ) }}">{{ $courses->level }}</a></li>
							@endforeach
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
							<a class="dtbtn" href="{{ url('/login') }}">Login</a>	
						</div>
						
						@else
						<div class="donate-btn-header">
							<a class="dtbtn" href="{{ url('/sign_out') }}">Signout</a>	
						</div>
						@endif
					</ul>
			</nav>
		</div>