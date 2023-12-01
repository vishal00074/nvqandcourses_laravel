@extends('admin.app')

@section('content')
<!-- Content area -->
<div class="content">
    <!-- Page length options -->
    <div class="card">
        <div class="card-header header-elements-inline s-filter">
        	<div class="col-sm-6 mb-1" align="left">
			    <h6 class="card-title"><b>Add Course Details</b></h6>
            </div>
        	<div class="col-sm-6 text-right">
			<a class="btn btn-success btn-sm" href="{{ url('/admin/courses') }}" class="text-white"> <i class="icon-circle-left2 mr-1"></i> Back</a>
			
			</div>
        </div>
        <div class="card-body"> 
            <form class="CoursesDetails" name="CoursesDetails" action="{{route('courses.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Course Name</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Course Detail Name</label>
                                    <input type="text" name="detail_name" class="form-control" id="detail_name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Course Duration</label>
                                    <input type="text" name="duration" class="form-control" id="duration">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Course Location</label>
                                    <input type="text" name="location" class="form-control" id="location">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Course Price</label>
                                    <input type="number" name="price" class="form-control" id="price">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Course Description</label>
                                    <textarea name="description" class="form-control" id="description"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <h4>COURSE INFORMATION</h4>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Column 1</label>
                                    <textarea name="column1" class="form-control" id="column1"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Column 2</label>
                                    <textarea name="column2" class="form-control" id="column2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Column 3</label>
                                    <textarea name="column3" class="form-control" id="column3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Column 4</label>
                                    <textarea name="column4" class="form-control" id="column4"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <h4>SEO SECTION</h4>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>SEO Title</label>
                                    <input type="text" name="seo_title" class="form-control" id="seo_title">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>SEO Keyword</label>
                                    <input type="text" name="seo_keyword" class="form-control" id="seo_keyword">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>SEO Description</label>
                                    <input type="text" name="seo_description" class="form-control" id="seo_description">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Type</label>
                                    <select class="form-control" name="course_type" id="course_type" onchange="funTypeChange()">
                                        <option value="">Select type</option>
                                        <option value="Courses">University Courses</option>
                                        <option value="Short Courses">Short Courses</option>
                                        <option value="NVQ Courses">NVQ Courses</option>
                                        <option value="Plumbing/Gas">Plumbing/Gas Courses</option>
                                        <option value="Electrical Courses">Electrical Courses</option>
                                        <option value="CITB Courses">CITB Courses</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" id="level" style="display:none;">
                                <div class="form-group">
                                    <label>Level</label>
                                    <select class="form-control levelval" name="level">
                                        <option value="">Select level</option>
                                        @foreach($level as $detail)
                                            <option value="{{$detail->id}}">{{$detail->level}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" id="icon" style="display:none;">
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
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" id="submit_form">PUBLISH
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
        else if(userInput == 'Courses' || userInput == 'Short Courses' || userInput == 'Plumbing/Gas' || userInput == 'Electrical Courses' || userInput == 'CITB Courses' ){
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
    jQuery.validator.addMethod("fileType", function(value, element, types) {
        if (element.files && element.files.length) {
            var extension = element.files[0].name.split('.').pop().toLowerCase();
            return types.split('|').indexOf(extension) !== -1;
        }
        return true;
    }, "Please upload a file with a valid format (.jpg, .jpeg, .png, .ico, .bmp).");

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
                name: "required",
                detail_name: "required",
                duration: "required",
                location: "required",
                price: "required",
                description: "required",
                course_type: "required",
                status: "required",
                image: {
                    required: true,
                    fileType: "jpg|jpeg|png|ico|bmp|webp"
                },
                icon: {
                    fileType: "png",
                    // dimensions: [250, 250]
                }
            },
            messages: {
                name: "Course name field is required.",
                detail_name: "Course detail name field is required.",
                duration: "Course duration field is required.",
                location: "Course location field is required.",
                price: "Price field is required.",
                description: "Description field is required.",
                course_type: "Type field is required.",
                status: "Status field is required.",
                image: {
                    required: "Please upload an image."
                },
                icon: {
                    fileType: "Please upload a valid icon image (png).",
                    dimensions: "Icon dimensions must be 250x250 pixels."
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