<!DOCTYPE html>
<html>
<body>

<html>

<body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
  <table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px #015ab9;">
    <thead>
      <tr>
        <th style="text-align:left;"><img src="{{ asset('frontend/assets/images/1.png') }}" height="50px"  alt="NVQ Courses" /></th>
        <th style="text-align:right;font-weight:600;font-size:22px;">Invoice</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:150px">Name</span><b style="font-weight:normal;margin:0">{{ $data->name }}</b></p>
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Email Id</span> {{ $data->email }}</p>
          <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Phone Number</span> {{ $data->phone }}</p>
        </td>
      </tr>
      
      <tr>
       <td style="height:35px;"><h3>Course</h3></td>
      </tr>
	  
	  
      <tr>
        <td colspan="2">
          <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
            <span style="display:block;font-size:15px;font-weight:600;">{{ $course->name }}</span><b style="font-size:13px;font-weight:normal;">Price: £{{ $course->price }}   </b>  
          </p>
         

        </td>
      </tr>
	  
	  
    </tbody>
	
    <tfooter>
    <tr>
        <td colspan="2" style="font-size:14px;padding:0px 15px 0 0px;">
          <strong style="display:block;margin:0 0 10px 0;">Note:</strong> 
          A new course application has been successfully submitted through our website. This application is for the {{ $course->name }}.
        </td>
      </tr>
    </tfooter>
  </table>
</body>

</html>

</body>
</html>
