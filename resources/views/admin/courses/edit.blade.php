@extends('admin.app')

@section('content')
<!-- Content area -->
<div class="content">
    <!-- Page length options -->
    <div class="card">
        <div class="card-header header-elements-inline s-filter">
        	<div class="col-sm-6 mb-1" align="left">
			    <h6 class="card-title"><b>EDIT - COURSES DETAILS</b></h6>
            </div>
        	<div class="col-sm-6 mb-1" align="right">
				<button type="button" class="btn btn-success btn-sm">
					<a href="{{ url('/admin/courses') }}" class="text-white"> <i class="icon-circle-left2 mr-1"></i> Back</a>
				</button>
			</div>
        </div>
        <div class="card-body"> 
            <form class="CoursesDetails" action="{{route('courses.update',$course->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Course Name</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{$course->name ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Course Detail Name</label>
                                    <input type="text" name="detail_name" class="form-control" id="detail_name" value="{{$course->detail_name ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Course Duration</label>
                                    <input type="text" name="duration" class="form-control" id="duration" value="{{$course->duration ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Course Location</label>
                                    <input type="text" name="location" class="form-control" id="location" value="{{$course->location ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Course Price</label>
                                    <input type="number" name="price" class="form-control" id="price" value="{{$course->price ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Course Description</label>
                                    <textarea name="description" class="form-control" id="description" rows="4">{{$course->description ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <h4>COURSE INFORMATION</h4>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Column 1</label>
                                    <textarea name="column1" class="form-control" id="column1">{{$course->column1 ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Column 2</label>
                                    <textarea name="column2" class="form-control" id="column2">{{$course->column2 ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Column 3</label>
                                    <textarea name="column3" class="form-control" id="column3">{{$course->column3 ?? ''}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Column 4</label>
                                    <textarea name="column4" class="form-control" id="column4">{{$course->column4 ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <h4>SEO SECTION</h4>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>SEO Title</label>
                                    <input type="text" name="seo_title" class="form-control" id="seo_title" value="{{$course->seo_title ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>SEO Keyword</label>
                                    <input type="text" name="seo_keyword" class="form-control" id="seo_keyword" value="{{$course->seo_keyword ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>SEO Description</label>
                                    <input type="text" name="seo_description" class="form-control" id="seo_description" value="{{$course->seo_description ?? ''}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="p-2">
                                <img src="{{$course->image ?? ''}}" class="rounded" height="150px" width="300px" alt=" " />
                            </div>
                            <div class="col-md-12 mt-1">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                </div>
                            </div>
                            <div class="col-md-12 mt-1">
                                <div class="form-group">
                                    <label>Serial Number</label>
                                    <input type="number" name="serial_by" class="form-control" id="serial_by" value="{{$course->serial_by ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Type</label>
                                    <select class="form-control" name="course_type" id="course_type" onchange="funTypeChange()">
                                        <option value="">Select type</option>
                                        <option value="Courses" {{$course->course_type == 'Courses' ? 'selected' : ''}}>University Courses</option>
                                        <option value="Short Courses" {{$course->course_type == 'Short Courses' ? 'selected' : ''}}>Short Courses</option>
                                        <option value="NVQ Courses" {{$course->course_type == 'NVQ Courses' ? 'selected' : ''}}>NVQ Courses</option>
                                        <option value="Plumbing/Gas" {{$course->course_type == 'Plumbing/Gas' ? 'selected' : ''}}>Plumbing/Gas Courses</option>
                                        <option value="Electrical Courses" {{$course->course_type == 'Electrical Courses' ? 'selected' : ''}}>Electrical Courses</option>
                                        <option value="CITB Courses" {{$course->course_type == 'CITB Courses' ? 'selected' : ''}}>CITB Courses</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" id="level" style="display:none;">
                                <div class="form-group">
                                    <label>Level</label>
                                    <select class="form-control levelval" name="level">
                                        <option value="">Select level</option>
                                        @foreach($level as $detail)
                                            <option value="{{$detail->id}}" {{$course->level == $detail->id ? 'selected' : ''}}>{{$detail->level}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            

                            <div class="col-md-12" id="icon" style="display:none;">
                                <img src="{{$course->icon ?? ''}}" class="rounded" height="80px" width="90px" alt=" " />
                                <div class="form-group">
                                    <label>Icon</label>
                                    <input type="file" name="icon" class="form-control" id="icon">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Select status</option>
                                        <option value="Active" {{$course->status == 'Active' ? 'selected' : ''}}>Active</option>
                                        <option value="Inactive" {{$course->status == 'Inactive' ? 'selected' : ''}}>Inactive</option>
                                    </select>
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
@endsection

@section('script')
<script src="{{asset('assets/admin/global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<script type="text/javascript">
    const ids = ['#description', '#column1', '#column2', '#column3', '#column4'];
    ids.forEach((id) => {
        ClassicEditor.create(document.querySelector(id)).catch(error => {
            console.error(error);
        });
    });
    
    function funTypeChange(){
        var selectBox = document.getElementById('course_type');
        var userInput = selectBox.options[selectBox.selectedIndex].value;
        
        if (userInput == 'NVQ Courses'){
            document.getElementById('level').style.display = 'block';
            document.getElementById('icon').style.display = 'none';
            $('.iconval option').prop('selected',false);
        }
        else if(userInput == 'Courses' || 'Short Courses' || 'Plumbing/Gas' || 'Electrical Courses' || 'CITB Courses'){
            document.getElementById('icon').style.display = 'block';
            document.getElementById('level').style.display = 'none';
            $('.levelval option').prop('selected',false);
        }
        else{
            $('.iconval option').prop('selected',false);
            $('.levelval option').prop('selected',false);
            
            document.getElementById('level').style.display = 'none';
            document.getElementById('icon').style.display = 'none';
        }
        return false;
    }
    
    $(document).ready(function(){
        var type = $('#course_type').val();
        if(type == 'NVQ Courses'){
            document.getElementById('level').style.display = 'block';
            document.getElementById('icon').style.display = 'none';
        }
        else if(type == 'Courses' || 'Short Courses' || 'Plumbing/Gas' || 'Electrical Courses' || 'CITB Courses'){
            document.getElementById('icon').style.display = 'block';
            document.getElementById('level').style.display = 'none';
        }
        else{
            document.getElementById('level').style.display = 'none';
            document.getElementById('icon').style.display = 'none';
        }
        
        jQuery.validator.addMethod("fileType", function(value, element, types) {
            if (element.files && element.files.length) {
                var extension = element.files[0].name.split('.').pop().toLowerCase();
                return types.split('|').indexOf(extension) !== -1;
            }
            return true;
        }, "Please upload file with a valid format (.jpg, .jpeg, .png).");
        
        jQuery.validator.addMethod("dimensions", function(value, element, width, height) {
            if (element.files && element.files.length) {
                var file = element.files[0];
                var img = new Image();
                img.src = window.URL.createObjectURL(file);
    
                return img.width === width && img.height === height;
            }
            return true;
        }, "Icon dimensions must be 250x250 pixels.");
        
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
                    },
                    icon: {
                        fileType: "png"
                        // dimensions: [250, 250]
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
                    image: {
                    required: "Please upload an image."
                    },
                    icon: {
                        fileType: "Please upload a valid icon image (png)."
                        // dimensions: "Icon dimensions must be 250x250 pixels."
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    });
</script>
@endsection