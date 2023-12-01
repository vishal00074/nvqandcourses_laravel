@extends('admin.app')

@section('content')
<!-- Content area -->
<div class="content">
    <!-- Page length options -->
    <div class="card">
        <div class="card-header header-elements-inline s-filter">
        	<div class="col-sm-6 mb-1" align="left">
			    <h6 class="card-title"><b>Enrolled Courses Details</b></h6>
            </div>
        	<div class="col-sm-6 text-right" align="right">
				<a  class="btn btn-success btn-sm" href="{{ url('/admin/enrolled_courses') }}" class="text-white"> <i class="icon-circle-left2 mr-1"></i> Back</a>
				
			</div>
        </div>
        
        @php
            $user = DB::table('users')->where('id',$data->user_id)->first();
            $courses = DB::table('courses')->where('id',$data->course_id)->first();
        @endphp
        
        <div class="row">
            <div class="col-md-8 p-3">
                <div>
                    <h5>TRANSACTION ID &nbsp; : &nbsp; {{$data->transection_id ?? ''}}</h5>
                    <div>
                        <i class="icon-calendar"></i> &nbsp;&nbsp; Date &nbsp;: <span class="mt-2 m-2">{{\Carbon\Carbon::parse($data->created_at)->format('d-M-Y')}}</span><br>
                    </div>
                </div>
                
                <div class="table-responsive mt-3">
                    <table class="table">
                        <thead  class="table-primary">
                            <tr>
                                <th>COURSE IMAGE</th>
                                <th>COURSE NAME</th>
                                <th>PRICE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payment as $detail)
                                @php
                                    $courses = DB::table('courses')->where('id',$detail->course_id)->first();
                                @endphp
                                <tr>
                                    <td><img src="{{$courses->image}}" height="60px" width="60px" class="rounded" alt="no image"></td>
                                    <td>{{$courses->name}}</td>
                                    <td>{{$detail->amount}}</td>
                                </tr>
                            @endforeach
                            <tr align="right">
                                <td colspan="2">Total Amount</td>
                                <td>{{$data->total_amount}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="row dashboard">
                    <div class="col-md-12">
                        <div class="card bg-teal-400 p-3 text-center">
                            <div class="card-body">
                                <h4><u>USER INFORMATION</u></h4>
                                <div>
                                    <span class="title-color">{{$user->name}}</span>
                                    <span class="title-color break-all">{{$user->email}}</span>
                                    <span class="title-color break-all">{{$user->phone}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- /page length options -->
</div>
@endsection
