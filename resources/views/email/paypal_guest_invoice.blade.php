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
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:150px">Name</span><b style="font-weight:normal;margin:0">{{ $courses->name }}</b></p>
          <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Email Id</span> {{ $courses->email }}</p>
          <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Phone Number</span> {{ $courses->phone }}</p>
        </td>
      </tr>
      
      <tr>
       <td style="height:35px;"><h3>Course</h3></td>
      </tr>
	  
	  
      <tr>
        <td colspan="2">
          <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
            <span style="display:block;font-size:15px;font-weight:600;">{{ $courses->course_name }}</span><b style="font-size:13px;font-weight:normal;">Price: £{{ $courses->price }}   </b>  
          </p>
      
        </td>
      </tr>
	  
	  <tr>
        <td style="height:35px;"><h3>Payment Information</h3></td>
      </tr>
      <tr>
        <td style="width:50%;padding:20px 20px 20px 0;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px">Transaction ID</span> {{  $courses->transection_id }}</p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Amount Paid </span> £{{  $courses->amount }}</p>
          
        </td>
        <td style="width:50%;padding:20px;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Status :</span> {{  $courses->status }}</p>
         
          
        </td>
      </tr>
    </tbody>
	
    <tfooter>
      <tr>
        <td colspan="2" style="font-size:14px;padding:0px 15px 0 0px;">
         
		 
         
        </td>
      </tr>
    </tfooter>
  </table>
</body>

</html>

</body>
</html>
