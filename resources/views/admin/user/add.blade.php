@extends('admin.app')

@section('content')
<!-- Content area -->
<div class="content">
    <!-- Page length options -->
    <div class="card">
        <div class="card-header header-elements-inline s-filter">
        	<div class="col-sm-6 mb-1" align="left">
			    <h6 class="card-title"><b>ADD - USER DETAILS</b></h6>
            </div>
        	<div class="col-sm-6 mb-1" align="right">
				<button type="button" class="btn btn-success btn-sm">
					<a href="{{ url('/admin/users') }}" class="text-white"> <i class="icon-circle-left2 mr-1"></i> Back</a>
				</button>
			</div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
			@elseif(session('error'))
				<div class="alert alert-danger" role="alert">
                    {{session('error')}}
                </div>
            @endif
            <form class="PasswordDetails" action="{{route('users.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="">Select gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile No.</label>
                                    <input type="text" name="phone" class="form-control" id="phone">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                    <i class="icon-eye text-muted" id="Passwordtoggle"></i>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="cpassword" class="form-control" id="cpassword">
                                    <i class="icon-eye text-muted" id="Passwordtoggle2"></i>
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

<script type="text/javascript">
    $(document).ready(function(){
        $('#Passwordtoggle').on('click',function(){
            if($('#password').attr("type")==="password"){
                $("#Passwordtoggle").attr('class','icon-eye-blocked text-muted');
                $('#password').attr("type","text");
            }else{
                $("#Passwordtoggle").attr('class','icon-eye text-muted');
                $('#password').attr("type","password");
            }
        });
        
        $('#Passwordtoggle2').on('click',function(){
            if($('#cpassword').attr("type")==="password"){
                $("#Passwordtoggle2").attr('class','icon-eye-blocked text-muted');
                $('#cpassword').attr("type","text");
            }else{
                $("#Passwordtoggle2").attr('class','icon-eye text-muted');
                $('#cpassword').attr("type","password");
            }
        });
        
        if ($(".PasswordDetails").length > 0) {
            $(".PasswordDetails").validate({
                rules: {
                    name : "required",
                    email : "required",
                    phone : {
                        required : true,
                        maxlength : 10,
                        minlength : 10
                    },
                    gender : "required",
                    password : {
                        required: true,
                        minlength: 6,
                        strongPassword: true
                    },
                    cpassword: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                    name : "Name field is required.",
                    email : "Email field is required.",
                    phone : {
                        required : "Mobile no. field is required.",
                        maxlength : "Length should be upto 10 digits.",
                        minlength : "Length should be upto 10 digits."
                    },
                    gender : "Gender field is required.",
                    password: {
                        required: "This field is required",
                        minlength: "New Password length must be minimum 6 letters."
                    },
                    cpassword: {
                        required: "This field is required",
                        equalTo: "The confirm password must same as new password."
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
        
        $.validator.addMethod("strongPassword", function(value, element) {
            return this.optional(element) || /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/.test(value);
        }, "The password must contain at least one uppercase letter, one digit, and one special character.");
    });
</script>
@endsection