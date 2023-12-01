@extends('admin.app')

@section('content')
<!-- Content area -->
<div class="content">
    <!-- Page length options -->
    <div class="card">
        <div class="card-header header-elements-inline s-filter">
        	<div class="col-sm-6 mb-1" align="left">
			    <h6 class="card-title"><b>Edit - Home Details</b></h6>
            </div>
        	<div class="col-sm-6 mb-1" align="right">
				<button type="button" class="btn btn-success btn-sm">
					<a href="{{ url('/admin') }}" class="text-white"> <i class="icon-circle-left2 mr-1"></i> Back</a>
				</button>
			</div>
        </div>
        <div class="card-body"> 
            <form class="CoursesDetails" action="{{url('/admin/home/post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="1">
                <h4>{{$home->title ?? ''}}</h4>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{$home->title ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" id="description" rows="4">{{$home->description ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Heading</label>
                                    <input type="text" name="heading" class="form-control" id="heading" value="{{$home->heading ?? ''}}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <h4>HOME INFORMATION</h4>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Youtube Link</label>
                                    <input type="text" name="link" class="form-control" id="link" value="{{$home->link ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Heading 1</label>
                                    <textarea name="content" class="form-control" id="content">{{$home->content ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <h4>SEO SECTION</h4>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>SEO Title</label>
                                    <input type="text" name="seo_title" class="form-control" id="seo_title" value="{{$seo->seo_title ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>SEO Keyword</label>
                                    <input type="text" name="seo_keyword" class="form-control" id="seo_keyword" value="{{$seo->seo_keyword ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>SEO Description</label>
                                    <input type="text" name="seo_description" class="form-control" id="seo_description" value="{{$seo->seo_description ?? ''}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sub-Headings</label>
                                    <input type="text" name="subheading1" class="form-control mb-2" id="subheading1" value="{{$subheading->sub_1}}">
                                    <input type="text" name="subheading2" class="form-control mb-2" id="subheading2" value="{{$subheading->sub_2}}">
                                    <input type="text" name="subheading3" class="form-control mb-2" id="subheading3" value="{{$subheading->sub_3}}">
                                    <input type="text" name="subheading4" class="form-control mb-2" id="subheading4" value="{{$subheading->sub_4}}">
                                    <input type="text" name="subheading5" class="form-control mb-2" id="subheading5" value="{{$subheading->sub_5}}">
                                    <input type="text" name="subheading6" class="form-control mb-3" id="subheading6" value="{{$subheading->sub_6}}">
                                </div>
                            </div>
                            
                            <div class="p-2">
                                <img src="{{$home->image ?? ''}}" class="rounded" height="147px" width="300px" alt=" " />
                            </div>
                            <div class="col-md-12 mt-1">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" id="submit_form">UPDATE
                                    <i class="icon-paperplane ml-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /page length options -->
</div>

<div class="content mt-2">
    <div class="card">
        <div class="card-body">
			<form class="HomeDetails" action="{{ url('admin/home/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h4>CONTACT US</h4>
                <input type="hidden" name="id" value="1">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control MonthsInTerm" id="title2" name="title2" value="{{$home->title2 ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description2" class="form-control" id="description2" >{{$home->description2 ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="p-2">
                                    <img src="{{$home->image2 ?? ''}}" class="rounded bg-info" height="150px" width="300px" alt=" " />
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image2" class="form-control" id="image2">	         			
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="p-2">
                                    <img src="{{$home->image3 ?? ''}}" class="rounded bg-info" height="150px" width="300px" alt=" " />
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image3" class="form-control" id="image3">	         			
                                </div>
                            </div>
                            <!--<div class="col-md-12">-->
                            <!--    <div class="form-group">-->
                            <!--        <label>Phone No.</label>-->
                            <!--        <input type="text" class="form-control" id="phone" name="phone" value="{{$home->phone ?? ''}}">-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary" id="submit_form">Update  <i class="icon-paperplane ml-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
	</div>
</div>



<div class="content mt-2">
    <div class="card">
		<div class="row dashboard">
			<div class="col-md-4">
                <div class="card bg-teal-400 p-3 text-center">
                    <div class="card-body">
						<div class="flip-box-content">
							<h2><a href="" data-toggle="modal" data-target="#myModal">{{ $home_choose->title ?? '' }}</a></h2>
							<p>{{ $home_choose->description ?? '' }}</p>
						</div>
					</div>
                </div>
            </div>
					
			<div class="col-md-4">
                <div class="card bg-teal-400 p-3 text-center">
                    <div class="card-body">
						<div class="flip-box-content">
							<h2><a href="" data-toggle="modal" data-target="#my_stars">{{ $home_choose1->title ?? '' }}</a></h2>
							<p>{{ $home_choose1->description ?? '' }}</p>
						</div>
					</div>
                </div>
            </div>
            
			<div class="col-md-4">
                <div class="card bg-teal-400 p-3 text-center">
                    <div class="card-body">
						<div class="flip-box-content">
							<h2><a href="" data-toggle="modal" data-target="#Qualifications">{{ $home_choose2->title ?? '' }}</a></a></h2>
							<p>{{ $home_choose2->description ?? '' }}</p>
						</div>
					</div>
                </div>
            </div>
			
		</div>
    </div>
</div>


    
    
    
    
    
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Home Choose</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="BannerA" action="{{ url('/admin/home_choose/post')}}" method="POST" align="left">
                        @csrf
                        <input type="hidden" name="id" value="{{$home_choose->id}}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Service Title</label>
                                    <input type="text" name="title" class="form-control" value="{{$home_choose->title}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control" value="{{$home_choose->description}}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" id="submit_form">UPDATE<i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <div class="modal fade" id="my_stars" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Home Choose</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="BannerB" action="{{ url('/admin/home_choose/post')}}" method="POST" enctype="multipart/form-data" align="left">
                        @csrf
                        <input type="hidden" name="id" value="{{$home_choose1->id}}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Service Title</label>
                                    <input type="text" name="title" class="form-control" value="{{$home_choose1->title}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control" value="{{$home_choose1->description}}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" id="submit_form">UPDATE<i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <div class="modal fade" id="Qualifications" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Home Choose</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <div class="modal-body">
                    <form id="BannerC" action="{{ url('/admin/home_choose/post')}}" method="POST" enctype="multipart/form-data" align="left">
                        @csrf
                        <input type="hidden" name="id" value="{{$home_choose2->id}}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Service Title</label>
                                    <input type="text" name="title" class="form-control" value="{{$home_choose2->title}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control" value="{{$home_choose2->description}}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" id="submit_form">UPDATE<i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{asset('assets/admin/global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<script type="text/javascript">
    const ids = ['#description', '#description2'];
    ids.forEach((id) => {
        ClassicEditor.create(document.querySelector(id)).catch(error => {
            console.error(error);
        });
    });
    
    $(document).ready(function(){
        jQuery.validator.addMethod("fileType", function(value, element, types) {
            if (element.files && element.files.length) {
                var extension = element.files[0].name.split('.').pop().toLowerCase();
                return types.split('|').indexOf(extension) !== -1;
            }
            return true;
        }, "Please upload file with a valid format (.jpg, .jpeg, .png).");
        
        if ($(".CoursesDetails").length > 0) {
            $(".CoursesDetails").validate({
                rules: {
                    name : "required",
                    detail_name : "required",
                    duration : "required",
                    location : "required",
                    price : "required",
                    description : "required",
                    course_type : "required",
                    status : "required",
                    image : {
                        fileType: "jpg|jpeg|png|ico|bmp"
                    }
                },
                messages: {
                    name : "Course name field is required.",
                    detail_name : "Course detail name field is required.",
                    duration : "Course duration field is required.",
                    location : "Course location field is required.",
                    price : "Price field is required.",
                    description : "Description field is required.",
                    course_type : "Type field is required.",
                    status : "Status field is required.",
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
        
        
        if ($(".HomeDetails").length > 0) {
            $(".HomeDetails").validate({
                rules: {
                    title2 : "required",
                    description2 : "required",
                    // phone : "required",
                    image3 : {
                        fileType: "jpg|jpeg|png|ico|bmp"
                    },
                    image2 : {
                        fileType: "jpg|jpeg|png|ico|bmp"
                    }
                },
                messages: {
                    title2 : "Title field is required.",
                    description2 : "Description name field is required.",
                    // phone : "Phone field is required.",
                    
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
        
        
        
        
        if ($("#BannerA").length > 0) {
            $("#BannerA").validate({
                rules: {
                    title : "required",
                    description : "required"
                },
                messages: {
                    title : "Title field is required.",
                    description : "Description name field is required."
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
        
        
        if ($("#BannerB").length > 0) {
            $("#BannerB").validate({
                rules: {
                    title : "required",
                    description : "required"
                },
                messages: {
                    title : "Title field is required.",
                    description : "Description name field is required."
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
        
        
        if ($("#BannerC").length > 0) {
            $("#BannerC").validate({
                rules: {
                    title : "required",
                    description : "required"
                },
                messages: {
                    title : "Title field is required.",
                    description : "Description name field is required."
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    });
</script>
@endsection