@extends('index')
@section('content')

<div class="breatcome_area d-flex align-items-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breatcome_title">
						<div class="breatcome_title_inner pb-2">
							<h2>Blog Details</h2>
						</div>
						<div class="breatcome_content">
							<ul>
								<li><a href="index.html">Home</a> <i class="fa fa-angle-right"></i> <span>Blog Details</span></li>
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
	
	<!-- BLOG AREA -->
	<div class="blog_area blog-details-area pt-100 pb-100" id="blog">
		<div class="container">		
			<div class="row">	
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-md-12">
							<div class="blog_details">
								<div class="blog_dtl_thumb">
									<img src="{{$blog->image ?? ''}}" alt="" height="400px" />
								</div>
								
								<div class="blog_dtl_content">
									<h2></h2>
									<!-- BLOG META -->
									<div class="NVQ-blog-meta">
										<div class="NVQ-blog-meta-left">
											<span><i class="fa fa-calendar"></i>{{\Carbon\Carbon::parse($blog->created_at)->format('d-M-Y')}}</span>
										</div>	
									</div>
									<h2><b>{{$blog->title ?? ''}}</b></h2><br>
									<div class="discription">{!! $blog->description ?? '' !!}</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				

			</div>
		</div>
	</div>
	<!-- BLOG_AREA END -->
@endsection