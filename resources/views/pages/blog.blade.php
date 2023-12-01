@extends('index')
@section('content')

<div class="breatcome_area d-flex align-items-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breatcome_title">
						<div class="breatcome_title_inner pb-2">
							<h2>Blog</h2>
						</div>
						<div class="breatcome_content">
							<ul>
								<li><a href="{{url('/')}}">Home</a> <i class="fa fa-angle-right"></i> <span>Blog</span></li>
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
	<!----- Start NVQ Blog Area ----->
	<!--==================================================-->
	<div class="blog_area pt-85 pb-65">
		<div class="container">
			<div class="row">
			    @foreach($blogs as $detail)
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="single_blog mb-4">
						<div class="single_blog_thumb pb-4">
							<a href="{{url('/blog',$detail->id)}}"><img src="{{$detail->image ?? ''}}" alt="" /></a>
						</div>
						<div class="single_blog_content pl-4 pr-4">
							<div class="NVQ_blog_meta">
								<span class="meta-date">{{\Carbon\Carbon::parse($detail->created_at)->format('d-M-Y')}}</span>
							</div>
							<div class="blog_page_title pb-1">
								<h3><a href="{{url('/blog',$detail->id)}}">{{$detail->title ?? ''}}</a></h3>
							</div>
							<div class="blog_page_button pb-4">
								<a href="{{url('/blog',$detail->id)}}">Detail <i class="fa fa-long-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<!-- start pagination -->
			<!--<div class="row">-->
			<!--	<div class="col-md-12">-->
			<!--		<div class="paginations">				-->
			<!--			<ul class="page-numbers">-->
			<!--				<li><span aria-current="page" class="page-numbers current">1</span></li>-->
			<!--				<li><a class="page-numbers" href="#">2</a></li>-->
			<!--				<li><a class="page-numbers" href="#">3</a></li>-->
			<!--				<li><a class="page-numbers" href="#">4</a></li>-->
			<!--				<li><a class="next page-numbers" href="#"><i class="fa fa-long-arrow-right"></i></a></li>-->
			<!--			</ul>-->
			<!--		</div>-->
			<!--	</div>-->
			<!--</div>-->
		</div>
	</div>

@endsection   