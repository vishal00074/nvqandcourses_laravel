@extends('admin.app')

@section('content')
<!-- Content area -->
<div class="content">
    <!-- Page length options -->
    <div class="card">
        <div class="card-header header-elements-inline s-filter">
        	<div class="col-sm-6 mb-1" align="left">
			    <h6 class="card-title"><b>Add Course Level Details</b></h6>
            </div>
        	<div class="col-sm-6 mb-1" align="right">
				<a class="btn btn-success btn-sm" href="{{ url('/admin/courses_level') }}" class="text-white"> <i class="icon-circle-left2 mr-1"></i> Back</a>
			</div>
        </div>
        <div class="card-body"> 
            <form class="CoursesLevelDetails" action="{{route('courses_level.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Level Name</label>
                                    <input type="text" name="level" class="form-control" id="level">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Level Description</label>
                                    <input type="text" name="description" class="form-control" id="description">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="row">
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
    // ClassicEditor.create(document.querySelector('#description')).catch(error => {
    //     console.error(error);
    // });
    
    $(document).ready(function(){
        if ($(".CoursesLevelDetails").length > 0) {
            $(".CoursesLevelDetails").validate({
                rules: {
                    level : "required",
                    description : "required",
                    status : "required"
                },
                messages: {
                    level : "Level name field is required.",
                    description : "Level Description field is required.",
                    status : "Status field is required."
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    });
</script>
@endsection