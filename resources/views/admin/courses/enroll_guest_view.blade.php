@extends('admin.app')

@section('content')
<!-- Content area -->
<div class="content">
    <!-- Page length options -->
    <div class="card">
        <div class="card-header header-elements-inline s-filter">
        	<div class="col-sm-6 mb-1" align="left">
			    <h6 class="card-title"><b>ENROLLED-COURSES GUSET-USER DETAILS</b></h6>
            </div>
        	<div class="col-sm-6 mb-1" align="right">
				<button type="button" class="btn btn-success btn-sm">
					<a href="{{ url('/admin/enrolled_courses') }}" class="text-white"> <i class="icon-circle-left2 mr-1"></i> Back</a>
				</button>
			</div>
        </div>
        
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
                                <th>CURRENCY</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $courses = DB::table('courses')->where('id',$data->course_id)->first();
                            @endphp
                            <tr>
                                <td><img src="{{$courses->image}}" height="60px" width="60px" class="rounded" alt="no image"></td>
                                <td>{{$courses->name ?? ''}}</td>
                                <td>{{$data->total_amount ?? ''}}</td>
                                <td>{{$data->currency ?? ''}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row dashboard">
                    <div class="col-md-12">
                        <div class="card bg-teal-400 p-3" class="text-center">
                            <div class="card-body">
                                <h4><u>USER INFORMATION</u></h4>
                                <div>
                                    <span class="title-color">{{$data->name}}</span>
                                    <span class="title-color break-all">{{$data->email}}</span>
                                    <span class="title-color break-all">{{$data->phone}}</span>
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
